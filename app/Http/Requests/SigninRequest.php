<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
