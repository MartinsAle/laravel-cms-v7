<?php

use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
        Route::get('/users/criar', 'UserController@create')->name('user.create');
        Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
    }
);
Route::middleware(['roleMiddleware:admin', 'auth'])->group(function () {
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
