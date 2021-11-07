<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/about', 'AboutController@index')->name('about');


Route::post('/store', 'ProductController@store')->name('post_product');
Route::get('/edit/{id}', 'ProductController@edit')->name('edit_product');
Route::patch('/update/{id}', 'ProductController@update')->name('patch_product');
Route::get('/delete/{id}', 'ProductController@destroy')->name('delete_product');
