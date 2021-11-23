@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit this category -</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ url('cms/categories/' . $category['id'])}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <input type="hidden" name="item_id" value="{{$category['id']}}">
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input name="title" type="text"  value="{{ $category['title']}}" class="form-control origin-text" placeholder="title" id="title" aria-describedby="title">
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">Url:</label>
            <input name="url" type="text"  value="{{ $category['url']}}" class="form-control target-text" placeholder="url" id="url" aria-describedby="url">
          </div>
          <div class="mb-3">
              <label for="article" class="form-label">Article:</label>
              <textarea id="article" name="article" class="form-control" rows="3">{{ $category['article']}}</textarea>
          </div>
          <div class="mb-3">
            <img width="50" src="{{ asset('images/' . $category['image'])}}" alt=""><br><br>
            <label for="image" class="form-label">Change category image:</label>
            <input type="file" id="image" name="image" class="form-control" rows="3">
          </div>
          <a href="{{ url('cms/categories')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-primary " type="submit" name="Update" value="Save">
      </form>
    </div>
  </div>

  @endsection
