<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::controller('users', 'UsersController');
Route::resource('posts', 'PostsController');

//Tags
Route::resource('tags', 'TagsController');
Route::get('tags/{id}/destroy', 'TagsController@destroy');
//Posts
Route::get('posts/{idPost}/{idTag}/attach-tag', 'PostsController@attachTag');
Route::get('posts/{id}/destroy', 'PostsController@destroy');

//Composer

