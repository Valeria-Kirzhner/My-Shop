<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        
        $unique = !empty($request['item_id']) ? ',' . $request['item_id'] : '';// becouse url need to be unique

        return [
            'categorie_id' => 'required',
            'title' => 'required',
            'url' => 'required|regex:/^[a-z\d-]+$/|unique:products,url' . $unique,
            'article' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
        ];
    }

}
