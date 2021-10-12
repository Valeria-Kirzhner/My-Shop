<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    static public function home(){
       return view('home');
    }
    static public function about(){
        return view('about');
     }
    
}
