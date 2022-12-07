<?php

Route::group(['prefix' => '/lots'], function () {
    Route::get('/show', 'AuctionLotsController@showLot')->name('lots.show');
    Route::get('/new', 'AuctionLotsController@newLot')->name('lots.newLot');
    Route::post('/create', 'AuctionLotsController@create')->name('lots.create');
//    Route::get('/remove', 'AuctionLotsController@index')->name('lots.remove');
    Route::post('/destroy', 'AuctionLotsController@destroy')->name('lots.destroy');
    Route::get('/change', 'AuctionLotsController@change')->name('lots.change');
    Route::post('/update', 'AuctionLotsController@update')->name('lots.update');
    Route::get('/manage', 'CategoryManagerController@index')->name('lots.manageCategories');
    Route::post('/manage_apply', 'CategoryManagerController@changeCategories')->name('lots.manage_apply');
    Route::post('/manage_destroy', 'CategoryManagerController@destroy')->name('lots.manage_destroy');
    Route::post('/manage_new', 'CategoryManagerController@create')->name('lots.manage_new');
    Route::post('/manage_change', 'CategoryManagerController@update')->name('lots.manage_change');
});
