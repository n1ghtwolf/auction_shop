<?php

use App\Http\Controllers\AuctionLotsController;
use App\Http\Controllers\CategoryManagerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/lots', 'AuctionLotsController@index')->name('auctions');
Route::get('/', 'AuctionLotsController@index')->name('auctions');

Route::group(['prefix' => '/lots'], function () {
    Route::get('/show', [AuctionLotsController::class, 'showLot'])->name('lots.show');
    Route::get('/new', [AuctionLotsController::class, 'newLot'])->name('lots.newLot');
    Route::post('/create', [AuctionLotsController::class, 'create'])->name('lots.create');
    Route::delete('/destroy', [AuctionLotsController::class, 'destroy'])->name('lots.destroy');
    Route::get('/change', [AuctionLotsController::class, 'change'])->name('lots.change');
    Route::patch('/update', [AuctionLotsController::class, 'update'])->name('lots.update');
});

Route::group(['prefix' => '/category'], function () {
    Route::get('/show', [CategoryManagerController::class, 'index'])->name('category.show');
    Route::delete('/destroy', [CategoryManagerController::class, 'destroy'])->name('category.destroy');
    Route::post('/create', [CategoryManagerController::class, 'create'])->name('category.create');
    Route::patch('/update', [CategoryManagerController::class, 'update'])->name('category.update');
});
