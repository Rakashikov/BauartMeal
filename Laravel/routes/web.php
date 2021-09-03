
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

Route::get('/', function () {
  return view('welcome');
});

Route::get('/cart', 'OrderController@parse');

Route::get('/menu', function () {
  return view('menu');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'restaurants', 'as' => 'restaurants.'], function(){
	Route::get('create', 'RestaurantController@create')->name('create');
	Route::get('index','RestaurantController@index')->name('index');
	Route::get('edit/{restaurant}','RestaurantController@edit')->name('edit');
	Route::get('show/{restaurant}','RestaurantController@show')->name('show');
	Route::post('store','RestaurantController@store')->name('store');
	Route::post('update','RestaurantController@update')->name('update');
	Route::delete('destroy/{restaurant}','RestaurantController@destroy')->name('destroy');
	Route::post('parse','RestaurantController@parse')->name('parse');
});

Route::group(['prefix' => 'orders', 'as' => 'orders.'], function(){
	Route::get('create', 'OrderController@create')->name('create');
	Route::get('index','OrderController@index')->name('index');
	Route::get('edit/{order}','OrderController@edit')->name('edit');
	Route::get('show/{order}','OrderController@show')->name('show');
	Route::post('store','OrderController@store')->name('store');
	Route::post('update','OrderController@update')->name('update');
	Route::delete('destroy/{order}','OrderController@destroy')->name('destroy');
});

Route::group(['prefix' => 'suborders', 'as' => 'suborders.'], function(){
	Route::get('create', 'SuborderController@create')->name('create');
	Route::get('index','SuborderController@index')->name('index');
	Route::get('edit/{suborder}','SuborderController@edit')->name('edit');
	Route::get('show/{suborder}','SuborderController@show')->name('show');
	Route::post('store','SuborderController@store')->name('store');
	Route::post('update','SuborderController@update')->name('update');
	Route::delete('destroy/{suborder}','SuborderController@destroy')->name('destroy');
});

Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
	Route::get('create', 'UserController@create')->name('create');
	Route::get('index','UserController@index')->name('index');
	Route::get('edit/{user}','UserController@edit')->name('edit');
	Route::get('show/{user}','UserController@show')->name('show');
	Route::post('store','UserController@store')->name('store');
	Route::post('update','UserController@update')->name('update');
	Route::delete('destroy/{user}','UserController@destroy')->name('destroy');
});

Route::group(['prefix' => 'carts', 'as' => 'carts.'], function(){
	Route::get('create', 'CartController@create')->name('create');
	Route::get('index','CartController@index')->name('index');
	Route::get('edit/{cart}','CartController@edit')->name('edit');
	Route::get('show/{cart}','CartController@show')->name('show');
	Route::post('store','CartController@store')->name('store');
	Route::post('update','CartController@update')->name('update');
	Route::delete('destroy/{cart}','CartController@destroy')->name('destroy');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
