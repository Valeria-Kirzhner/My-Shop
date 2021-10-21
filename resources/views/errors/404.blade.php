<?php

$title = 'MY SHOP | page 404';
$menu = App\Menu::all()->toArray();
?>

@extends('main')
@section('home')
<div class="row">
    <div class="col-md-12">
        <br><br>
        <div class="alert alert-warning" role="alert">
            <h3>OOPS...! The page you looking is not found!</h3>
            <p>Error 404</p>
        </div>
    </div>
</div>
    
@endsection