<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;

Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/shop', [ShopController::class, 'categories']);
// Itzhak , how does it knows what is cat_url ???  :-O
Route::get('/shop/{cat_url}', [ShopController::class, 'products']);




