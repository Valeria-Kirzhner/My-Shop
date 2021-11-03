@extends('cms/cms_main')
@section('cms_content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h3 class="page-header">Are you sure you want to delete this item ?</h3>
</div>
<br><br>
  <div class="row">
    <div class="col-lg-8">
      <form action="{{ url('cms/menu/' . $id )}}" method="post">  
        {{csrf_field()}}
          {{ method_field('DELETE')}}

        <a href="{{ url('cms/menu')}}" class="btn btn-secondary">Cancel</a>
          <input class="btn btn-danger " type="submit" name="submit" value="Delete">
    </form>
    </div>
  </div>

  @endsection
