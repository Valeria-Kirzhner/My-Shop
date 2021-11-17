<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;
use App\Content;

use Session;

class ContentController extends MainController
{

    public function index()
    {
        self::$data['content'] = Content::all()->toArray();
        return view('cms.content', self::$data);
    }

    public function create()
    {
        return view('cms.add_content', self::$data);
    }

    public function store(MenuRequest $request)
    {
        Menu::save_new($request);
        return redirect('cms/menu');
    }

    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_content', self::$data);
    }

    public function edit($id)//get current menu info from db and fill the fields.
    {
        self::$data['menu'] = Menu::find($id)->toArray();
        return view('cms.edit_menu', self::$data);
    }

    public function update(MenuRequest $request, $id)
    {
        Menu::update_item($request, $id);
        return redirect('cms/menu');
    }

    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm', 'Content has been deleted');
        return redirect('cms/content');

    }
}
