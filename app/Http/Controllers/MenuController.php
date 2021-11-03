<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;
use Session;

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
        Menu::save_new($request);
        return redirect('cms/menu');
    }


    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_menu', self::$data);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        Session::flash('sm', 'Menu has been deleted');
        return redirect('cms/menu');

    }
}
