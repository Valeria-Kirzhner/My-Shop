@extends('main')
@section('about') 
<div class="row">
    <div class="col-md-12">
        <h1>MY SHOP Checkout Page </h1>
    </div>
</div> 
<div class="row">
    <div class="col-md-12">
        @if( $cart)
            <table class="table table-border">
                <thead>
                    <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>
                                <input data-id="{{$item['id']}}" type="button" value="-" class="update-cart">
                                <input class="text-center" type="text" size="1" id="" value="{{$item['quantity']}}">
                                <input data-id="{{$item['id']}}" type="button" value="+" class="update-cart">
                            </td>
                            <td>{{$item['price']}} $ </td>
                            <td>{{$item['quantity'] * $item['price']}} $</td>
                            <td class="text-center">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" style="color: red;" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                      </svg>
                                 </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p><b>Total in cart: </b> {{ Cart::getTotal()}} $
                <div class="float-end">
                    <a class="btn btn-secondary" href="{{ url('shop/clear-cart')}}">Clear cart</a>
                </div>
            </p>
        @else
        <p><i> No Items in the cart.</i></p>
        @endIf
    </div>
</div>
@endsection 