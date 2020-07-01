<?php

use Illuminate\Support\Facades\Route;


Route::post('/delete', 'applyController@massDelete')->name('delete-form');
Route::get('/', 'applyController@allProductData')->name('index');
Route::get('/apply', 'applyController@allCategoryData')->name('apply');
Route::post('/apply/submit', 'applyController@submit')->name('apply-form');
Route::get('/addCategories', 'applyController@addCategoriesData')->name('addCategories');
Route::post('/addCategories/submit', 'applyController@submitCategories')->name('addCategories-form');
Route::get('/addAtributes', 'applyController@addAtributesData')->name('addAtributes');
Route::post('/addAtributes/submit', 'applyController@submitAtributes')->name('addAtributes-form');
