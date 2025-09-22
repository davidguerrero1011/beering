<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        return [
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => 'El correo del usuario es obligatorio',
            'email.email'       => 'El correo del usuario no tiene formato correo',
            'password.required' => 'La contraseña del usuario es obligatoria',
            'password.min'      => 'La contraseña del usuario debe contener minimo 6 caracteres',
        ];
    }
}
