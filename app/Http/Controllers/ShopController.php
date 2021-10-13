<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;


class ShopController extends MainController
{
    public function categories (){
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['title'] .= 'Shop Categories';
        return view('content.categories', self::$data);
    }
}
