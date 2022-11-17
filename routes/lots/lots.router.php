<?php

Route::group(['prefix' => '/lots'], function () {
    Route::get('/show', 'auctionLotsController@showLot')->name('lots.show');
    Route::get('/new', 'auctionLotsController@newLot')->name('lots.newLot');
    Route::post('/create', 'auctionLotsController@create')->name('lots.create');
//    Route::get('/remove', 'auctionLotsController@index')->name('lots.remove');
    Route::post('/delete', 'auctionLotsController@delete')->name('lots.delete');
    Route::get('/change', 'auctionLotsController@change')->name('lots.change');
    Route::post('/update', 'auctionLotsController@update')->name('lots.update');
});
