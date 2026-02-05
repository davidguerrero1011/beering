<?php

namespace App\Repositories\Configuration;

use App\Factories\ModelFactory;
use App\Models\CashBoxes;
use App\Models\CashOutflows;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\ClubTables;
use App\Models\Countries;
use App\Models\HistoryCashBoxes;
use App\Models\MusicByTables;
use App\Models\PaymentTypes;
use App\Models\Preparations;
use App\Models\Products;
use App\Models\ProductsByPreparation;
use App\Models\Roles;
use App\Models\Suppliers;
use App\Models\User;
use App\Repositories\Interfaces\Configurations\ConfigurationInterface;
use App\Traits\ModelSearchable;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConfigurationRepository implements ConfigurationInterface
{

    use ModelSearchable;

    public function __construct() {}

    public function index(int $type, Request $request)
    {
        $model = ModelFactory::getModelInstanceByType($type);
        if (!$model) {
            return response()->json(['error' => 'Tipo no valido']);
        }

        return $this->getModelInstances($request, $model, $type);
    }

    public function create()
    {
        $countries = Countries::all();
        $cities = Cities::all();
        $roles = Roles::all();
        $products = Products::all();
        $suppliers = Suppliers::all();
        $users = User::whereIn('role_id', [21, 22, 23])->where('status', 1)->get();
        $tables = ClubTables::where([ ['status', 1], ['state', 'Ocupada'] ])->get();
        $categories = Categories::all();
        $paymentTypes = PaymentTypes::all();

        return ['countries' => $countries, 'cities' => $cities, 'roles' => $roles, 'products' => $products, 'suppliers' => $suppliers, 'users' => $users, 'tables' => $tables, 'categories' => $categories, 'paymentTypes' => $paymentTypes];
    }

    public function store($data, Model $model, int $type)
    {
        $currentBox = CashBoxes::where('status', 1)->orderBy('created_at', 'desc')->first();
        switch ($type) {
            case 2:
                $register = $model::create([
                    'name'       => $data['name'],
                    'country_id' => $data['country_id'],
                    'status'     => $data['status']
                ]);
                break;

            case 7:
                $register = $model::create([
                    'net_income'   => floatval($currentBox->net_income ?? 0) + floatval($data['net_income']),
                    'income'       => $data['income'],
                    'description'  => $data['description'],  
                    'user_id'      => $data['user_id'],  
                    'date_entry'   => $data['date_entry']  
                ]);

                if (!is_null($currentBox)) {
                    $currentBox->update(['status' => 0]);
                }
                break;
            case 8:
                $totalBoxCash = CashBoxes::where('status', 1)->latest()->value('net_income') ?? 0;
                if ($data['amount'] == 0 || $data['amount'] == '' || $data['amount'] == null) {
                    return redirect()->back()->with('error', 'El pago a realizar debe ser mayor a cero.');
                }

                $register = $model::create([
                    'amount'           => $data['amount'],
                    'description'      => $data['description'],  
                    'user_id'          => $data['user_id'],  
                    'transaction_Date' => $data['transaction_Date']
                ]);

                CashBoxes::create([
                    'net_income'  => $totalBoxCash !== 0 ? ($totalBoxCash + $data['amount']) : (0 + $data['amount']),  
                    'description' => $data['description'],
                    'user_id'     => $data['user_id'],
                    'date_entry'  => $data['transaction_Date']
                ]);

                break;
            case 9:
                $boxMoney = CashBoxes::where('status', 1)->sum('net_income');
                if ($boxMoney == 0 || $boxMoney == '' || $boxMoney == null) {
                    return redirect()->back()->with('error', 'No puede hacer ningun pago porque, no tiene dinero en la caja');
                }

                if ($boxMoney < $data['amount']) {
                    return redirect()->back()->with('error', 'Aunque hay dinero en caja, no es suficiente para este pago.');
                }

                $register = $model::create([
                    'amount'           => $data['amount'],
                    'description'      => $data['description'],  
                    'user_id'          => $data['user_id'],  
                    'transaction_Date' => $data['transaction_Date']  
                ]);
                break;
            case 11:
                $register = $model::create([
                    'preparation' => $data["preparation"],
                    'description' => $data["description"],
                    'quantity'    => $data["quantity"],
                    'status'      => $data["status"]
                ]);
                foreach ($data["products"] as $product) {
                    ProductsByPreparation::create([
                        'product_id'     => $product,
                        'preparation_id' => $register->id
                    ]);
                }
                break;
            case 12:
                $order = $model::where('order', $data["order"])->exists();
                if ($order) {
                    return response()->json(['status' => 'warning', 'message' => 'El número de orden de la canción ya esta asignado por favor ingrese otro']);
                }

                $register = $model::create($data);
                MusicByTables::create([ 'music_id' => $register->id, 'club_table_id' => $data['club_table_id'] ]);
                break;
            case 16:
                $role = Roles::where('name', 'Proveedores')->first();
                $user = User::create([
                                        'name'      => $data['name'], 
                                        'last_name' => $data['last_name'],
                                        'email'     => $data['email'], 
                                        'password'  => bcrypt('1234567890'),
                                        'city_id'   => $data['city_id'],
                                        'role_id'   => $role->id,
                                        'status'    => $data['status']
                                    ]);
                $register = Suppliers::create([
                    'user_id'       => $user->id,
                    'supplier_name' => $data['supplier_name'],
                    'address'       => $data['address'],
                    'nit'           => $data['nit'],
                    'city_id'       => $data['city_id'],
                    'email'         => $data['email'],
                    'cellphone'     => $data['cellphone'],
                    'phone'         => $data['phone'],
                    'status'        => $data['status']
                ]);
                break;
            default:
                $register = $model::create($data);
                break;
        }
        
        return redirect()->route('list', ['type' => $type])->with('success', 'Registro con ID ' . $register->id . ' creado exitosamente');
    }

    public function edit()
    {
        $countries = Countries::all();
        $cities = Cities::all();
        $roles = Roles::all();
        $products = Products::all();
        $suppliers = Suppliers::with('user')->get();
        $users = User::all();
        $categories = Categories::all();
        $tables = ClubTables::where('status', 1)->get()->toArray();
        $paymentTypes = PaymentTypes::all();

        return response()->json(['countries' => $countries, 'cities' => $cities, 'roles' => $roles, 'products' => $products, 'suppliers' => $suppliers, 'users' => $users, 'categories' => $categories, 'tables' => $tables, 'paymentTypes' => $paymentTypes]);
    }

    public function show(int $id, int $type)
    {
        $model = ModelFactory::getModelInstanceByType($type);
        switch ($type) {
            case 11:
                $response = $model->with('productsByPreparation')->find($id)->toArray();
                break;

            case 12:
                $response = $model->with('clubTables')->find($id)->toArray();
                break;
            
            default:
                $response = $model::find($id);
                break;
        }

        return $response;
    }

    public function update(array $data, int $id, int $type)
    {
        if (!$type || !$id) {
            Log::error('Error al actualizar el registro, tipo o id no valido');
            return;
        }

        $modelClass = ModelFactory::getModelInstanceByType($type);
        $record = $modelClass::find($id);

        switch ($type) {
            case 11:
                $preparations = Preparations::find($id);
                $preparations->update(['preparation' => $data["preparation"], 'description' => $data["description"], 'quantity' => $data["quantity"]]);
                
                ProductsByPreparation::where('preparation_id', $id)->delete();
                foreach($data["product_id"] as $item) {
                    ProductsByPreparation::insert(['product_id' => $item, 'preparation_id' => $id]);
                }
                break;

            case 12:
                $musicByTable = MusicByTables::find($data["music_by_table_id"]);
                $musicByTable->update(['music_id' => $data['music_id'], 'club_table_id' => $data['club_table_id']]);
                break;
            case 16:
                $role = Roles::where('name', 'Proveedores')->first();
                $user = User::find($data['user_id']);
                
                $user->update(['name' => $data['name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'city_id' => $data['city_id'], 'role_id' => $role->id]);
                Suppliers::where('user_id', $data["user_id"])->update([
                    'user_id' => $data['user_id'],
                    'supplier_name' => $data['supplier_name'],
                    'address' => $data['address'],
                    'nit' => $data['nit'],
                    'city_id' => $data['city_id'],
                    'email' => $data['email'],
                    'cellphone' => $data['cellphone'],
                    'phone' => $data['phone'],
                ]);
                break;
            
            default:
                $record->update($data);
                break;
        }

        return redirect()->route('list', ['type' => $type])->with('success', 'Registro con ID ' . $record->id . ' actualizado exitosamente');
    }

    public function destroy(int $id, int $type)
    {
        $modelClass = ModelFactory::getModelInstanceByType($type);
        if ($type == 5) {
            $state = $modelClass::find($id);
            if ($state->state == 'Reservada' || $state->state == 'Ocupada') {
                return response()->json(['status' => 'warning', 'message' => 'Esta mesa no la puede eliminar porque o ya esta reservada o ocupada, en caso de que no, avise al administrador']);
            }
        }

        try {
            switch ($type) {
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 10:
                case 13:
                    $modelClass::where('id', $id)->delete();
                    break;

                case 7:
                    $deleteCashBox = $modelClass::find($id);
                    HistoryCashBoxes::insert([
                            'net_income'  => $deleteCashBox->net_income,
                            'description' => $deleteCashBox->description,
                            'user_id'     => $deleteCashBox->user_id,
                            'date_entry'  => $deleteCashBox->date_entry
                    ]);
                    $deleteCashBox->delete();

                    $updateLastRegister = $modelClass::where('status', '0')->orderBy('date_entry', 'DESC')->first();
                    $updateLastRegister->update(['status' => '1']);
                    break;

                case 6:
                case 8:
                case 9:
                case 11:
                case 12:
                case 14:
                    $modelClass::where('id', $id)->update(['status' => '0']);
                    break;
                case 15:
                case 16:
                    $modelClass::where('id', $id)->update(['status' => '0']);
                    break;

                default:
                    Log::error("El id del modulo que esta tratando de borrar no existe");
                    break;
            }
            
            $category = match ($type) {
                1 => "el país",
                2 => "la ciudad",
                3 => "el rol",
                4 => "el usuario",
                5 => "la mesa",
                6 => "el registro de inventario",
                7 => "el registro de caja",
                8 => "el cobro",
                9 => "el pago",
                10 => "la promoción",
                11 => "la preparación",
                12 => "la canción",
                13 => "el producto",
                14 => "la categoria",
                15 => "el tipo de pago",
                16 => "el proveedor",
                default => null,
            };
        } catch (Exception $e) {
            Log::error('Error al eliminar el registro, ' . $e->getMessage());
        }
        return response()->json(['status' => 'success', 'message' => $category . ' fue eliminado exitosamente']);
    }

    public function updateStatus(Request $request)
    {
        $model = ModelFactory::getModelInstanceByType($request->type);
        if ($request->type == 5) {

            $table = $model::find($request->id);
            if ($table->state == 'Reservada' || $table->state == 'Ocupada') {
                return response()->json(['status' => 'warning', 'message' => 'Como la mesa esta reservada u ocupada no puede desactivarla.']);
            } 
        }

        $model::where('id', $request->id)->update(['status' => $request->status == '1' ? 0 : 1]);
        return response()->json(['status' => 'success', 'message' => 'El registro con ID ' . $request->id . ' se actualizo el estado exitosamente']);
    }

    public function blockBoxCashCreate()
    {
        $cashBox = CashBoxes::whereDate('date_entry', Carbon::today())->orderBy('date_entry', 'DESC')->exists();
        $validateState = $cashBox ? true : false; 
        return $validateState;
    }

    public function validateOrder(Request $request)
    {
        $model = ModelFactory::getModelInstanceByType($request->type);
        $order = $model::where('order', $request->order)->exists();

        if ($order) {
            $status = 1;
            $message = 'El número de orden de la canción ya esta asignado, verifique y cambielo.';
        } else {
            $status = 2;
            $message = '';
        }

        return response()->json(['status' => $status, 'message' => $message ?? '']);
    }

    public function getTableName(Request $request)
    {
        $clubTables = ClubTables::where('id', $request->id)->first();
        return response()->json(['data' => $clubTables]);
    }

    public function getProducts(Request $request)
    {
        $clubTables = Products::all();
        return response()->json([$clubTables]);
    }
}
