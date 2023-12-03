<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuctionController;

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

//veiling route
Route::get('/', [AuctionController::class, 'index'])->name('homepage');

//user routes
Route::get('/login', [UserController::class, 'loginForm'])->name('login-form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
