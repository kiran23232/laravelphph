<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Route::group(['middleware'=>['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

   /* Route::post('/signup', [
        'uses'=> 'UserController@postSignUp',
        'as'=> 'signup'
    ]);
    Route::post('/signin', [
        'uses'=> 'UserController@postSignIn',
        'as'=> 'signin'
    ]);

    Route::post('/logout', [
        'uses'=> 'UserController@getlogout',
        'as'=> 'logout'
    ]);
    /*Route::get('/dashboard',[
        'uses'=>'Postcontroller@getdashboard',
        'as'=>'dashboard',
        'middleware'=> 'auth'
    ]);
    Route::post('/createpost',[
        'uses'=>'PostController@postCreatePost',
        'as'=>'post.create',
        'middleware'=> 'auth'
    ]);
    */
    Route::resource('posts', 'PostController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
