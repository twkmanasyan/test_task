<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "first_name" => 'required|min:3',
            "last_name" => 'required|min:3',
            "birth_date" => 'required|date',
            "phone" => 'required',
            'email' => 'email|unique:users',
            'password' => 'required|min:4|max:12',
            'confirm_password' => 'required_with:password|same:password'
        ];
    }
}
