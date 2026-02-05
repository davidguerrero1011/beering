<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'tableStatus'  => ['sometimes'],
            'productsList' => ['required'],
            'amount'       => ['required','integer', 'min:1'],
            'clubTable'    => ['sometimes'],
        ];
    }

    public function messages()
    {
        return [
            'productsList.required' => 'El Producto es obligatorio',
            'amount.required'       => 'La cantidad es obligatorio',
            'amount.integer'        => 'La cantidad debe ser número.',
            'amount.min'            => 'La cantidad no puede ser un número negativo',
        ];
    }
}
