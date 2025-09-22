<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $type = $this->route('type');

        switch ($type) {
            case 1:
                $rules = ['name'   => ['required', 'string', 'max:255']];
                break;

            case 2:
                $rules = ['name' => ['required', 'string', 'max:255'], 'country_id' => ['required']];
                break;
            case 3:
                $rules = ['name' => ['required', 'string', 'max:255']];
                break;
            case 4:
                // $role = Roles::where('id', $request->role_id)->first();
                // if ($role->name == "Proveedores") {

                //     $model = new Suppliers();
                //     $validated = $request->validate([
                //         'user_id' => ['required'],
                //         'supplier_name' => ['required', 'string', 'max:255'],
                //         'address' => ['required', 'max:255'],
                //         'nit' => ['required', 'max:10'],
                //         'city_id' => ['required'],
                //         'email' => ['required', 'email', 'unique:users,email'],
                //         'cellphone' => ['required', 'max:10'],
                //         'phone' => ['required', 'max:7'],
                //     ], [
                //         'user_id.required' => 'El usuario es obligatorio',
                //         'supplier_name.required' => 'El nombre del proveedor es obligatorio',
                //         'supplier_name.string' => 'El nombre del proveedor debe tener solo letras',
                //         'supplier_name.max' => 'El nombre del proveedor debe tener máximo 255 caracteres',
                //         'address.required' => 'La dirección del proveedor es obligatoria',
                //         'address.max' => 'La dirección del proveedor debe tener maximo 255 caracteres',
                //         'nit.required' => 'El nit del proveedor es obligatorio',
                //         'nit.max' => 'El nit del proveedor debe tener máximo 255 caracteres',
                //         'city_id.required' => 'La ciudad del proveedor es obligatoria',
                //         'email.required' => 'El correo del proveedor es obligatorio',
                //         'email.email' => 'El correo del proveedor no tiene el formato adecuado',
                //         'email.unique' => 'El correo del proveedor ya existe, corrijalo por favor',
                //         'cellphone.required' => 'El celular del proveedor es obligatorio',
                //         'cellphone.max' => 'El celular del proveedor maximo debe tener 10 caracteres',
                //         'phone.required' => 'El telefono fijo del proveedor es obligatorio',
                //         'phone.max' => 'El telefono fijo del proveedor debe tener maximo 7 caracteres'
                //     ]);

                // } else {

                //     $model = new User();
                //     $validated = $request->validate([
                //         'name' => ['required', 'string', 'max:255'],
                //         'last_name' => ['required', 'string', 'max:255'],
                //         'birthday' => ['required', 'date'],
                //         'cellphone' => ['required', 'max:10'],
                //         'email' => ['required', 'email', 'unique:users,email'],
                //         'address' => ['required'],
                //         'neightboarhood' => ['required', 'string'],
                //         'password' => ['required', 'min:5', 'max:15'],
                //         'city_id' => ['required'],
                //         'role_id' => ['required']
                //     ], [
                //         'name.required' => 'El nombre del pais es obligatorio',
                //         'name.string' => 'El nombre del pais debe tener solo letras',
                //         'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                //         'last_name.required' => 'El apellido del usuario es obligatorio',
                //         'last_name.string' => 'El apellido del usuario debe tener solo letras',
                //         'last_name.max' => 'El apellido del usuario debe tener máximo 255 caracteres',
                //         'birthday.required' => 'La fecha de cumpleaños del usuario es obligatorio',
                //         'birthday.date' => 'La fecha de cumpleaños del usuario debe tener el formato fecha (AAAA-MM-DD)',
                //         'cellphone.required' => 'El número  de celular del usuario es obligatorio',
                //         'cellphone.max' => 'El número  de celular del usuario debe tener maximo 10 digitos',
                //         'email.required' => 'El correo del usuario es obligatorio',
                //         'email.email' => 'El correo del usuario no tiene el formato adecuado',
                //         'email.unique' => 'El correo del usuario ya existe, corrijalo por favor',
                //         'address.required' => 'La dirección del usuario es obligatoria',
                //         'neightboarhood.required' => 'El nombre del barrio donde vive el usuario es obligatoria',
                //         'neightboarhood.string' => 'El nombre del barrio donde vive el usuario no puede tener números',
                //         'password.required' => 'La contraseña del usuario es obligatoria',
                //         'password.min' => 'La contraseña del usuario minimo debe tener 5 caracteres',
                //         'password.max' => 'La contraseña del usuario maximo debe tener 15 caracteres',
                //         'city_id.required' => 'La ciudad del usuario es obligatorio',
                //         'role_id.required' => 'El rol del usuario es obligatorio'
                //     ]);

                // }

                break;
            case 5:
                $rules = ['table' => ['required', 'max:255'], 'number' => ['required']]; 
                break;
            case 6:
                $rules = ['product_id' => ['required'], 'supplier_id' => ['required'], 'amont' => ['required', 'integer', 'min:0'], 'prize' => ['required', 'integer', 'min:0']];
                break;
            case 7:
                    $rules = ['cash_inflow' => ['required', 'integer', 'min:0'], 'description' => ['required', 'max:1000'], 'user_id' => ['required'], 'date_entry' => ['required', 'date']];
                    break;
            case 8:
                    $rules = ['amount' => ['required', 'integer', 'min:0'], 'description' => ['required', 'max:1000'], 'user_id' => ['required'], 'transaction_Date' => ['required', 'date']];
                    break;
            case 9:
                $rules = ['net_income' => ['required', 'integer', 'min:0'], 'description' => ['required', 'max:1000'], 'user_id' => ['required'], 'date_entry' => ['required', 'date']];
                break;
            case 10:
                $rules = ['promotion' => ['required', 'max:255'], 'description' => ['required', 'max:1000'], 'prize' => ['required', 'integer', 'min:0'], 'start_date' => ['required', 'date'], 'end_date' => ['required', 'date']];
                break;
            case 11:
                $rules = ['product_id' => ['required'], 'preparation' => ['required', 'max:255'], 'description' => ['required', 'max:1000'], 'quantity' => ['required', 'integer', 'min:0']];
                break;
            case 12:
                $rules = ['song' => ['required', 'max:255'], 'artist' => ['required', 'max:255'], 'club_table_id' => ['required'], 'order' => ['required']];
                break;
            case 13:
                $rules = ['product' => ['required', 'max:255'], 'category_id' => ['required'], 'units' => ['required', 'string'], 'prize_unit' => ['required', 'numeric']];
                break;

            case 14:
                $rules = ['name' => ['required', 'max:255']];
                break;
            
            default:
                break;
        }

        return $rules;
    }


    public function messages()
    {
        $type = $this->route('type');
        switch ($type) {
            case 1:
                $messages = [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                ];
                break;

            case 2:
                $messages = [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                    'country_id.max' => 'El pais es obligatorio',
                ];
                break;

            case 3:
                $messages = [
                    'name.required' => 'El nombre del pais es obligatorio',
                    'name.string' => 'El nombre del pais debe tener solo letras',
                    'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                ];
                break;
            case 4:
                // $messages = [
                //     'user_id.required' => 'El usuario es obligatorio',
                //     'supplier_name.required' => 'El nombre del proveedor es obligatorio',
                //     'supplier_name.string' => 'El nombre del proveedor debe tener solo letras',
                //     'supplier_name.max' => 'El nombre del proveedor debe tener máximo 255 caracteres',
                //     'address.required' => 'La dirección del proveedor es obligatoria',
                //     'address.max' => 'La dirección del proveedor debe tener maximo 255 caracteres',
                //     'nit.required' => 'El nit del proveedor es obligatorio',
                //     'nit.max' => 'El nit del proveedor debe tener máximo 255 caracteres',
                //     'city_id.required' => 'La ciudad del proveedor es obligatoria',
                //     'email.required' => 'El correo del proveedor es obligatorio',
                //     'email.email' => 'El correo del proveedor no tiene el formato adecuado',
                //     'email.unique' => 'El correo del proveedor ya existe, corrijalo por favor',
                //     'cellphone.required' => 'El celular del proveedor es obligatorio',
                //     'cellphone.max' => 'El celular del proveedor maximo debe tener 10 caracteres',
                //     'phone.required' => 'El telefono fijo del proveedor es obligatorio',
                //     'phone.max' => 'El telefono fijo del proveedor debe tener maximo 7 caracteres'
                // ];
                // $messages = [
                //     'name.required' => 'El nombre del pais es obligatorio',
                //     'name.string' => 'El nombre del pais debe tener solo letras',
                //     'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
                //     'last_name.required' => 'El apellido del usuario es obligatorio',
                //     'last_name.string' => 'El apellido del usuario debe tener solo letras',
                //     'last_name.max' => 'El apellido del usuario debe tener máximo 255 caracteres',
                //     'birthday.required' => 'La fecha de cumpleaños del usuario es obligatorio',
                //     'birthday.date' => 'La fecha de cumpleaños del usuario debe tener el formato fecha (AAAA-MM-DD)',
                //     'cellphone.required' => 'El número  de celular del usuario es obligatorio',
                //     'cellphone.max' => 'El número  de celular del usuario debe tener maximo 10 digitos',
                //     'email.required' => 'El correo del usuario es obligatorio',
                //     'email.email' => 'El correo del usuario no tiene el formato adecuado',
                //     'email.unique' => 'El correo del usuario ya existe, corrijalo por favor',
                //     'address.required' => 'La dirección del usuario es obligatoria',
                //     'neightboarhood.required' => 'El nombre del barrio donde vive el usuario es obligatoria',
                //     'neightboarhood.string' => 'El nombre del barrio donde vive el usuario no puede tener números',
                //     'password.required' => 'La contraseña del usuario es obligatoria',
                //     'password.min' => 'La contraseña del usuario minimo debe tener 5 caracteres',
                //     'password.max' => 'La contraseña del usuario maximo debe tener 15 caracteres',
                //     'city_id.required' => 'La ciudad del usuario es obligatorio',
                //     'role_id.required' => 'El rol del usuario es obligatorio'
                // ];
                break;

            case 5:
                $messages = [
                    'table.required' => 'El nombre de la mesa es obligatorio',
                    'table.max' => 'El nombre de la mesa debe tener máximo 255 caracteres',
                    'number.required' => 'El número de la mesa es obligatorio',
                ];
                break;
            case 6:
                $messages = [
                    'product_id.required' => 'El producto del inventario es obligatorio',
                    'supplier_id.required' => 'El proveedor del inventario es obligatorio',
                    'amont.required' => 'La cantidad del inventario es obligatorio',
                    'amont.integer' => 'La cantidad del inventario debe ser numerico',
                    'amont.min' => 'La cantidad del inventario no debe tener números negativos',
                    'prize.required' => 'El precio del inventario es obligatorio',
                    'prize.integer' => 'El precio del inventario debe ser numerico',
                    'prize.min' => 'El precio del inventario no debe tener números negativos',
                ];
                break;
            case 7:
                $messages = [
                        'cash_inflow.required' => 'El valor del ingreso es obligatorio',
                        'cash_inflow.integer' => 'El ingreso debe ser numerico',
                        'description.required' => 'La descripción es obligatoria',
                        'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                        'user_id.required' => 'El usuario de los pagos es obligatorio',
                        'date_entry.required' => 'La fecha del movimiento debe ser obligatorio',
                        'date_entry.date' => 'La fecha del movimiento debe tener formato fecha',
                ];
                break;

            case 8:
                $messages = [
                        'amount.required' => 'El valor del pago es obligatorio',
                        'amount.integer' => 'El pago debe ser numerico',
                        'amount.min' => 'El pago no puede ser negativo',
                        'description.required' => 'La descripción es obligatoria',
                        'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                        'user_id.required' => 'El usuario de los pagos es obligatorio',
                        'transaction_Date.required' => 'La fecha del movimiento debe ser obligatorio',
                        'transaction_Date.date' => 'La fecha del movimiento debe tener formato fecha',
                ];
                break;

            case 9:
                $messages = [
                    'net_income.required' => 'El valor de la caja es obligatorio',
                    'net_income.integer' => 'El valor de la caja debe ser numerico',
                    'net_income.min' => 'El valor de la caja no puede ser negativo',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'user_id.required' => 'El usuario de los pagos es obligatorio',
                    'date_entry.required' => 'La fecha del movimiento debe ser obligatorio',
                    'date_entry.date' => 'La fecha del movimiento debe tener formato fecha',
                ];
                break;
            case 10:
                $messages = [
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
                ];
                break;

            case 11:
                $messages = [
                    'product_id.required' => 'El producto de la preparación es obligatoria',
                    'preparation.required' => 'El titulo de la preparación es obligatoria',
                    'preparation.max' => 'El titulo de la preparación debe tener maximo 255 caracteres',
                    'description.required' => 'La descripción es obligatoria',
                    'description.max' => 'La descripción debe tener maximo 1000 caracteres',
                    'quantity.required' => 'La cantidad de la preparación es obligatoria',
                    'quantity.integer' => 'La cantidad de la preparación debe ser numerica',
                    'quantity.min' => 'La cantidad de la preparación no puede ser negativa'
                ];
                break;

            case 12:
                $messages = [
                    'song.required' => 'La canción es obligatoria',
                    'song.max' => 'La canción debe tener maximo 255 caracteres',
                    'artist.required' => 'El artista de la canción es obligatoria',
                    'club_table_id.required' => 'La mesa que pide la canción es obligatoria',
                    'order.required' => 'La cantidad de la preparación es obligatoria'
                ];
                break;

            case 13:
                $messages = [
                    'product.required'     => 'El producto es obligatorio',
                    'product.max'          => 'El producto debe tener maximo 255 caracteres',
                    'category_id.required' => 'La categoria del producto es obligatoria',
                    'units.required'       => 'La presentación del producto es obligatoria',
                    'units.string'         => 'La presentación del producto debe ser solo letras',
                    'prize_unit.required'  => 'El precio del producto es obligatorio',
                    'prize_unit.numeric'   => 'El precio del producto debe ser numerico'
                ];
                break;

            case 14:
                $messages = [
                    'name.required'  => 'El nombre de la categoria es obligatorio',
                    'name.max'       => 'El nombre de la categoria debe tener solamente 255 caracteres'
                ];
                break;
            
            default:
                break;
        }

        return $messages;
    }
}
