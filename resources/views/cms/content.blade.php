@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Site Content</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <p>
        <a class="btn btn-primary" href="{{ url('cms/content/create')}}">+ New content</a>
      </p>
      <table class="table table-bordered">
        <thead>
        <tr>
          <th>Title</th>
          <th>Updated at</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($content as $item)
            <tr>
              <td>{{ $item['title']}}</td>
              <td>{{ $item['updated_at']}}</td>
              <td>{{ $item['operation']}}</td>
              <td>
                <a href="{{ url('cms/content/' . $item['id'] . '/edit')}}">Edit</a> | 
                <a href="{{ url('cms/content/' . $item['id']) }}">Delete</a>
              </td>
            </tr>
        @endforeach
      </tbody>
      </table>
    </div>
  </div>

  @endsection
