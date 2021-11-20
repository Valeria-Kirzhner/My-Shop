<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image, Session;

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
            //build the img to be sure it isn't have no viruses.
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(300, null, function($constraint){
                $constraint->aspectRatio();// to keep width relative to the height. 
            });
            $img->save(public_path() . '/images/' . $image_name);// the w is to mark that this is the new one.
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
 