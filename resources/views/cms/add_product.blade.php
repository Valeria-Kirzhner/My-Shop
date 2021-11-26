@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add new product</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ url('cms/products')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="mb-3">
          <label for="categorie-id" class="form-label">Category:</label>
          <select name="categorie_id" id="categorie_id" class="form-control origin-tex">
            <option value="">Choose category</option>
            @foreach ($categories as $category)
                <option @if(old('categorie_id') == $category['id'] ) selected="selected" @endif value="{{ $category['id']}}">{{ $category['title']}}</option>
            @endforeach
          </select>
        </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input name="title" type="text"  value="{{ old('title')}}" class="form-control origin-text" placeholder="title" id="title" aria-describedby="title">
          </div>
          <div class="mb-3">
            <label for="url" class="form-label">Url:</label>
            <input name="url" type="text"  value="{{ old('url')}}" class="form-control target-text" placeholder="url" id="url" aria-describedby="url">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input name="price" type="text"  value="{{ old('price')}}" class="form-control " placeholder="price" id="price" aria-describedby="price">
          </div>
          <div class="mb-3">
              <label for="article" class="form-label">Article:</label>
              <textarea id="article" name="article" class="form-control" rows="3">{{ old('article')}}</textarea>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Product image:</label>
            <input type="file" id="image" name="image" class="form-control" rows="3">
          </div>
          <a href="{{ url('cms/products')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-primary " type="submit" name="submit" value="Save">
      </form>
    </div>
  </div>

  @endsection
