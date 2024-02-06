<?php

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

// Common Resource Routes:
// index - Show all listings
// show - Show single listing
// create - Show form to create new listing
// store - Store new listing
// edit - Show form to edit listing
// update - Update listing
// destroy - Delete listing 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/users', [UserController::class, 'store']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout']);

Route::get('/profile/{user}', [UserController::class, 'show'])->middleware('auth');
