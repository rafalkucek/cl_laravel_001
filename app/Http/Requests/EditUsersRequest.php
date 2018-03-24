<?php

namespace App\Http\Requests;

use App\Rules\UniqueEmail;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EditUsersRequest extends FormRequest
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
    public function rules(Request $request)
    {


        return [
            'name' => 'required',
//            'email' => 'unique:users,email,' .$this->user()->id,
//            'email' => 'required|unique:users,email,'.$this->user()->id,
//            'email' => [
//                'required',
//                Rule::unique('users')->ignore($this->user->id)
//            ],

            'email' => [
                'required',
                new UniqueEmail($request)
            ],

            'password' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required'	=> 'pole name jest wymagane',
            'email.required'	=> 'pole email jest wymagane',
            'email.email' => 'Podane dane nie są adresem e-mail',
            'password.required'	=> 'pole password jest wymagane'
        ];
    }
}
