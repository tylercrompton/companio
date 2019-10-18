<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => ['nullable', 'max:254'],
            'website' => ['nullable', 'max:256', 'url'],
            'logo' => ['nullable', Rule::dimensions()->maxWidth(100)->maxHeight(100)],
        ];
    }
}
