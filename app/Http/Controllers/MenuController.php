<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;

class MenuController extends MainController
{

    public function index()
    {
        return view('cms.menu', self::$data);
    }

    public function create()
    {
        return view('cms.add_menu', self::$data);
    }

    public function store(MenuRequest $request)
    {
        
    }


    public function show($id)
    {
        
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
