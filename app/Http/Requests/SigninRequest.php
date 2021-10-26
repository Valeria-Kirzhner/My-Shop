<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ];
    }
    /*public function messages()// laravel function
    {
        return [
            'email.required' => 'שדה אימייל הוא שדה חובה',
            'email.email' => 'שדה זה חייב להכיל אימייל',
            
        ];
    }*/
    
}
