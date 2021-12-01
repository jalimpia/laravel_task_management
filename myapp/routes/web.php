<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/about', 'AboutController@index')->name('about');


Route::post('/store', 'TaskController@store')->name('post_task');
Route::get('/edit/{id}', 'TaskController@edit')->name('edit_task');
Route::patch('/update/{id}', 'TaskController@update')->name('patch_task');
Route::get('/delete/{id}', 'TaskController@destroy')->name('delete_task');
Route::get('/delete/{id}', 'TaskController@destroy')->name('delete_task');
Route::patch('/update_order', 'TaskController@update_order')->name('update_order');
