<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;

# Pages
Route::get('/', [PagesController::class, 'home']);
Route::get('/about', [PagesController::class, 'about']);

# Shop
Route::prefix('shop')->group(function() {
    Route::get('/', [ShopController::class, 'categories']);
    Route::get('{cat_url}', [ShopController::class, 'products']);
});





