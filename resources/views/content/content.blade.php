@extends('main')
@section('home') 
@foreach ($contents as $content)
    <div class="row">
        <div class="col-md-12">
            <h3>{{$content->title}}</h3>
            <p>{!! $content->article !!}</p>
        </div>
    </div>
@endforeach
@endsection