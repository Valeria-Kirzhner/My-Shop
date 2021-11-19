<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Categorie extends Model
{
    public function products(){

        return $this->hasMany('App\Product');
    }
    static public function save_new($request){
         
        $image_name = 'default.png';

        if ($request->hasFile('image') && $request->file('image')->isValid()){

            $file = $request->file('image');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images', $image_name);
        }
        $category = new self();
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->url = $request['url'];
        $category->image = $image_name;
        $category->save();
        Session::flash('sm', 'Category has been saved');
    }

}
 