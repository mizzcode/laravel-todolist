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

Route::controller(TodolistController::class)->middleware('member')->group(function () {
    Route::get('/', 'todolist');
    Route::post('/', 'addTodo');
    Route::post('/{id}/delete', 'removeTodo');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'viewLogin')->middleware('guest');
    Route::post('/login', 'login')->middleware('guest');
});
