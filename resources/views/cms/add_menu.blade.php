@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add new menu link</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ url('cms/menu')}}" method="POST">
        {{csrf_field()}}
        <div class="mb-3">
            <label for="link" class="form-label">Link:</label>
            <input name="link" value="{{ old('link')}}" type="text" class="form-control origin-text" id="link" aria-describedby="link" placeholder="link">
        </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input name="mtitle" type="text"  value="{{ old('title')}}" class="form-control" placeholder="title" id="title" aria-describedby="title">
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Url:</label>
          <input name="url" type="text"  value="{{ old('url')}}" class="form-control target-text" placeholder="url" id="url" aria-describedby="url">
      </div>
        <a href="{{ url('cms/menu')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-primary " type="submit" name="submit" value="Save">
    </form>
    </div>
  </div>

  @endsection
