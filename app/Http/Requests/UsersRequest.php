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
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'roles_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required'	=> 'pole name jest wymagane',
            'email.required'	=> 'pole email jest wymagane',
            'email.email' => 'Podane dane nie są adresem e-mail',
            'email.unique' => 'Podany adres już istnieje',
            'password.required'	=> 'pole password jest wymagane',
            'roles_id.required'	=> 'pole role jest wymagane',
        ];
    }
}
