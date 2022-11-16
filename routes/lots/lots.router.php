<?php

Route::group(['prefix' => '/lots'], function () {
    Route::get('/new', 'auctionLotsController@index')->name('lots.new');
    Route::post('/create', 'auctionLotsController@create')->name('lots.create');
    Route::get('/remove', 'auctionLotsController@index')->name('lots.remove');
    Route::post('/delete', 'auctionLotsController@create')->name('lots.delete');
    Route::get('/change', 'auctionLotsController@index')->name('lots.change');
    Route::post('/update', 'auctionLotsController@create')->name('lots.update');
});
