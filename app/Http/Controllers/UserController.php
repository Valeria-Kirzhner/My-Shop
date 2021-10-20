<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\SigninRequest;
use App\User;
use Session;

class UserController extends MainController
{
    public function getSignin(){
        self::$data['title'] .= 'sign in page';
        return view('forms.signin',  self::$data);
    }
    public function postSignin(SigninRequest $request){// dependency injection -> the request must first get over validation
        if(User::validate($request)){// true or false

            return redirect('');
        } else {
            self::$data['title'] .= 'sign in page';
            return view('forms.signin', self::$data)->withErrors('Invalid Email/Password');
        }
    }

    public function getSignup(){
        self::$data['title'] .= 'sign up page';
        return view('forms.signup',  self::$data);

    }
    public function postSignup(){


    }

    public function logout () {
        Session::flush();
        return redirect('user/signin');
    }


}
