@extends('main')
@section('about') 
<div class="row">
    <div class="col-md-12">
        <h1>{{$product['title']}}</h1>
        <p><img width="300" height="400" src="{{ asset('images/' . $product['image'])}}" alt=""></p>
        <p>{!!$product['article']!!}</p>
        <p><b>{{$product['price']}} $</b></p>
        <p>
        <input class="btn btn-success add-to-cart-btn" type="button" value="+ Add to cart">
        <a class="btn btn-primary" href="{{url('shop/checkout')}}">Checkout</a>
    </p>
    </div>
</div>
@endsection