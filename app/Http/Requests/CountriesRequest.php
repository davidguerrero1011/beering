<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status') ? 1 : 0,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'   => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'El nombre del pais es obligatorio',
            'name.string' => 'El nombre del pais debe tener solo letras',
            'name.max' => 'El nombre del pais debe tener máximo 255 caracteres',
        ];    
    }
}
