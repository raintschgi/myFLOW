<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;   /* Verwendung von Laravel Facades zur Validierung*/

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'    => [
                'string',
                'required',
            ],
            'username'     => [
                'string',
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
            ],
            'email'   => [
                'required',
                Rule::unique('users')->ignore($this->route('user')->id),
            ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                'required',
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('user_access');
    }
}