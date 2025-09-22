<?php

namespace App\Repositories\Configuration;

use App\Factories\ModelFactory;
use App\Models\CashBoxes;
use App\Models\CashInflows;
use App\Models\CashTransactions;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\ClubTables;
use App\Models\Countries;
use App\Models\MusicByTables;
use App\Models\Products;
use App\Models\Roles;
use App\Models\Suppliers;
use App\Models\User;
use App\Repositories\Interfaces\Configurations\ConfigurationInterface;
use App\Traits\ModelSearchable;
use Carbon\Carbon;
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

        return ['countries' => $countries, 'cities' => $cities, 'roles' => $roles, 'products' => $products, 'suppliers' => $suppliers, 'users' => $users, 'tables' => $tables, 'categories' => $categories];
    }

    public function store(array $data, Model $model, int $type)
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
            case 6:
                $register = $model::create([
                    'product_id'   => $data['product_id'],
                    'supplier_id'  => $data['supplier_id'],
                    'amont'        => $data['amont'],  
                    'prize'        => $data['prize']  
                ]);
                $currentBox->update(['status' => 0]);
                break;

            case 7:
                $register = $model::create([
                    'cash_inflow' => $data['cash_inflow'],
                    'net_income'   => floatval($currentBox->net_income) + floatval($data['cash_inflow']),
                    'description'  => $data['description'],  
                    'user_id'      => $data['user_id'],  
                    'date_entry'   => $data['date_entry']  
                ]);
                $currentBox->update(['status' => 0]);
                break;

            case 8:
                $register = $model::create($data);
                break;
            case 9:
                CashBoxes::where('status', 1)->orderBy('date_entry', 'DESC')->first()?->update(['status', 0]);
                $register = $model::create([
                    'net_income'   => $currentBox->net_income + $data['net_income'],
                    'description'  => $data['description'],
                    'user_id'      => $data['user_id'],
                    'date_entry'   => $data['date_entry']
                ]);
                $currentBox->update(['status' => 0]);
                break;

            case 12:
                $register = $model::create($data);
                MusicByTables::create([ 'music_id' => $register->id, 'club_table_id' => $data['club_table_id'] ]);
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
        $suppliers = Suppliers::all();
        $users = User::all();
        $categories = Categories::all();

        return response()->json(['countries' => $countries, 'cities' => $cities, 'roles' => $roles, 'products' => $products, 'suppliers' => $suppliers, 'users' => $users, 'categories' => $categories]);
    }

    public function show(int $id, int $type)
    {
        $model = ModelFactory::getModelInstanceByType($type);
        return $model::find($id);
    }

    public function update(array $data, int $id, int $type)
    {
        $modelClass = ModelFactory::getModelInstanceByType($type);
        $record = $modelClass::find($id);
        $record->update($data);
        return redirect()->route('edit', ['id' => $id, 'type' => $type])->with('success', 'Registro con ID ' . $record->id . ' actualizado exitosamente');
    }

    public function destroy(int $id, int $type)
    {
        $modelClass = ModelFactory::getModelInstanceByType($type);
        $modelClass::where('id', $id)->delete();
        return response()->json(['status' => 'success', 'message' => 'El País con ID ' . $id . ' fue eliminado exitosamente']);
    }

    public function updateStatus(Request $request)
    {
        $model = ModelFactory::getModelInstanceByType($request->type);
        $model::where('id', $request->id)->update(['status' => $request->status == '1' ? 0 : 1]);
        return response()->json(['status' => 'success', 'message' => 'El registro con ID ' . $request->id . ' se actualizo el estado exitosamente']);
    }

    public function blockBoxCashCreate()
    {
        $cashBox = CashBoxes::whereDate('date_entry', Carbon::today())->orderBy('date_entry', 'DESC')->exists();
        $validateState = $cashBox ? true : false; 
        return $validateState;
    }
}
