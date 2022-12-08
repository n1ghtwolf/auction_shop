<?php

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
    Route::get('/show', 'AuctionLotsController@showLot')->name('lots.show');
    Route::get('/new', 'AuctionLotsController@newLot')->name('lots.newLot');
    Route::post('/create', 'AuctionLotsController@create')->name('lots.create');
    Route::delete('/destroy', 'AuctionLotsController@destroy')->name('lots.destroy');
    Route::get('/change', 'AuctionLotsController@change')->name('lots.change');
    Route::patch('/update', 'AuctionLotsController@update')->name('lots.update');
});

Route::group(['prefix' => '/category'], function () {
    Route::get('/show', 'CategoryManagerController@index')->name('category.show');
    Route::delete('/destroy', 'CategoryManagerController@destroy')->name('category.destroy');
    Route::post('/create', 'CategoryManagerController@create')->name('category.create');
    Route::patch('/update', 'CategoryManagerController@update')->name('category.update');
});
