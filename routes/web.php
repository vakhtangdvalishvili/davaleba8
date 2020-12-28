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
Route::get('/', function(){
    return view('welcome');
});
Route::get('/app', function(){
    return view('layouts.app');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post', 'AdminController@Index');
Route::post('/storeposts', 'AdminController@store')->name('storepost');
Route::get('/addcategory', 'AdminController@Category')->name('addCategory');
Route::post('/storecategory', 'AdminController@store_category')->name('storecategory');
Auth::routes(["verify"=>true]);
