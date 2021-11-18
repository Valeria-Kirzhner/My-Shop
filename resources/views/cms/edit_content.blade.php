@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit this content -</h1>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ url('cms/content')}}" method="POST">
        {{csrf_field()}}
          <div class="mb-3">
            <label for="menu-link" class="form-label">Menu Link:</label>
            <select name="menu_id" class="form-control" id="menu-link">
              <option value="">Choose menu link</option>
                @foreach ($menu as $item)
                    <option @if( $content['menu_id'] == $item['id']) @endif selected="selected" value="{{$item['id']}}">{{$item['link']}}</option>
                @endforeach
            </select>
        </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input name="title" type="text"  value="{{ $content['title'] }}" class="form-control" placeholder="title" id="title" aria-describedby="title">
          </div>
          <div class="mb-3">
              <label for="article" class="form-label">Article:</label>
              <textarea id="article" name="article" class="form-control" id="article" rows="3">{{ $content['article']}}</textarea>
          </div>
        <a href="{{ url('cms/content')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-primary " type="submit" name="submit" value="Update">
    </form>
    </div>
  </div>

  @endsection
