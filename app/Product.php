<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart, Session, Image; 

class Product extends Model
{
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'datetime:d-m-Y H:00',
    ];

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
    static public function save_new($request){
         
        $img = self::loadImage($request);
        $image_name = $img ? $img : 'default.png';

        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->url = $request['url'];
        $product->image = $image_name;
        $product->price = $request['price'];
        $product->save();
        Session::flash('sm', 'Product has been saved');
    }

    static public function update_item($request, $id){
        $image_name = self::loadImage($request);// if no photo was chousen this will be the varieble
        
        $product = self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->title = $request['title'];
        $product->url = $request['url'];
        $product->price = $request['price'];
        $product->article = $request['article'];
       if( $image_name ){
            $product->image = $image_name;
        }
        $product->save();
        Session::flash('sm', 'Product has been updated');
    }
    
    static private function loadImage($request){// this for increase duplication of code
        $image_name = '';// if no photo was chousen this will be the varieble
        if ($request->hasFile('image') && $request->file('image')->isValid()){

            $file = $request->file('image');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images', $image_name);
            //build the img to be sure it isn't have no viruses.
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(300, null, function($constraint){
                $constraint->aspectRatio();// to keep width relative to the height. 
            });
            $img->save(public_path() . '/images/' . $image_name);// the w is to mark that this is the new one.
        }
        return $image_name;
    }
}
