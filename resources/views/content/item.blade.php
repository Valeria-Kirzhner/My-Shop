@extends('main')
@section('home') 
<div class="row">
    <div class="col-md-12">
        <h1>{{$product['title']}}</h1>
        <p><img width="300" height="400" src="{{ asset('images/' . $product['image'])}}" alt=""></p>
        <p>{!!$product['article']!!}</p>
        <p><b>{{$product['price']}} $</b></p>
        <p>
            @if( ! Cart::get($product['id']))
            <input data-id="{{$product['id']}}" class="btn btn-success add-to-cart-btn" type="button" value="+ Add to cart">
            @else
            <input class="btn btn-success add-to-cart-btn" disabled="disabled" type="button" value="Added to cart">
            @endIf
            <a class="btn btn-primary" href="{{url('shop/checkout')}}">Checkout</a>
    </p>
    </div>
</div>
@endsection