<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class, 'home'])
        ->name('dashboard');
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
