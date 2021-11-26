<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session, Cart, DB;

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
    static public function getOrders(){
        $sql = "SELECT o.*,u.name FROM orders o "// u need oll orders from orders but only name from isers
                . "JOIN users u ON u.id = o.user_id "
                . "ORDER BY o.created_at DESC";
                return DB::select($sql);// DB is laravel class .
    }
}
