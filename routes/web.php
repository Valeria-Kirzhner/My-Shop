<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;

Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/shop', [ShopController::class, 'categories']);


