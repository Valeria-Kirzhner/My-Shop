<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'link' => 'required',
            'mtitle' => 'required',
            'url' => 'required|unique:menus,url|regex:/^[a-z\d-]+^/',

        ];
    }
        public function messages()// laravel function
    {
        return [
            'mtitle.required' => 'The title field is required.',
        ];
    }
}
