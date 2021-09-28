<?php

Route::get('/product','App\Http\Controllers\ProductController@index');
Route::post('/product','App\Http\Controllers\ProductController@create');