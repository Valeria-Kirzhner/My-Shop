<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Categorie;
use App\Product;


use Session;

class ProductsController extends MainController
{

    public function index()
    {
        self::$data['products'] = Product::all()->toArray();
        return view('cms.products', self::$data);
    }

    public function create()
    {
        self::$data['categories'] = Categorie::all()->toArray();
        return view('cms.add_product', self::$data);
    }

    public function store(ProductRequest $request)
    {
        Categorie::save_new($request);
        return redirect('cms/categories');
    }

    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_category ', self::$data);
    }

    public function edit($id)//get current menu info from db and fill the fields.
    {
        self::$data['category'] = Categorie::find($id)->toArray();
        return view('cms.edit_category', self::$data);
    }

    public function update(CategoryRequest $request, $id)
    {
        Categorie::update_item($request, $id);
        return redirect('cms/categories');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        Session::flash('sm', 'Category has been deleted');
        return redirect('cms/categories');

    }
}
