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

Route::group(array('before' => 'auth'), function()
{
    Route::resource('posts', 'PostsController');          

    //Tags
    Route::get('tags/', 'TagsController@index');
    Route::get('tags/{id}/destroy', 'TagsController@destroy');
    Route::post('tags/store', 'TagsController@store');

    //Categories
    Route::get('categories/', 'CategoriesController@index');
    Route::get('categories/{id}/destroy', 'CategoriesController@destroy');
    Route::post('categories/store', 'CategoriesController@store');

    //Posts
    Route::get('posts/{id}/destroy', 'PostsController@destroy');

    //Medias
    Route::get('medias/', 'MediasController@index');
    Route::get('medias/{id}/destroy', 'MediasController@destroy');
    Route::post('medias/destroy', 'MediasController@destroy');
    Route::post('medias/upload', 'MediasController@postUpload');

});



Route::controller('users', 'UsersController');





