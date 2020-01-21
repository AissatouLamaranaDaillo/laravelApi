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

Route::get('/home', 'HomeController@index');


Route::resource('categories', 'CategorieController');

Route::resource('produits', 'ProduitController');

Route::get('categories/{filename}', 'CategorieController@store');

Route::post('categories/{filename}','CategorieController@store' );

Route::resource('clients', 'clientController');