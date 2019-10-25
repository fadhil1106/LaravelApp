<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'PATCH') {
            $email_rules = 'required|email|max:100|unique:users,email,'. $data['id'];
        } else {
            $email_rules = 'required|in:admin,operator';
        }
        return [
            'name'      => 'required|max:255',
            'email'     => 'required|email|max:100|unique:users',
            'password'  => 'required|confirmed|min:6',
            'level'     => 'required|in:admin,operator'
        ];
    }
}