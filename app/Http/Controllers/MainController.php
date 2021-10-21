<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MainController extends Controller
{
    static public $data = ['title'=> 'My SHOP | '];

    function __construct(){
        self::$data['menu'] = Menu::all()->toArray();
    }
}
