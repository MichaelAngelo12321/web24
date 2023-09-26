<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'nip'  => ['required', 'max:15'],
            'adres'  => ['required', 'max:255'],
            'miasto'  => ['required', 'max:100'],
            'kod_pocztowy'  => ['required', 'max:10'],
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
            'name.required' => 'Pole nazwa jest wymagane.',
            'nip.required' => 'Pole NIP jest wymagane.',
            'adres.required' => 'Pole adres jest wymagane.',
            'miasto.required' => 'Pole miasto jest wymagane.',
            'kod_pocztowy.required' => 'Pole kod pocztowy jest wymagane.',
        ];
    }
}
