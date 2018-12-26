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

Route::get('/home', 'UpdateController@index')->name('home');
Route::get('/updates', 'UpdateController@list');
Route::post('/updates', 'UpdateController@create');
Route::get('/updates/suggestions', 'UpdateController@userSuggestions');
Route::post('/comment', 'UpdateController@createComment');
Route::post('/comments', 'UpdateController@CommentList');