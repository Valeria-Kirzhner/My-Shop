<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CmsController extends MainController
{
    public function dashboard () {
        return view('cms.dashboard', self::$data);
    }
}