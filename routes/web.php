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


/**
Route::get('/', function () {
    return view('pages.welcome');
});
**/




Route::group(['middleware'=>['web']], function(){
 	
		//Authentication ..............
	Route::get('auth/login', 'Auth\LoginController@getLogin');
	Route::post('auth/login', 'Auth\LoginController@postLogin');
	Route::post('logout', ['as'=> 'logout', 'uses'=> 'Auth\LoginController@logout']);

	//Registration of users........

	Route::get('auth/register', 'Auth\RegisterController@getRegister');
	Route::post('auth/register', 'Auth\RegisterController@postRegister');


	Route::get('blog/{slug}', ['as'=>'blog.single', 'uses'=> 'BlogController@getSingle'])
					->where('slug', '[\w\d\-\_]+');
	Route::get('blog', ['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);

	Route::resource('post', 'PostController');
	Route::get('contacts', function () {
    return view('pages.contacts');
	});
	Route::get('about', function () {
    return view('pages.about');
	});
	Route::get('/', 'PagesController@getIndex');
});
Auth::routes();

//This is the critical changes i made after making an authomatic Auth, so redirected the controller the system usually have to our own made controller with page
Route::get('/home', 'PagesController@getIndex');
