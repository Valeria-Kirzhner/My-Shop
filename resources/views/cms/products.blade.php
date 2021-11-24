@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Site Products</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <p>
        <a class="btn btn-primary" href="{{ url('cms/products/create')}}">+ New product</a>
      </p>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Title</th>
          <th>Product image</th>
          <th>Updated at</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $item)
            <tr>
              <td>{{ $item['title']}}</td>
              <td><img width="70" src=" {{ asset('images/' . $item['image'])}} "></td>
              <td>{{ $item['updated_at']}}</td>
              <td>
                <a href="{{ url('cms/products/' . $item['id'] . '/edit')}}">Edit</a> | 
                <a href="{{ url('cms/products/' . $item['id']) }}">Delete</a>
              </td>
            </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>

  @endsection
