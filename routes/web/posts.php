<?php

use Illuminate\Support\Facades\Route;

Route::get('/post/{post}', 'PostController@show')->name('post');
Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/posts', 'PostController@index')->name('post.index');
        Route::get('/posts/criar', 'PostController@create')->name('post.create');
        Route::post('/posts', 'PostController@store')->name('post.store');
        Route::get('/posts/{post}/editar', 'PostController@edit')->name('post.edit');
        // Route::get('/posts/{post}/editar', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
        Route::delete('/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
        Route::patch('/posts/{post}/update', 'PostController@update')->name('post.update');
    }
);
