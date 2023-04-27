<?php

use App\Http\Controllers\TodolistController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->redirectToIntended('/todolist');
});

Route::controller(UserController::class)->group(function () {

    Route::get('/register', 'viewRegister')->middleware('guest')->name('register');
    Route::post('/register', 'register')->name('post_register');

    Route::get('/login', 'viewLogin')->middleware('guest')->name('login');
    Route::post('/login', 'login')->name('post_login');

    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('/todolist', TodolistController::class)->middleware('auth')->names('todolist')->only(['index', 'store', 'destroy']);
