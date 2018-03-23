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

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'middleware' => 'auth'
], function (){

Route::get('/categories','CategoriesController@index')->name('categories.index');
Route::get('/categories/create','CategoriesController@create')->name('categories.create');
Route::post('/categories','CategoriesController@store')->name('categories.store');
Route::get('/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
Route::put('/categories/{category}','CategoriesController@update')->name('categories.update');
Route::delete('/categories/{category}','CategoriesController@destroy')->name('categories.destroy');
Route::resource('articles', 'ArticlesController');
Route::resource('users','UsersController');
//    Route::put('/comments/{comments}','CategoriesController@update')->name('comments.update');
//    Route::delete('/comments/{category}','CategoriesController@destroy')->name('comments.destroy');
Route::resource('comments','CommentsController');
Route::resource('komments','KommentsController');
});