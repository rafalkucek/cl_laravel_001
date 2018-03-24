<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilesRequest extends FormRequest
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
//            'first_file_name' => 'required',
            'file_name' => 'required',
        ];
    }

    public function messages() {
        return [
//            'first_file_name.required'	=> 'pole first_file_name wymagane',
            'file_name.required'	=> 'pole file_name wymagane',
        ];
    }
}
