<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use DB;

class CmsController extends MainController
{
    public function dashboard () {
        return view('cms.dashboard', self::$data);
    }
    public function orders () {
        self::$data['orders'] = Order::getOrders();
        return view('cms.orders', self::$data);
    }
}
