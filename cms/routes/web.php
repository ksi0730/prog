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
Route::get('/', 'TeamsController@index');
Route::get('/enquete', 'EnquetesController@index');
Route::get('/comment', 'CommentsController@index');
Route::post('teams', 'TeamsController@store');
Route::post('enquetes', 'EnquetesController@store');
Route::post('comments', 'CommentsController@store');
Route::get('team/{team_id}', 'TeamsController@join');
Route::get('enquete/{enquete_id}', 'EnquetesController@join');
Route::get('comment/{comment_id}', 'CommentsController@join');
Route::get('teamedit/{team}', 'TeamsController@edit');
//チーム更新処理
Route::post('teams/update','TeamsController@update');
// チーム詳細表示
Route::get('teams/{team}','TeamsController@show');
