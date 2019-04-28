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

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Create an idea
    Route::post('/idea', 'IdeaController@store');

    // Load the idea lists
    Route::get('/ideas/my', 'IdeaController@index');

    // Updvote / Downvote an idea
    Route::get('/voteable', 'VoteController@voteable');
    Route::get('/top', 'VoteController@top');
    Route::post('/upvote/{idea}', 'VoteController@upvote');
    Route::post('/downvote/{idea}', 'VoteController@downvote');

    // Favorites
    Route::get('/favorite', 'FavoriteController@index');
    Route::post('/favorite/{idea}', 'FavoriteController@store');
    Route::delete('/favorite/{favorite}', 'FavoriteController@destroy');

    //User section
    Route::get('/account', 'UserController@index');
});
