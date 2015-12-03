<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserFormRequest extends Request
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
        return [
            'firstname'             => 'required|min:5|alpha_num|max:25',
            'lastname'              => 'required|min:5|alpha_num|max:25',
            'email'                 => 'required|email|unique:users',
            'username'              => 'required|alpha_num|min:5|max:25|unique:users',
            'password'              => 'required|min:8|confirmed|regex:/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!?]).*$/',
            'password_confirmation' => 'required|min:8|same:password|regex:/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&+=!?]).*$/'
        ];
    }
}
