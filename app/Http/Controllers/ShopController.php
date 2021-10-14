<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;



class ShopController extends MainController
{
    public function categories (){
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['title'] .= 'Shop Categories';
        return view('content.categories', self::$data);
    }
    public function products ($cat_url){
        Product::getProduct($cat_url, self::$data);
        return view('content.products', self::$data);
    }
}
