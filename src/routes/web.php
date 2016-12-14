<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* Home */
Route::get('/', 'HomeController@getHomePage');

/* Articles */
Route::get('/articles', 'ArticlesController@getArticlesHome');
Route::get('/articles/{id}/{name}', 'ArticlesController@getArticle');
Route::post('/articles/{id}/{name}', 'ArticlesController@postComment');
Route::patch('/comment/{id}', 'ArticlesController@patchComment');
Route::delete('/comment/{id}', 'ArticlesController@deleteComment');

/* Projects */
Route::get('/projects', 'ProjectsController@getProjectsHome');

/* Team */
Route::get('/team', 'TeamController@getTeamPage');

/* Users */
Route::get('/user/{login}', 'UserController@user');

/* Auth */
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@logout');

/* BackOffice */
Route::group(['prefix' => 'backoffice', 'middleware' => 'epitech.hub'], function()
{
	Route::get('/', 'BackOfficeController@getAdmHome');
});