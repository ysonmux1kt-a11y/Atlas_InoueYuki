<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    //「ログインしていない人だけがアクセスできる」ルート群

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
          ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('register', [RegisteredUserController::class, 'create']);
    Route::post('register', [RegisteredUserController::class, 'store']);

});

// Route::post('added', [RegisteredUserController::class, 'added']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    // ->middleware('auth')
    ->name('logout');
