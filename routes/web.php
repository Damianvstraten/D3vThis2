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
    return view('auth.login');
});

Auth::routes();


// Logged in
Route::middleware('auth')->group(function () {

    // User
    Route::match(['put', 'patch'], 'user/study', 'UserController@addStudy')->name('user.study.store');
    Route::match(['get'], 'user/study', 'UserController@myStudy')->name('user.study.index');
    Route::match(['get'], 'user', 'UserController@index')->name('user.index');
    Route::match(['get'], 'user/settings', 'UserController@settings')->name('user.settings');
    Route::match(['get'], 'user/search', 'UserController@search')->name('user.search');

    // Interests
    Route::match(['get'], 'user/interests', 'UserController@interests')->name('user.interests');
    Route::match(['post'], 'user/interest', 'UserController@addInterest');
    Route::match(['delete'], 'user/interest', 'UserController@deleteInterest');
    Route::match(['get'], 'posts/interests', 'InterestController@search');
    Route::match(['get'], 'interests', 'UserController@searchInterests')->name('user.interests.search');

    // Posts
    Route::resource('posts', 'PostController');

    // Study
    Route::resource('study', 'StudyController');
});
