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
    Route::get('/ideas/top', 'IdeaController@top');
    Route::get('/ideas/voteable', 'IdeaController@voteable');
    Route::get('/ideas/my', 'IdeaController@my');

    // Updvote / Downvote an idea
    Route::post('/upvote/{idea}', 'VoteController@upvote');
    Route::post('/downvote/{idea}', 'VoteController@downvote');

    // Favorites
    Route::post('/favorite/{idea}', 'FavoriteController@favorite');
    Route::delete('/favorite/{favorite}', 'FavoriteController@dislike');

    //User section
    Route::get('/account', 'UserController@index');
});
