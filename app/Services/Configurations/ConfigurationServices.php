<?php

namespace App\Services\Configurations;

use App\Models\CashBoxes;
use App\Models\CashInflows;
use App\Models\CashOutflows;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\ClubTables;
use App\Models\Countries;
use App\Models\Inventaries;
use App\Models\Music;
use App\Models\PaymentTypes;
use App\Models\Preparations;
use App\Models\Products;
use App\Models\Promotions;
use App\Models\Roles;
use App\Models\Suppliers;
use App\Models\User;
use App\Repositories\Interfaces\Configurations\ConfigurationInterface;
use Illuminate\Http\Request;

Class ConfigurationServices {

    public function __construct(protected ConfigurationInterface $configurations){}

    public function index(int $type, Request $request)
    {
        return $this->configurations->index($type, $request);
    }

    public function create()
    {
        $data = $this->configurations->create();
        return $data;
    }

    public function store(int $type, Request $request)
    {
        switch ($type) {
            case 1:
                $model = new Countries();
                $validated = $request->validate([
                    'name'   => ['required', 'string', 'max:255'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                ]);
                break;

            case 2:
                $model = new Cities();
                $validated = $request->validate([
                    'name'   => ['required', 'string', 'max:255'],
                    'country_id' => ['required'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                    'country_id.max' => 'El pais es obligatorio',
                ]);

                $validated['status'] = ($request->has('status') && $request->input('status') == '1') ? 1 : 0;
                break;
            case 3:
                $model = new Roles();
                $validated = $request->validate([
                    'name'   => ['required', 'string', 'max:255'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                ]);
                break;
            case 4:
                $role = Roles::where('id', $request->role_id)->first();
                if ($role->name == "Proveedores") {

                    $model = new Suppliers();
                    $validated = $request->validate([
                        'user_id' => ['required'],
                        'supplier_name' => ['required', 'string', 'max:255'],
                        'address' => ['required', 'max:255'],
                        'nit' => ['required', 'max:10'],
                        'city_id' => ['required'],
                        'email' => ['required', 'email', 'unique:users,email'],
                        'cellphone' => ['required', 'max:10'],
                        'phone' => ['required', 'max:7'],
                        'status' => ['nullable', 'boolean']
                    ], [
                        'user_id.required' => 'El usuario es obligatorio',
                        'supplier_name.required' => 'El nombre del proveedor es obligatorio',
                        'supplier_name.string' => 'El nombre del proveedor debe tener solo letras',
                        'supplier_name.max' => 'El nombre del proveedor debe tener máximo 255 caracteres',
                        'address.required' => 'La dirección del proveedor es obligatoria',
                        'address.max' => 'La dirección del proveedor debe tener maximo 255 caracteres',
                        'nit.required' => 'El nit del proveedor es obligatorio',
                        'nit.max' => 'El nit del proveedor debe tener máximo 255 caracteres',
                        'city_id.required' => 'La ciudad del proveedor es obligatoria',
                        'email.required' => 'El correo del proveedor es obligatorio',
                        'email.email' => 'El correo del proveedor no tiene el formato adecuado',
                        'email.unique' => 'El correo del proveedor ya existe, corrijalo por favor',
                        'cellphone.required' => 'El celular del proveedor es obligatorio',
                        'cellphone.max' => 'El celular del proveedor maximo debe tener 10 caracteres',
                        'phone.required' => 'El telefono fijo del proveedor es obligatorio',
                        'phone.max' => 'El telefono fijo del proveedor debe tener maximo 7 caracteres'
                    ]);

                } else {

                    $model = new User();
                    $validated = $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'last_name' => ['required', 'string', 'max:255'],
                        'birthday' => ['required', 'date'],
                        'cellphone' => ['required', 'max:10'],
                        'email' => ['required', 'email', 'unique:users,email'],
                        'address' => ['required'],
                        'neightboarhood' => ['required', 'string'],
                        'password' => ['required', 'min:5', 'max:15'],
                        'city_id' => ['required'],
                        'role_id' => ['required'],
                        'status' => ['nullable', 'boolean']
                    ], [
                        'name.required' => 'El nombre del pais es obligatorio',
                        'name.string' => 'El nombre del pais debe tener solo letras',
                        'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                        'last_name.required' => 'El apellido del usuario es obligatorio',
                        'last_name.string' => 'El apellido del usuario debe tener solo letras',
                        'last_name.max' => 'El apellido del usuario debe tener máximo 255 caracteres',
                        'birthday.required' => 'La fecha de cumpleaños del usuario es obligatorio',
                        'birthday.date' => 'La fecha de cumpleaños del usuario debe tener el formato fecha (AAAA-MM-DD)',
                        'cellphone.required' => 'El número  de celular del usuario es obligatorio',
                        'cellphone.max' => 'El número  de celular del usuario debe tener maximo 10 digitos',
                        'email.required' => 'El correo del usuario es obligatorio',
                        'email.email' => 'El correo del usuario no tiene el formato adecuado',
                        'email.unique' => 'El correo del usuario ya existe, corrijalo por favor',
                        'address.required' => 'La dirección del usuario es obligatoria',
                        'neightboarhood.required' => 'El nombre del barrio donde vive el usuario es obligatoria',
                        'neightboarhood.string' => 'El nombre del barrio donde vive el usuario no puede tener números',
                        'password.required' => 'La contraseña del usuario es obligatoria',
                        'password.min' => 'La contraseña del usuario minimo debe tener 5 caracteres',
                        'password.max' => 'La contraseña del usuario maximo debe tener 15 caracteres',
                        'city_id.required' => 'La ciudad del usuario es obligatorio',
                        'role_id.required' => 'El rol del usuario es obligatorio'
                    ]);

                }

                break;
            case 5:
                $model = new ClubTables();
                $validated = $request->validate([
                    'table'  => ['required', 'max:255'],
                    'number' => ['required'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'table.required'  => 'El nombre de la mesa es obligatorio',
                    'table.max'       => 'El nombre de la mesa debe tener máximo 255 caracteres',
                    'number.required' => 'El número de la mesa es obligatorio',
                ]);
                break;
            case 6:
                $model = new Inventaries();
                $validated = $request->validate([
                    'product_id'  => ['required'],
                    'supplier_id' => ['required'],
                    'amont'       => ['required', 'integer', 'min:0'],
                    'prize'       => ['required', 'integer', 'min:0'],
                    'status'      => ['nullable', 'boolean']
                ], [
                    'product_id.required' => 'El producto del inventario es obligatorio',
                    'supplier_id.required' => 'El proveedor del inventario es obligatorio',
                    'amont.required' => 'La cantidad del inventario es obligatorio',
                    'amont.integer' => 'La cantidad del inventario debe ser numerico',
                    'amont.min' => 'La cantidad del inventario no debe tener números negativos',
                    'prize.required' => 'El precio del inventario es obligatorio',
                    'prize.integer' => 'El precio del inventario debe ser numerico',
                    'prize.min' => 'El precio del inventario no debe tener números negativos',
                ]);
                break;
            case 7:
                $model = new CashBoxes();
                $validated = $request->validate([
                    'net_income' => ['required', 'numeric', 'min:0'],
                    'description' => ['required', 'max:1000'],
                    'user_id' => ['required'],
                    'date_entry' => ['required', 'date']
                ], [
                    'net_income.required' => 'El valor de la caja es obligatorio',
                    'net_income.numeric' => 'El valor de la caja debe ser numerico',
                    'net_income.min' => 'El valor de la caja no puede ser negativo',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'user_id.required' => 'El usuario de los pagos es obligatorio',
                    'date_entry.required' => 'La fecha del movimiento debe ser obligatorio',
                    'date_entry.date' => 'La fecha del movimiento debe tener formato fecha',
                ]);
                break;

            case 8:
                $model = new CashInflows();
                $validated = $request->validate([
                    'amount' => ['required', 'integer', 'min:0'],
                    'description' => ['required', 'max:1000'],
                    'user_id' => ['required'],
                    'transaction_Date' => ['required', 'date']
                ], [
                    'amount.required' => 'El valor del pago es obligatorio',
                    'amount.integer' => 'El pago debe ser numerico',
                    'amount.min' => 'El pago no puede ser negativo',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'user_id.required' => 'El usuario de los pagos es obligatorio',
                    'transaction_Date.required' => 'La fecha del movimiento debe ser obligatorio',
                    'transaction_Date.date' => 'La fecha del movimiento debe tener formato fecha',
                ]);
                break;
            case 9:
                $model = new CashOutflows();
                $validated = $request->validate([
                    'amount' => ['required', 'integer', 'min:0'],
                    'description' => ['required', 'max:1000'],
                    'user_id' => ['required'],
                    'transaction_Date' => ['required', 'date']
                ], [
                    'amount.required' => 'El valor del ingreso es obligatorio',
                    'amount.integer' => 'El ingreso debe ser numerico',
                    'amount.integer' => 'El ingreso no debe ser un número negativo',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'user_id.required' => 'El usuario de los pagos es obligatorio',
                    'transaction_Date.required' => 'La fecha del movimiento debe ser obligatorio',
                    'transaction_Date.date' => 'La fecha del movimiento debe tener formato fecha',
                ]);
                break;
            case 10:
                $model = new Promotions();
                $validated = $request->validate([
                    'promotion' => ['required', 'max:255'],
                    'description' => ['required', 'max:1000'],
                    'prize' => ['required', 'integer', 'min:0'],
                    'start_date' => ['required', 'date'],
                    'end_date' => ['required', 'date'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'promotion.required' => 'El nombre de la promoción es obligatoria',
                    'promotion.max' => 'El nombre de la promoción debe contener maximo 255 caracteres',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'prize.required' => 'El precio de la promoción es obligatorio',
                    'prize.integer' => 'El precio de la promoción debe ser numerico',
                    'prize.min' => 'El precio de la promoción no puede ser negativo',
                    'start_date.required' => 'La fecha inicial de la promoción es obligatoria',
                    'start_date.date' => 'La fecha inicial debe tener formato fecha',
                    'end_date.required' => 'La fecha final de la promoción es obligatoria',
                    'end_date.date' => 'La fecha final debe tener formato fecha'
                ]);
                break;
            case 11:
                $model = new Preparations();
                $validated = $request->validate([
                    'products'  => ['required'],
                    'preparation' => ['required', 'max:255'],
                    'description' => ['required', 'max:1000'],
                    'quantity'    => ['required', 'integer', 'min:0'],
                    'status'      => ['nullable', 'boolean']
                ], [
                    'products.required' => 'El producto de la preparación es obligatoria',
                    'preparation.required' => 'El titulo de la preparación es obligatoria',
                    'preparation.max' => 'El titulo de la preparación debe tener maximo 255 caracteres',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'quantity.required' => 'La cantidad de la preparación es obligatoria',
                    'quantity.integer' => 'La cantidad de la preparación debe ser numerica',
                    'quantity.min' => 'La cantidad de la preparación no puede ser negativa'
                ]);
                break;
            case 12:
                $model = new Music();
                $validated = $request->validate([
                    'song' => ['required', 'max:255'],
                    'artist' => ['required', 'max:255'],
                    'club_table_id' => ['required', 'integer', 'exists:club_tables,id'],
                    'order' => ['required'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'song.required' => 'La canción es obligatoria',
                    'song.max' => 'La canción debe tener maximo 255 caracteres',
                    'artist.required' => 'El artista de la canción es obligatoria',
                    'club_table_id.required' => 'La mesa es obligatoria, debe asignar la mesa',
                    'club_table_id.integer' => 'Debe seleccionar alguna de las mesas.',
                    'order.required' => 'El órden de la canción es obligatoria'
                ]);
                break;
            case 13:
                $model = new Products();
                $validated = $request->validate([
                    'product'     => ['required', 'max:255'],
                    'category_id' => ['required'],
                    'units'       => ['required', 'string'],
                    'prize_unit'  => ['required', 'numeric'],
                    'status'      => ['nullable', 'boolean']
                ], [
                    'product.required'     => 'El producto es obligatorio',
                    'product.max'          => 'El producto debe tener maximo 255 caracteres',
                    'category_id.required' => 'La categoria del producto es obligatoria',
                    'units.required'       => 'La presentación del producto es obligatoria',
                    'units.string'         => 'La presentación del producto debe ser solo letras',
                    'prize_unit.required'  => 'El precio del producto es obligatorio',
                    'prize_unit.numeric'   => 'El precio del producto debe ser numerico'
                ]);
                break;

            case 14:
                $model = new Categories();
                $validated = $request->validate([
                    'name'     => ['required', 'max:255'],
                    'status'   => ['nullable', 'boolean']
                ], [
                    'name.required'  => 'El nombre de la categoria es obligatorio',
                    'name.max'       => 'El nombre de la categoria debe tener solamente 255 caracteres',
                ]);
                break;

            case 15:
                $model = new PaymentTypes();
                $validated = $request->validate([
                    'type'   => ['required', 'max:255'],
                    'status' => ['nullable', 'boolean']
                ], [
                    'type.required'  => 'El tipo de pago es obligatorio',
                    'type.max'       => 'El tipo de pago debe tener solamente 255 caracteres',
                ]);
                break;
            case 16:
                $model = new Suppliers();
                $validated = $request->validate([
                    'name'          => ['required', 'string', 'max:255'],
                    'last_name'     => ['required', 'string', 'max:255'],
                    'supplier_name' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 'max:255'],
                    'address'       => ['required', 'max:255'],
                    'nit'           => ['required', 'max:10'],
                    'city_id'       => ['required'],
                    'email'         => ['required', 'email'],
                    'cellphone'     => ['required', 'max:10'],
                    'phone'         => ['nullable', 'max:10'],
                    'status'        => ['nullable'],
                ], [
                    'name.required'           => 'El nombre del contacto  de la empresa es obligatorio',
                    'name.string'             => 'El nombre del contacto  de la empresa solo debe tener letras',
                    'name.max'                => 'El nombre del contacto  de la empresa debe tener maximo 255 caracteres',
                    'last_name.required'      => 'El apellido del contacto  de la empresa es obligatorio',
                    'last_name.string'        => 'El apellido del contacto  de la empresa solo debe tener letras',
                    'last_name.max'           => 'El apellido del contacto  de la empresa debe tener maximo 255 caracteres',
                    'supplier_name.required'  => 'El nombre de la empresa es obligatorio',
                    'supplier_name.regex'     => 'El nombre de la empresa no debe contener números',
                    'supplier_name.max'       => 'El nombre de la empresa maximo debe tener 255 caracteres',
                    'address.required'        => 'La dirección de la empresa debe ser obligatorio',
                    'address.max'             => 'La dirección de la empresa, maximo debe tener 255 caracteres',
                    'nit.required'            => 'El nit de la empresa debe ser obligatorio',
                    'nit.max'                 => 'El nit de la empresa, maximo debe tener 10 números',
                    'city_id.required'        => 'La ciudad de la empresa es obligatoria',
                    'email.required'          => 'El correo de  la empresa es obligatoria',
                    'email.email'             => 'El correo de la empresa debe tener el formato de un correo, ejemplo@ejemplo.com',
                    'cellphone.required'      => 'El celular de la empresa debe ser obligatorio',
                    'cellphone.max'           => 'El celular de la empresa, maximo debe tener 10 digitos',
                    'phone.max'               => 'El telefono fijo de la empresa debe tener 10 digitos por maximo',
                ]);
                break;
            
            default:
                break;
        }
        
        return $this->configurations->store($validated, $model, $type);
    }

    public function edit()
    {
        return $this->configurations->edit();
    }

    public function show(int $id, int $type)
    {
        return $this->configurations->show($id, $type);
    }

    public function update(array $data, int $id, int $type)
    {
        return $this->configurations->update($data, $id, $type);
    }

    public function destroy(int $id, int $type)
    {
        return $this->configurations->destroy($id, $type);
    }

    public function updateStatus(Request $request)
    {
        return $this->configurations->updateStatus($request);
    }

    public function blockBoxCashCreate()
    {
        return $this->configurations->blockBoxCashCreate();
    }

    public function validateOrder(Request $request)
    {
        return $this->configurations->validateOrder($request);
    }

    public function getTableName(Request $request)
    {
        return $this->configurations->getTableName($request);
    }

    public function getProducts(Request $request)
    {
        return $this->configurations->getProducts($request);
    }

}