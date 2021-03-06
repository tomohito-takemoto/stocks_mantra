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
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        
        Route::post('favorite', 'FavoriteController@store')->name('stocks.favorite');
        Route::delete('unfavorite', 'FavoriteController@destroy')->name('stocks.unfavorite');
        Route::get('favorites', 'FavoriteController@showFavorites')->name('stocks.favorites_list');
    });
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::get('/stocks/create/{id}', 'StocksController@create')->name('stocks_create');
    Route::resource('stocks', 'StocksController', ['only' => ['index', 'store', 'destroy', 'show', 'edit', 'update', 'create']]);
    Route::get('/stocks/add', 'StocksController@show_add')->name('stock_add');
    Route::post('/stocks/add/{id}', 'StocksController@store')->name('stocks_addto');
    Route::get('mypage', 'StocksController@index')->name('mypage');
    
    
    Route::get('stock/create/{id}', 'ReportsController@create');
    Route::post('stock/create/{id}', 'ReportsController@create')->name('report_create');
    Route::get('report/edit/{id}', 'ReportsController@edit');
    Route::post('report/edit/{id}', 'ReportsController@edit')->name('report_edit');
    Route::put('reports/{id}', 'ReportsController@update')->name('report_update');
    Route::post('report/{id}', 'ReportsController@store')->name('report');
    Route::resource('reports', 'ReportsController', ['only' => ['show', 'destroy']]);
    
    // ????????????
    Route::get('/chart', 'ChartController@index');
    Route::get('/chart', 'ChartController@chart');

});

// ???????????????
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ??????
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// ??????????????????
Route::get('/contact', 'ContactsController@index')->name('contact');
Route::post('/contact/confirm', 'ContactsController@confirm')->name('confirm');
Route::post('/contact/process', 'ContactsController@process')->name('process');
Route::get('/contact/complete', 'ContactsController@complete')->name('complete');

