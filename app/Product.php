<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    static public function getProduct($cat_url, &$data){

        if( $category = Categorie::where('url', '=',$cat_url)->first() ){

            $category = $category->toArray();
            $data['title'] .= $category['title'] . 'products';

            if( $products =  Categorie::find($category['id'])->products ){

                $data['products'] = $products->toArray();

            }  
        } else { // if there is no category
            abort(404);
        }
    }
}
