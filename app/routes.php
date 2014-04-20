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
Route::resource('medias', 'MediasController');

//Tags
Route::resource('tags', 'TagsController');
Route::get('tags/{id}/destroy', 'TagsController@destroy');
Route::post('tags/store', 'TagsController@store');

//Categories
Route::resource('categories', 'CategoriesController');
Route::get('categories/{id}/destroy', 'CategoriesController@destroy');
Route::post('categories/store', 'CategoriesController@store');

//Posts
Route::get('posts/{id}/destroy', 'PostsController@destroy');

//Medias
Route::get('medias/{id}/destroy', 'MediasController@destroy');



