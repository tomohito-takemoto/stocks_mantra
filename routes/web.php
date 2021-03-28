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

Route::get('/', 'StocksController@index');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'create']]);
    Route::resource('stocks', 'StocksController', ['only' => ['index', 'store', 'destroy', 'show', 'edit', 'update']]);
    Route::get('/stocks/edit/{id}', 'StocksController@edit')->name('stocks_edit');
    Route::post('/stocks/update/{id}', 'StocksController@update')->name('stocks_update');
    Route::get('/stocks/add', 'StocksController@show_add')->name('stock_add');
    
});

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');