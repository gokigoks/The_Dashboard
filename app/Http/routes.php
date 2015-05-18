<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::post('home','UserController@storePost');

Route::get('group/{id}','GroupController@index');		
	
Route::post('ajax/postcomment','UserController@storeComment');

Route::post('ajax/new_group','GroupController@create');

Route::post('ajax/flag_post','UserController@flagPost');

Route::post('ajax/makeArticleComment','ArticleController@makeComment');
	
Route::get('user/settings','UserController@settings');

Route::post('user/settings','UserController@saveSettings');

Route::resource('article','ArticleController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


