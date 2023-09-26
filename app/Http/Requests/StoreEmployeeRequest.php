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
            'firstName'  => ['required', 'string', 'max:255'],
            'surName'  => ['required', 'string', 'max:255'],
            'email'  => ['required', 'email'],
            'company_id' => ['required'],
            'phone_number'  => ['nullable']
        ];
    }

}
