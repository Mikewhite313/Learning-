<?php

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

    // Route::post('apilogin', 'Auth\LoginController@login');

Route::get('/', function () {
    return redirect()->route('users.index');
});

Auth::routes();
Route::get('/home', function () {
    return redirect()->route('users.index');
});

Route::post('create-user', 'Auth\RegisterController@store')->name('store-user');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth'], function() {

	// Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['namespace' => 'Role'], function() {
		Route::get('roles', 'IndexController@index')->name('roles.index');
		Route::get('roles/create', 'IndexController@create')->name('roles.create');
		Route::post('roles/store','IndexController@store')->name('roles.store');
		Route::get('roles/edit/{id}','IndexController@edit')->name('roles.edit');
		Route::post('roles/update/{id}','IndexController@update')->name('roles.update');
		Route::get('roles/destroy/{id}','IndexController@destroy')->name('roles.destroy');
		Route::get('roles/show/{id}','IndexController@show')->name('roles.show');
	});

    Route::group(['namespace' => 'Product'], function() {
		Route::get('products', 'IndexController@index')->name('products.index');
		Route::get('products/create', 'IndexController@create')->name('products.create');
		Route::post('products/store','IndexController@store')->name('products.store');
		Route::get('products/edit/{id}','IndexController@edit')->name('products.edit');
		Route::post('products/update/{id}','IndexController@update')->name('products.update');
		Route::get('products/destroy/{id}','IndexController@destroy')->name('products.destroy');
		Route::get('products/show/{id}','IndexController@show')->name('products.show');
	});
    Route::group(['namespace' => 'User'], function() {
		Route::get('users', 'IndexController@index')->name('users.index');
		Route::get('users/create', 'IndexController@create')->name('users.create');
		Route::post('users/store','IndexController@store')->name('users.store');
		Route::get('users/edit/{id}','IndexController@edit')->name('users.edit');
		Route::post('users/update/{id}','IndexController@update')->name('users.update');
		Route::get('users/destroy/{id}','IndexController@destroy')->name('users.destroy');
		Route::get('users/show/{id}','IndexController@show')->name('users.show');
	});

	Route::group(['namespace' => 'Category'],function(){
		Route::get('categories','IndexController@index')->name('categories.index');
		Route::get('categories/create','IndexController@create')->name('categories.create');
		Route::post('store','IndexController@store')->name('categories.store');
		Route::get('categories/edit/{id}','IndexController@edit')->name('categories.edit');
		Route::post('update/{id}','IndexController@update')->name('categories.update');
		Route::get('categories/destroy/{id}','IndexController@destroy')->name('categories.destroy');
		Route::get('categories/show/{id}','IndexController@show')->name('categories.show');
		Route::get('/status-update/{id}','IndexController@status_update')->name('categories.status.update');
	});

	Route::group(['namespace' => 'General'],function(){
		Route::get('logs','IndexController@logs')->name('logs');
		Route::post('/logs','IndexController@search')->name('search.records');
		Route::get('content','IndexController@content')->name('content');

	});
	Route::group(['namespace' => 'Setting'],function(){
		Route::get('/settings','IndexController@index')->name('settings.index');
		Route::get('settings/create','IndexController@create')->name('settings.create');
		Route::post('/store','IndexController@store')->name('settings.store');
		Route::get('/edit/{id}','IndexController@edit')->name('settings.edit');
		Route::post('settings/update/{id}','IndexController@update')->name('settings.update');
		Route::get('settings/destroy/{id}','IndexController@destroy')->name('settings.destroy');

	});
	Route::group(['namespace' => 'Organization'],function(){
		Route::get('organizations','IndexController@index')->name('organizations.index');
		Route::get('organizations/add','IndexController@create')->name('organizations.create');
		Route::post('organizations/store','IndexController@store')->name('organizations.store');
		Route::get('organizations/status-update/{id}','IndexController@status_update1')->name('organizations.status.update1');
		

	});
});
