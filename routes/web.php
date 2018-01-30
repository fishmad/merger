<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');

Auth::routes();

Route::resource('admin/users', 'Admin\UserController');
Route::resource('admin/roles', 'Admin\RoleController');
Route::resource('admin/permissions', 'Admin\PermissionController');
// Route::get('admin/users', 'Admin\UserController@index')->name('users'); // A named route

Route::get('admin/generator', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@postGenerator']);

Route::resource('admin/posts', 'Admin\PostController');
Route::resource('admin/samples', 'Admin\SamplesController');

Route::resource('admin/stump', 'Admin\\StumpController');