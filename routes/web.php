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

// Route::get('/', function () {
//     return view('welcome');
// });
//Route::get('/', 'HomeController@startApp')->name('home');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

// Memes Routing
Route::get('/memes', 'MemeController@show')->name('home');
Route::post('/add', [
	'uses' => 'MemeController@add',
	'as' => 'add.memes',
]);

Route::get('detail/{id}', 'MemeController@detail');