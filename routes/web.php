<?php

Route::get('/', 'TaskController@index')->name('home');
Route::get('/home', 'TaskController@index')->name('home');
Route::post('/', 'TaskController@checkTask')->name('checkTask');
Route::post('/home', 'TaskController@checkTask')->name('checkTask');

Route::get('/home_add', function () {return view('home_add');});
Route::post('home_add_task', 'TaskController@add_task')->name('add_task');
Route::get('home_edit', 'TaskController@edit_task')->name('edit_task');
Route::post('home_edit_task', 'TaskController@home_edit_task')->name('home_edit_task');
Route::get('del_task', 'TaskController@del_task')->name('del_task');
