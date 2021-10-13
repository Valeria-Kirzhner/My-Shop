@extends('main')
@section('home') 
<div class="row">
    <div class="col-md-12">
        <h1>My Shop categories</h1>
    </div>
</div>
<div class="row">
    @foreach ($categories as $category)
    <div class="col-md-4 col-sm-6 pt-10">
        <a href="{{ url('shop/' .  $category['url']) }}">
        <h3>
            {{$category['title']}}
        </h3>
        
        <p><img src="{{ asset('images/' . $category['image'] )}}" width="200" height="225"></p>
        </a>
        <p>{{$category['article']}}</p>

    </div>
        
    @endforeach
</div>
@endsection