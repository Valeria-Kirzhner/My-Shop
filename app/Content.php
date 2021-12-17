<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Session;

class Content extends Model
{

    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'datetime:d-m-Y H:00',
    ];

    static public function save_new($request){

        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Content have benn saved');
    }
    static public function update_item($request,$id){

        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->title = $request['title'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Content have benn updated');

    }
}
