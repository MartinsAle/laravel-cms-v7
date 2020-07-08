<?php

use App\Role;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{post}', 'PostController@show')->name('post');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('/admin', 'AdminsController@index')->name('admin.index');
        //POSTS
        Route::get('/admin/posts', 'PostController@index')->name('post.index');
        Route::get('/admin/posts/criar', 'PostController@create')->name('post.create');
        Route::post('/admin/posts', 'PostController@store')->name('post.store');
        Route::get('/admin/posts/{post}/editar', 'PostController@edit')->name('post.edit');
        // Route::get('/admin/posts/{post}/editar', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
        Route::delete('/admin/posts/{post}/delete', 'PostController@destroy')->name('post.destroy');
        Route::patch('/admin/posts/{post}/update', 'PostController@update')->name('post.update');

        Route::put('/admin/users/{user}/update', 'UserController@update')->name('user.profile.update');
        Route::get('/admin/users/criar', 'UserController@create')->name('user.create');
        Route::delete('/admin/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');
    }
);

// Route::group(['middleware' => ['roleMiddleware:admin']], function () {
// });
Route::middleware(['roleMiddleware:admin', 'auth'])->group(function () {
    Route::get('/admin/users', 'UserController@index')->name('user.index');
});

Route::middleware(['can:view,user'])->group(function () {
    Route::get('/admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');
});
