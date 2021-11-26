<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
        Product::save_new($request);
        return redirect('cms/products');
    }

    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_product ', self::$data);
    }

    public function edit($id)//get current menu info from db and fill the fields.
    {
        self::$data['categories'] = Categorie::all()->toArray();
        self::$data['product'] = Product::find($id)->toArray();
        return view('cms.edit_product', self::$data);
    }

    public function update(CategoryRequest $request, $id)
    {   
        Product::update_item($request, $id);
        return redirect('cms/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm', 'Product has been deleted');
        return redirect('cms/products');

    }
}
