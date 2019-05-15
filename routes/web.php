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

Route::get('/', 'HomeController@getHome');

// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/logout', function () {
//     return view('auth.logout');
// });

Route::get('/anime', 'AnimeController@getIndex')->name('animeIn');

Route::get('/anime/show/{id}', 'AnimeController@getShow');

Route::get('/anime/create', 'AnimeController@getCreate');

Route::post('/anime/create', 'AnimeController@postCreate');

Route::get('/anime/edit/{id}', 'AnimeController@getEdit');

Route::post('/anime/edit/{id}', 'AnimeController@postEdit');

Route::get('/games', 'GamesController@getIndex')->name('gamesIn');

Route::get('/games/show/{id}', 'GamesController@getShow');

Route::get('/games/create', 'GamesController@getCreate');

Route::post('/games/create', 'GamesController@postCreate');

Route::get('/games/edit/{id}', 'GamesController@getEdit');

Route::post('/games/edit/{id}', 'GamesController@postEdit');

Auth::routes();

Route::get('/home', 'HomeController@getHome')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@getHome')->name('home');

Route::post('/nav', 'HomeController@getIndexes')->name('difInd');

Route::get('post','DataController@postRequest');
Route::get('get','DataController@getRequest');
