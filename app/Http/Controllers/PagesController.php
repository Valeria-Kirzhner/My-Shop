<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PagesController extends MainController
{
    static public function home(){
        self::$data['title'] .= 'Home Page'; 
       return view('content/home', self::$data); 
    }

    static public function content($url){

        $contents = DB::table('contents')
                    ->join('menus', 'menus.id', '=', 'contents.menu_id')
                    ->where('menus.url', '=', $url)
                    ->get()
                    ->toArray();
        if( ! $contents ) abort(404);
        self::$data['title'] .= $contents[0]->mtitle;
        self::$data['contents'] = $contents;
        return view('content.content', self::$data);
    }

}
