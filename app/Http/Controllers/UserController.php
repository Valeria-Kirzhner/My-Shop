<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\SigninRequest;

class UserController extends MainController
{
    public function getSignin(){
        self::$data['title'] .= 'sign in page';
        return view('forms.signin',  self::$data);
    }
    public function postSignin(SigninRequest $request){// dependency injection -> the request must first get over validation
        echo __METHOD__;
    }

}
