<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image, Session;

class Categorie extends Model
{
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'datetime:d-m-Y H:00',
    ];
    public function products(){

        return $this->hasMany('App\Product');
    }
    static public function save_new($request){
         
        $img = self::loadImage($request);
        $image_name = $img ? $img : 'default.png';

        $category = new self();
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->url = $request['url'];
        $category->image = $image_name;
        $category->save();
        Session::flash('sm', 'Category has been saved');
    }

    static public function update_item($request, $id){

        $image_name = self::loadImage($request);// if no photo was chousen this will be the varieble
        $category = self::find($id);
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->url = $request['url'];
        if($image_name){// if it's not = '' - means that some photo was chousen
            $category->image = $image_name;

        }
        $category->save();
        Session::flash('sm', 'Category has been saved');
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
 