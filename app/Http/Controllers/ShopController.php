<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Order;
use Cart, Session;



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
    public function addToCart(Request $request){// dependency injection becouse these is ajax request
        Product::addToCart($request['id']);
    }

    public function checkout () {
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        sort($cart); // will sort by id instead by qty
        self::$data['cart'] = $cart;
        self::$data['title'] .= 'checkout page';
        return view('content.checkout', self::$data);
    }
    public function clearCart () {
        Cart::clear();
        return redirect('shop/checkout');
    }
    public function updateCart (Request $request) {// dependency injection becouse these is ajax request
        Product::updateCart($request);
    }
    public function removeItem($id){
        Cart::remove($id);
        return redirect('shop/checkout');

    }
    public function order (){
        if( Cart::isEmpty()){
            return redirect('shop');
        }else {
            if( ! Session::has('user_id')){

                return redirect('user/signin?rt=shop/checkout');// rt = return to
            }else {
                Order::save_new();
                return redirect('shop');
            }
        } 
    }

}
