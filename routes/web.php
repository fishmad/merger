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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('admin', 'Admin\AdminController@index');

Route::resource('settings/users', 'Admin\UserController');
Route::resource('settings/roles', 'Admin\RoleController');
Route::resource('settings/permissions', 'Admin\PermissionController');
// Route::get('admin/users', 'Admin\UserController@index')->name('users'); // A named route
Route::get('settings/generator', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@getGenerator']);
Route::post('settings/generator', ['uses' => '\Fishmad\Checkmate\Controllers\ProcessController@postGenerator']);
Route::resource('settings/posts', 'Admin\PostController');
Route::resource('settings/stump', 'Admin\\StumpController');




Route::get('settings/samples', 'Admin\\SamplesController@index');
Route::get('settings/samples/data', 'Admin\\SamplesController@data')->name('settings.samples.data');
Route::resource('settings/samples', 'Admin\\SamplesController');




/* CoreUI templates */
Route::middleware('auth')->group(function() {
  Route::view('/', 'blank');
  Route::view('/dashboard', 'dashboard');
  
  // Section CoreUI elements
  Route::view('/demo', 'demo.coreui.dashboard');
  Route::view('/demo/coreui', 'demo.coreui.dashboard');
  Route::view('/demo/coreui/dashboard', 'demo.coreui.dashboard');
  Route::view('/demo/coreui/buttons', 'demo.coreui.buttons');
	Route::view('/demo/coreui/social', 'demo.coreui.social');
	Route::view('/demo/coreui/cards', 'demo.coreui.cards');
	Route::view('/demo/coreui/forms', 'demo.coreui.forms');
	Route::view('/demo/coreui/modals', 'demo.coreui.modals');
	Route::view('/demo/coreui/switches', 'demo.coreui.switches');
	Route::view('/demo/coreui/tables', 'demo.coreui.tables');
	Route::view('/demo/coreui/tabs', 'demo.coreui.tabs');
	Route::view('/demo/coreui/icons-font-awesome', 'demo.coreui.font-awesome-icons');
	Route::view('/demo/coreui/icons-simple-line', 'demo.coreui.simple-line-icons');
	Route::view('/demo/coreui/widgets', 'demo.coreui.widgets');
  Route::view('/demo/coreui/charts', 'demo.coreui.charts');
  Route::view('/demo/coreui/error404','demo.coreui._errors.404');
  Route::view('/demo/coreui/error500','demo.coreui._errors.500');
  Route::view('/demo/coreui/login','demo.coreui.pages.login');
  Route::view('/demo/coreui/register','demo.coreui.pages.register');
});

// Section Pages
Route::view('/error404','_errors.404')->name('error404');
Route::view('/error500','_errors.500')->name('error500');