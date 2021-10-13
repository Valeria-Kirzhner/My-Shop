<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends MainController
{
    static public function home(){
        self::$data['title'] .= 'Home Page'; 
       return view('content/home', self::$data); 
    }
    static public function about(){
        self::$data['title'] .= 'About Us'; 
         return view('content/about', self::$data);
     }

}
