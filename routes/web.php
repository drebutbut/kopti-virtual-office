<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BisnisController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/persediaan', [BisnisController::class, 'stock']);
Route::middleware(['auth'])->group(function(){
    Route::resource('/transaksi', TransaksiController::class);
    Route::resource('/persediaan', StockController::class);
    Route::resource('/produk', ProdukController::class);
    Route::get('/katalog', [KatalogController::class, 'index']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
