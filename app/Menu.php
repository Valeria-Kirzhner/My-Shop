<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Menu extends Model
{
    static public function save_new($request) {
        $menu = new self();
        
    }
}
