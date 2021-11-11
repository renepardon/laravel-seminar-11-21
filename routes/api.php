<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login'])->name('api.auth.login');

Route::middleware('auth:api')->group(function () {
    Route::resource('user', UserController::class)->except(['create', 'edit']);
    Route::delete('user/{user}/force', [UserController::class, 'forceDestroy'])->name('user.force-destroy');
});
