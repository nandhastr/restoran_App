<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ManagerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Route Client
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [UserController::class, 'home'])->name('client.home');
Route::get('/client', [UserController::class, 'index'])->name('client.index');


// Client rating
Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');
Route::get('/rating/{rating}/delete', [RatingController::class, 'destroy'])->name('deleteRating');

// Route Kasir
Route::get('/order', [OrderController::class, 'index'])->name('order.index');

//Route Manager
Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');

// Manager CRUD Client
Route::get('/manager/client', [ClientController::class, 'index'])->name('manager.client.index');
Route::get('/manager/client/add', [ClientController::class, 'create'])->name('manager.client.create');
Route::post('manager/client/store', [ClientController::class, 'store'])->name('manager.client.store');
Route::get('/manager/{clients}/edit', [ClientController::class, 'edit'])->name('manager.client.edit');
Route::post('/manager/{clients}/update', [ClientController::class, 'update'])->name('manager.client.update');
Route::get('/manager/{clients}/delete', [ClientController::class, 'destroy'])->name('manager.client.delete');

// Manager CRUD Product
Route::get('/manager/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/manager/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/manager/produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/manager/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/manager/{produk}/update', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/manager/delete_produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.delete');

Route::get('/export', [ExportController::class, 'index'])->name('export.index');
