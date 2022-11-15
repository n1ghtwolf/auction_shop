<?php

Route::group(['prefix' => '/lots'], function () {
    Route::get('/new', 'OrderController@index')->name('lots.new');
    Route::post('/create', 'OrderController@create')->name('lots.create');
    Route::get('/remove', 'OrderController@index')->name('lots.remove');
    Route::post('/delete', 'OrderController@create')->name('lots.delete');
    Route::get('/change', 'OrderController@index')->name('lots.change');
    Route::post('/update', 'OrderController@create')->name('lots.update');
});
