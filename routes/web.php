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

Route::get('/pokemon', 'PokemonController@getIndex')->name('pokemonIn');

Route::get('/pokemon/show/{id}', 'PokemonController@getShow');

Route::get('/pokemon/create', 'PokemonController@getCreate');

Route::post('/pokemon/create', 'PokemonController@postCreate');

Route::get('/pokemon/edit/{id}', 'PokemonController@getEdit');

Route::post('/pokemon/edit/{id}', 'PokemonController@postEdit');

Auth::routes();

Route::get('/pokemonFavs', 'PokemonController@getFavs')->name('pokemonFav');

Route::get('/addFav/{id}', 'PokemonController@saveFavs')->name('pokemonAddFav');

Route::get('/home', 'HomeController@getHome')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@getHome')->name('home');

Route::post('/nav', 'HomeController@getIndexes')->name('difInd');

Route::get('post','DataController@postRequest');
Route::get('get','DataController@getRequest');
