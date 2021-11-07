@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit this menu</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{url('cms/menu' . $menu['id'])}}" method="POST">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <input type="hidden" name="item_id" value={{ $menu['id']}} >
        <div class="mb-3">
            <label for="link" class="form-label">Link:</label>
            <input name="link" value="{{ $menu['link']}}" type="text" class="form-control origin-text" id="link" aria-describedby="link" placeholder="link">
        </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input name="mtitle" type="text"  value="{{ $menu['mtitle']}}" class="form-control" placeholder="title" id="title" aria-describedby="title">
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">Url:</label>
          <input name="url" type="text"  value="{{ $menu['url']}}" class="form-control target-text" placeholder="url" id="url" aria-describedby="url">
      </div>
        <a href="{{ url('cms/menu')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-primary " type="submit" name="submit" value="Update">
    </form>
    </div>
  </div>

  @endsection
