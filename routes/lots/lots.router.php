<?php

Route::group(['prefix' => '/lots'], function () {
    Route::get('/show', 'AuctionLotsController@showLot')->name('lots.show');
    Route::get('/new', 'AuctionLotsController@newLot')->name('lots.newLot');
    Route::post('/create', 'AuctionLotsController@create')->name('lots.create');
//    Route::get('/remove', 'AuctionLotsController@index')->name('lots.remove');
    Route::post('/delete', 'AuctionLotsController@delete')->name('lots.delete');
    Route::get('/change', 'AuctionLotsController@change')->name('lots.change');
    Route::post('/update', 'AuctionLotsController@update')->name('lots.update');
    Route::get('/manage', 'CategoryManagerController@index')->name('lots.manageCategories');
    Route::post('/manage_apply', 'CategoryManagerController@changeCategories')->name('lots.manage_apply');
    Route::post('/manage_delete', 'CategoryManagerController@delete')->name('lots.manage_delete');
    Route::post('/manage_new', 'CategoryManagerController@create')->name('lots.manage_new');
    Route::post('/manage_change', 'CategoryManagerController@update')->name('lots.manage_change');
});
