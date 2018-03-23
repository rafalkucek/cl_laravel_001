<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|integer',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'pole tytuł jest wymagane',
            'body.required'	=> 'pole body jest wymagane',
            'category_id.required'	=> 'pole id jest wymagane',
            'category_id.integer' => 'pole id nie jest integer',
        ];
    }
}
