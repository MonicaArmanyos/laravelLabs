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

Route::get(
    'posts',
    'PostsController@index'//da kda bi2olo lma tla2y /posts roo7 lel controller da 
)->name('posts.index')->middleware('auth');// hwa sma el route kolo posts.index 
//Named routes allow you to generate URLs without being coupled to the actual URL defined on the route. 
//Therefore, if the route's URL changes, no changes need to be made to your route function calls
//lw 3ozt a8ayar el path ha8ar el path mn hna bs fda ashal ma kont hlf fel project a8ayar f kol 7ta 
Route::get('posts/create','PostsController@create')->name('posts.create')->middleware('auth');
Route::post('posts','PostsController@store')->name('posts.store')->middleware('auth');;
Route::get('posts/{post}','PostsController@show')->name('posts.show')->middleware('auth');//{post} da id aw esm
Route::get('posts/{post}/edit','PostsController@edit')->name('posts.edit')->middleware('auth');
Route::put('posts/{post}','PostsController@update')->name('posts.update')->middleware('auth');
Route::delete('posts/{post}','PostsController@destroy')->name('posts.destroy')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
