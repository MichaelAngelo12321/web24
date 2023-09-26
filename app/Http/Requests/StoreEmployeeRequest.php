<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'imie'  => ['required', 'string', 'max:255'],
            'nazwisko'  => ['required', 'string', 'max:255'],
            'email'  => ['required', 'email'],
            'company_id' => ['required'],
            'numer_telefonu'  => ['nullable']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'imie.required' => 'Pole imie jest wymagane.',
            'nazwisko.required' => 'Pole nazwisko jest wymagane.',
            'email.required' => 'Pole email jest wymagane.',
            'company_id.required' => 'Pole company jest wymagane.',

        ];
    }
}
