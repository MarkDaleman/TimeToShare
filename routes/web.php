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

Auth::routes();

Route::get('/addproduct', function () {
    return view('addproduct');
});

Route::get('/viewproduct', 'ProductController@eigenProducten', function () {
    return view('viewproduct');
});


Route::get('/adminproductpanel', 'ProductController@alleProductenAccepted', function () {
});

Route::get('/adminuserpanel', 'UserController@Index', function () {
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/find', 'SearchController@searchUsers');

Route::post('/addproduct/post', 'ProductController@create');

Route::get('accept/{id}',array(
    'as'=>'accept-product',
    'uses'=>'ProductController@updateShareToAccepted'));

Route::get('return/{id}',array(
    'as'=>'return-product',
    'uses'=>'ProductController@updateProductReturned'));

Route::get('annuleer/{id}',array(
    'as'=>'annuleer-product',
    'uses'=>'ProductController@annuleerProdcut'));


Route::get('ban-user/{id}',array(
    'as'=>'annuleer-persoon',
    'uses'=>'UserController@nonactief'));