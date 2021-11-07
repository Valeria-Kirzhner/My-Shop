<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $unique = !empty($request['item_id']) ? ',' . $request['item_id'] : '';

        return [
            'link' => 'required',
            'mtitle' => 'required',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:menus,url' . $unique,

        ];
    }
        public function messages()// laravel function
    {
        return [
            'mtitle.required' => 'The title field is required.',
            
        ];
    }
}
