<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use App\User;
use Session;

class UserController extends MainController
{

    function __construct()
    {
        parent::__construct();// to not overwright parent constract
        $this->middleware('signmid', ['except' => ['logout']]);// logout is name of a method not route

    }

    public function getSignin(){
        self::$data['title'] .= 'sign in page';
        return view('forms.signin',  self::$data);
    }
    public function postSignin(SigninRequest $request){// dependency injection -> the request must first get over validation
        
        $rt = !empty($request['rt']) ? $request['rt'] : '';

        if(User::validate($request)){// true or false

            return redirect($rt);// if rt is not null -> shop/checkout if its null -> redirect to ''
        } else {
            self::$data['title'] .= 'sign in page';
            return view('forms.signin', self::$data)->withErrors('Invalid Email/Password');
        }
    }

    public function getSignup(){

        self::$data['title'] .= 'sign up page';
        return view('forms.signup',  self::$data);
    }

    public function postSignup(SignupRequest $request){

        User::save_new($request);
        return redirect('');

    }

    public function logout () {
        Session::flush();
        return redirect('user/signin');
    }


}
