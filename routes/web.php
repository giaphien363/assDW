<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardUserController;


Route::get('/', function () {
    return view('home');
});

Route::get('/logout_logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/checkLogIn', [AuthController::class, 'checkLogIn'])->name('checkLogIn');

Route::post('/checkSignUp', [AuthController::class, 'checkSignUp'])->name('checkSignUp');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

Route::get('/dashboard', [DashboardUserController::class, 'index'])
    ->name('dashboard');
