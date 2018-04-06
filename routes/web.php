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

Route::get('/', ['uses'=>'IndexController@index', 'as'=>'home']);

Route::get('/cat/{categ}/{alias?}/{brand?}', ['uses'=>'IndexController@store', 'as'=>'category']);

Route::match(['get', 'post'], '/goods/{id}', ['uses'=>'IndexController@product', 'as'=>'product']);

Route::get('/blogs', ['uses'=>'BlogsController@index', 'as'=>'blogs']);

Route::match(['get', 'post'], '/blogs/{id}', ['uses'=>'BlogsController@show', 'as'=>'blog']);

Route::match(['get', 'post'], '/contactUs', ['uses'=>'ContactController@index', 'as'=>'contact']);

Route::get('/checkout', ['uses'=>'CartController@index', 'as'=>'checkout']);

Route::post('/addcart', ['uses'=>'CartController@addCart', 'as'=>'addCart']);

Route::get('/deletecart', ['uses'=>'CartController@deleteCart', 'as'=>'deleteCart']);

Route::match(['get', 'post'], '/purchase', ['uses'=>'CartController@addCustomer', 'as'=>'purchase']);



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){

    Route::get('/', ['uses'=>'Admin\IndexController@index', 'as'=>'adminIndex']);

    Route::resource('/goods', 'Admin\GoodsController');

    Route::resource('/blogs', 'Admin\BlogsController');

    Route::resource('/users', 'Admin\UsersController');

    Route::get('/color', ['uses'=>'Admin\OptionController@color', 'as'=>'adminColor']);
    Route::post('/color', ['uses'=>'Admin\OptionController@colorEdit', 'as'=>'adminColorEdit']);

    Route::get('/size', ['uses'=>'Admin\OptionController@size', 'as'=>'adminSize']);
    Route::post('/size', ['uses'=>'Admin\OptionController@sizeEdit', 'as'=>'adminSizeEdit']);

});
