<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart, Session; 

class Product extends Model
{

    static public function getProduct($cat_url, &$data){

        if( $category = Categorie::where('url', '=',$cat_url)->first() ){

            $category = $category->toArray();
            $data['title'] .= $category['title'] . ' products';
            $data['cat_url'] = $cat_url;
            
            if( $products =  Categorie::find($category['id'])->products ){

                $data['products'] = $products->toArray();

            }  
        } else { // if there is no category
            abort(404);
        }
    }
    static public function addToCart ($id){

        if( ! empty($id) && is_numeric($id) ){ //if its not a hacker

            if( ! Cart::get($id)){// if these product isn't in the cart yet

                if( $product = self::find($id)){// Product class recieve find method from Model.

                    $product = $product->toArray();
                    Cart::add($id, $product['title'], $product['price'], 1, array());// 1 = quantity, the array is extra info
                    Session::flash('sm',  $product['title'] . ' added to cart !');// sm = success message.
                }
            }
        }
    }
    static function updateCart($request){ // ajax - supposet to recieve two properties - > id + operation

        if(! empty($request['id']) && is_numeric($request['id'])){

            if( ! empty($request['operation'])){

                $item = Cart::get($request['id']);// this is recheck for sequre reason.

                if( $item ){ // only if item truthy

                    if( $request['operation'] == '+'){

                        Cart::update($request['id'], ['quantity' => 1]);
                         
                    } elseif( $request['operation'] == '-') {

                        $item = $item->toArray();
                        
                        if( $item['quantity'] -1 != 0 ){

                           Cart::update($request['id'], ['quantity' => -1]);

                        }

                    }
                }
            }
        }
    }
}
