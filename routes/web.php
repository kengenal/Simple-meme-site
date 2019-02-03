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
Route::get('/', 'HomeController@startApp')->middleware('auth.basic');
Auth::routes();

// Memes Routing
Route::get('/memes', 'MemeController@memes')->name('home');
Route::get('/home', 'MemeController@memes');
Route::post('/add', [
	'uses' => 'MemeController@addUrl',
	'as' => 'url.memes',
]);
Route::post('/add-files', [
	'uses' => 'MemeController@addFile',
	'as' => 'files.memes',
]);

Route::get('memes/{id}', 'MemeController@detail');