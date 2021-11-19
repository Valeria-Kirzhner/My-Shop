<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Categorie;
use App\Content;

use Session;

class CategoriesController extends MainController
{

    public function index()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.categories', self::$data);
    }

    public function create()
    {
        return view('cms.add_category', self::$data);
    }

    public function store(CategoryRequest $request)
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }

    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_content', self::$data);
    }

    public function edit($id)//get current menu info from db and fill the fields.
    {
        self::$data['content'] = Content::find($id)->toArray();
        return view('cms.edit_content', self::$data);
    }

    public function update(ContentRequest $request, $id)
    {
        Content::update_item($request, $id);
        return redirect('cms/content');
    }

    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm', 'Content has been deleted');
        return redirect('cms/content');

    }
}
