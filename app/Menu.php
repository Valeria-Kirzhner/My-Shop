<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
    protected $casts = [
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'datetime:d-m-Y H:00',
    ];
    static public function save_new($request) {
        $menu = new self();
        $menu->link = $request['link'];
        $menu->mtitle = $request['mtitle'];
        $menu->url = $request['url'];
        $menu->save();
        Session::flash('sm', 'Menu has been saved');

    }
    static public function update_item($request, $id){
        $menu = self::find($id);
        $menu->link = $request['link'];
        $menu->mtitle = $request['mtitle'];
        $menu->url = $request['url'];
        $menu->save();
        Session::flash('sm', 'Menu has been updated');
    }
}
