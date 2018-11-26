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

/*
Route::get('/user/{id}', function ($id) {
    return 'This is user '.$id;
});

Route::get('/', function () {
    return view('welcome');
});
*/

#pagecontroller function
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//you can add new method inside resource by this. add new route before resource
Route::put('/users/{user}/passreset', 'UsersController@passreset');
Route::resource('users', 'UsersController');

//datatables route
Route::get('/usersdata', 'UsersController@getUsersData')->name('get.usersdata');


