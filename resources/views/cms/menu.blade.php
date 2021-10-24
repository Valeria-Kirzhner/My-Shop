@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Site Menu</h1>
</div>
  <div class="row">
    <div class="col-lg-12">
      <p>
        <a class="btn btn-primary" href="{{ url('cms/menu/create')}}">+ Add new menu</a>
      </p>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Updated at</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($menu as $item)
            <tr>
              <td>{{ $item['link']}}</td>
              <td>{{ $item['updated_at']}}</td>
              <td>
                <a href="#">Edit</a>
                <a href="#">Delete</a>
              </td>
            </tr>
        @endforeach
      </tbody>

      </table>

    </div>
  </div>

  @endsection
