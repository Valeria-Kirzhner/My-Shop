<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session, Cart;

class Order extends Model
{
    static public function save_new(){
         $cartCollection = Cart::getContent();
         $cart = $cartCollection->toArray();
         $order = new self();
         $order->user_id = Session::get('user_id');
         $order->data = serialize($cart);// revert the array into php format and than i can unserialize it back to array
         $order->total = Cart::getTotal();
         $order->save();
         Cart::clear();
         Session::flash('sm', 'Thanks, your order saved!');
        
        
        
    } 
}
