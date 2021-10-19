@extends('main')
@section('about') 
<div class="row">
    <div class="col-md-12">
        <h1>{{ str_replace('My SHOP | ', '', $title)}}</h1>
    </div>
</div>
@if( !empty($products) )
<div class="row">
@foreach ($products as $product)
<div class="col-md-6">
    <a href="{{ url('shop/' . $cat_url . '/' . $product['url'])}}" style="text-decoration: none; color:black">
    <h3>{{$product['title']}}</h3>
    <p><img width="300" height="400" src="{{asset('images/' . $product['image'])}}" alt=""></p>
    </a>
    <p>{!!$product['article']!!}</p>
    <p><b>Price: </b>{{$product['price']}} $</p>
    <p>
        @if( ! Cart::get($product['id']))
        <input data-id="{{$product['id']}}" class="btn btn-success add-to-cart-btn" type="button" value="+ Add to cart">
        @else
        <input class="btn btn-success add-to-cart-btn" disabled="disabled" type="button" value="Item in cart">
        @endIf
    </p>
</div>
@endforeach
</div>
@endif
@endsection