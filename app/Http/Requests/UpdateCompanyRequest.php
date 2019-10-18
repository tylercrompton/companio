<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:254'],
            'website' => ['nullable', 'url', 'max:256'],
            'logo' => ['nullable', 'file', 'image'], // TODO: validate image dimensions
        ];
    }
}
