<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::post('/addtocart', [UserController::class, 'addToCart'])->name('addtocart')->middleware('auth');

Route::post('/findatable', [UserController::class, 'findATable'])
    ->name('book.table');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])
        ->name('dashboard');

    Route::post('/addtocart', [UserController::class, 'addToCart'])
        ->name('addtocart');

    Route::get('/foodcart', [UserController::class, 'foodCart'])
        ->name('food.cart');

    Route::get('/foodcart/{id}', [UserController::class, 'removeCart'])
        ->name('delete.cart');

    Route::post('/confirmorder', [UserController::class, 'ConfirmOrder'])
        ->name('cart.confirm');

    Route::get('/orderstatus', [UserController::class, 'orderStatus'])
        ->name('order_status');
});

Route::get('/addfood', [AdminController::class, 'addFood'])
    ->middleware('auth', 'admin')
    ->name('admin.addfood');

Route::post('/addfood', [AdminController::class, 'createFood'])
    ->middleware('auth', 'admin')
    ->name('admin.createfood');

Route::get('/showfood', [AdminController::class, 'showFood'])
    ->middleware('auth', 'admin')
    ->name('admin.showfood');

Route::get('/deletefood/{id}', [AdminController::class, 'deleteFood'])
    ->middleware('auth', 'admin')
    ->name('admin.deletefood');

Route::get('/updatefood/{id}', [AdminController::class, 'updateFood'])
    ->middleware('auth', 'admin')
    ->name('admin.updatefood');

Route::post('/updatefood/{id}', [AdminController::class, 'postUpdateFood'])
    ->middleware('auth', 'admin')
    ->name('admin.postupdatefood');

Route::get('/vieworder', [AdminController::class, 'viewOrders'])
    ->middleware('auth', 'admin')
    ->name('admin.vieworders');

Route::get('/delivered/{id}', [AdminController::class, 'foodStatusDelivered'])
    ->middleware('auth', 'admin')
    ->name('admin.delivered');

Route::get('/cancel/{id}', [AdminController::class, 'foodStatusCancel'])
    ->middleware('auth', 'admin')
    ->name('admin.cancel');

Route::get('/viewbooked_table', [AdminController::class, 'viewBookedTable'])
    ->middleware('auth', 'admin')
    ->name('admin.viewbookedtable');
