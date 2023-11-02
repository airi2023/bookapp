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

// Route::get('bookapp', function () {
//     return '<h1>Hello</h1>';
// });

// Route::get('bookapp', function () {
//     return view('hello.index');
// });

Route::get('bookapp', 'BookController@index');//「~/bookapp」ページにURLアクセスしたら、Hellocontrollerのindexメソッド（アクションメソッド）を実行する

Route::get('bookapp/add', 'BookController@add');
Route::post('bookapp/add', 'BookController@create');

Route::get('bookapp/edit', 'BookController@edit');
Route::post('bookapp/edit', 'BookController@update');

Route::get('bookapp/del', 'BookController@delete');
Route::post('bookapp/del', 'BookController@remove');

Route::get('bookapp/find', 'BookController@find');
Route::post('bookapp/find', 'BookController@search');