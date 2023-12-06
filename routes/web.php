<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;

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

Route::get('/auction/archive', [AuctionController::class, 'archive'])->name('auction.archive');
Route::get('/auction/create', [AuctionController::class, 'create'])->name('auction.create')->middleware('checkRole:admin');
Route::post('auction/store', [AuctionController::class, 'store'])->name('auction.store')->middleware('checkRole:admin');
Route::get('/auction/show/{id?}', [AuctionController::class, 'show'])->name('auction.show');

// veiling\items routes
Route::get('/auction/item/create/{id}', [ItemController::class, 'create'])->name('item.create')->middleware('checkRole:admin');
Route::post('/auction/item/store', [ItemController::class, 'store'])->name('item.store')->middleware('checkRole:admin');
Route::get('/auction/item/show/{id}', [ItemController::class, 'show'])->name('item.show');
Route::get('/auction/item/edit/{id}', [ItemController::class, 'edit'])->name('item.edit')->middleware('checkRole:admin');
Route::post('/auction/item/update', [ItemController::class, 'update'])->name('item.update')->middleware('checkRole:admin');
Route::delete('/auction/item/destroy/{item}', [ItemController::class, 'destroy'])->name('item.destroy')->middleware('checkRole:admin');

// veiling\items\bid routes
Route::post('/auction/item/bid/store', [BidController::class, 'store'])->name('bid.store');
Route::get('/auction/item/bid/show', [BidController::class, 'show'])->name('bid.show');

//user routes
Route::get('/login', [UserController::class, 'loginForm'])->name('login-form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'registerForm'])->name('register-form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
