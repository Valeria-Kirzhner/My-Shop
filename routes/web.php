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
    Route::get('/add-to-cart', [ShopController::class, 'addToCart']);
    Route::get('/clear-cart', [ShopController::class, 'clearCart']);
    Route::get('/update-cart', [ShopController::class, 'updateCart']);
    Route::get('/remove-item/{id}', [ShopController::class, 'removeItem']);
    Route::get('/checkout', [ShopController::class, 'checkout']);
    Route::get('{cat_url}', [ShopController::class, 'products']);
    Route::get('{cat_url}/{prd_url}', [ShopController::class, 'item']);
});





