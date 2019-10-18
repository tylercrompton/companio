<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyEmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'max:30'],
            'last_name' => ['required', 'max:30'],
            'email' => ['nullable', 'max:254', 'email'],
            'phone' => ['nullable', 'max:16', 'phone:AUTO,US'],
        ];
    }
}
