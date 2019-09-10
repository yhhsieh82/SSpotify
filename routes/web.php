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
//test for using the git
//aim to add, commit to branch and then push to remote

Route::get('/', function () {
    return redirect('/albums');
});

// Route::get('/musics/{music}', 'MusicsController@show');

// Route::post('/musics', 'MusicsController@store');

// Route::get('/musics', 'MusicsController@index');

// Route::get('/musics/create', 'MusicsController@create');

// Route::get('/musics/{music}/edit', 'MusicsController@edit');

// Route::patch('/musics/{music}', 'MusicsController@update');
Route::resource('/musics', 'MusicsController');

Route::resource('/songs', 'SongsController');

Route::get('/albums', 'AlbumsController@index');

Route::get('/albums/{album}', 'AlbumsController@show');

Route::resource('/playlists', 'PlaylistsController');

Route::post('/playlists/{playlist}', 'PlaylistsController@addMusic');

// Route::patch('/playlists/{playlist}', 'PlaylistsController@deleteMusic');
Route::post('/song/ajaxget', 'AjaxController@getSong');

Route::get('/artist/ajaxget', 'AjaxController@getArtist');

Route::get('/album/ajaxget', 'AjaxController@getAlbum');

// Route::post('/playlist/ajaxget', 'AjaxController@getPlaylist');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
