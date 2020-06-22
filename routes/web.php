<?php

use Illuminate\Support\Facades\Route;


Route::post('/delete', 'applyController@massDelete')->name('delete-form');

Route::get('/', 'applyController@allProductData')->name('index');
Route::get('/apply', 'applyController@allCategoryData')->name('apply');
Route::post('/apply/submit', 'applyController@submit')->name('apply-form');
