<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

// Memes Routing
Route::get('/memes', 'MemeController@memes')->name('memes');
Route::post('/add', [
	'uses' => 'MemeController@addUrl',
	'as' => 'url.memes',
	'middleware' => 'auth'
]);
Route::post('/add-files', [
	'uses' => 'MemeController@addFile',
	'as' => 'files.memes',
	'middleware' => 'auth'
]);

Route::get('memes/{id}', 'MemeController@detail');