<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories','CategoriesController');
Route::resource('tags','TagsController');
Route::resource('posts','PostsController');
Route::get('trashed-posts','PostsController@trash')->name('trashed-posts.index');
Route::put('restore-post/{post}','PostsController@restore')->name('restore-posts');
});

Route::middleware(['auth','admin'])->group(function()
{
    Route::get('users','UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');
    Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile','UsersController@update')->name('users.update-profile');
    
});
Route::get('/','WelcomeController@welcome')->name('welcome');