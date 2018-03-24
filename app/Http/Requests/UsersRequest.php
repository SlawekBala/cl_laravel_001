<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'email.required'	=> 'email wymagany',
            'email.email' => 'to musi byc email',
            'name.required'	=> 'nazwa wymagana',
            'password.required'	=> 'HASŁO wymagane',
            'email.unique' => 'Ten email jest już zajęty',
            'name.unique' => 'Ta nazwa jest już zajęta'
        ];
    }
}
