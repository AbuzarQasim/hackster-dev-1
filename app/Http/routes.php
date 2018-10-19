<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',['as'=>'home.posts','uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'],function ()
{
    Route::resource('admin/users','AdminUsersController');
    Route::resource('admin/posts','AdminPostsController');
    Route::get('/admin', function ()
    {
        return view('admin.index');
    });

    Route::resource('admin/categories','AdminCategoryController');

    Route::resource('admin/media','AdminMediaController');

    Route::resource('admin/comments','PostCommentsController');
    Route::resource('admin/comments/replies','CommentRepliesController');
});

