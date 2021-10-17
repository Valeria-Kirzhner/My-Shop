<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use Cart;



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
    public function item ($cat_url, $prd_url) {

        if($product = Product::where('url', '=', $prd_url)->first()){
            $product = $product->toArray();
            self::$data['title'] .= $product['title'];
            self::$data['product'] = $product;
            return view('content.item', self::$data);
        } else {
            abort(404);
        }
    }
}
