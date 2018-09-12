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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/teams', 'TeamController@display');
Route::resource('adminteam', 'AdminTeamsController');
Route::resource('adminplayer', 'AdminPlayerController');


Route::resource('/team', 'TeamController');
Route::resource('/player', 'PlayerController');

//Route::get('/match/{id}', 'MatchController@display');
Route::resource('/match', 'MatchController');
Route::get('/bet', function() {
    return view('Match/bet');
});

Route::get('/teams/stats/{team}', 'TeamsStatsController@display');
Route::get('/match/stats/{match_id}', 'MatchStatsController@display');
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');