<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\User;

class UpdateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @param User $user
     * @return array
     */
    public function rules(User $user)
    {
        return [
            'name' => ['nullable', 'max:100'],
            // TODO: figure out why not being ignored. Maybe Laravel thinks that I want the authenticated user?
            'email' => ['nullable', 'max:254', Rule::unique('users')->ignore($user)],
        ];
    }
}
