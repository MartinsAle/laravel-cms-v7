<?php

use Illuminate\Support\Facades\Route;

Route::get('/permissions', 'PermissionController@index')->name('permission.index');
Route::post('/permissions', 'PermissionController@store')->name('permission.store');
Route::delete('/permissions/{permission}/destroy', 'PermissionController@destroy')->name('permission.destroy');
Route::get('/permissions/{permission}/edit', 'PermissionController@edit')->name('permission.edit');
Route::put('/permissions/{permission}/update', 'PermissionController@update')->name('permission.update');
