<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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

//veiling routes
Route::get('/', [AuctionController::class, 'index'])->name('homepage');
Route::get('/auction/list', [AuctionController::class, 'list'])->name('auction.list');
Route::get('/auction/create', [AuctionController::class, 'create'])->name('auction.create');
Route::post('auction/store', [AuctionController::class, 'store'])->name('auction.store');

// veiling\items routes
Route::get('/auction/item/create/{id}', [ItemController::class, 'create'])->name('item.create');
Route::post('/auction/items/store', [ItemController::class, 'store'])->name('item.store');

//user routes
Route::get('/login', [UserController::class, 'loginForm'])->name('login-form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
