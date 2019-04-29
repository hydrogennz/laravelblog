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

Auth::routes();

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/home', 'HomeController@index')->name('home');

// Main Controller for all public Blog related activities
Route::get('/', 'BlogController@index');
Route::get('/articles', 'BlogController@index');
Route::get('/articles/{article}', 'BlogController@show');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

// Article Resource, all CRUD for articles will be handled by authenticated users (although there is no authorization yet)
Route::resource('/admin/articles', 'Admin\ArticleController')->except([
    'destroy'
])->middleware(['auth']);

Route::get('/admin/articles/{article}/destroy', 'Admin\ArticleController@destroy')->name('articles.destroy');