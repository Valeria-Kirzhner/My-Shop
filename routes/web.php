<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;



# Shop
Route::prefix('shop')->group(function() {
    Route::get('/', [ShopController::class, 'categories']);
    Route::get('/add-to-cart', [ShopController::class, 'addToCart']);
    Route::get('/order', [ShopController::class, 'order']);
    Route::get('/clear-cart', [ShopController::class, 'clearCart']);
    Route::get('/update-cart', [ShopController::class, 'updateCart']);
    Route::get('/remove-item/{id}', [ShopController::class, 'removeItem']);
    Route::get('/checkout', [ShopController::class, 'checkout']);
    Route::get('{cat_url}/{prd_url}', [ShopController::class, 'item']);
    Route::get('{cat_url}', [ShopController::class, 'products']);
});

# CMS
Route::middleware(['cmsadmin'])->group(function() {
    Route::prefix('cms')->group(function() {
    Route::get('dashboard', [CmsController::class, 'dashboard']); 
    Route::resource('menu', MenuController::class);
    Route::resource('content', ContentController::class);
    Route::resource('categories', CategoriesController::class);
    });
});

# User
Route::prefix('user')->group(function() {
    Route::get('signin', [UserController::class, 'getSignin']); 
    Route::post('signin', [UserController::class, 'postSignin']);
    Route::get('signup', [UserController::class, 'getSignup']); 
    Route::post('signup', [UserController::class, 'postSignup']);  
    Route::get('logout', [UserController::class, 'logout']); 
});

# Pages
Route::get('/', [PagesController::class, 'home']);
Route::get('{url}', [PagesController::class, 'content']);



