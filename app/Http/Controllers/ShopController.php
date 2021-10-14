<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;



class ShopController extends MainController
{
    public function categories (){
        $products = Categorie::find(1)->products; // Itzhak, how does it knows what are the ->products ???
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['title'] .= 'Shop Categories';
        return view('content.categories', self::$data);
    }
    public function products ($cat_url){

        echo $cat_url;
    }
}
