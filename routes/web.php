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

Route::get('/', 'SystemController@index');
Route::get('/about', 'SystemController@about');
Route::get('/user/registration', 'UserController@registration')->name('user-registration');
Route::post('/user/store', 'UserController@store')->name('user-store');
Route::post('/user/delete', 'UserController@destroy')->name('user-delete');
Route::post('/user/status', 'UserController@changeStatus')->name('user-status');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user-edit');
Route::get('/user/view/{id}', 'UserController@show')->name('user-view');
Route::get('/profile/edit', 'UserController@editProfile')->name('profile-edit');
Route::post('/user/update/{id}', 'UserController@update')->name('user-update');
Route::get('/peoples', 'UserController@index')->name('peoples');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/search', 'UserController@search')->name('search');
Route::post('/search-people', 'UserController@searchPeople');
Route::resource('event', 'EventController');
Route::get('/all-event', 'SystemController@event');
Route::get('/all-notice', 'SystemController@notice');
Route::post('/event/action', 'EventController@action')->name('event-action');
Route::get('/event/action/{id}', 'EventController@listActionPeople')->name('event-action-people');
Route::get('/event/action/send-mail/{idss}', 'EventController@sendEmail')->name('event-send-mail');
Route::post('/event/action/event-send-mail-to-user', 'EventController@sendEmailToUser')->name('event-send-mail-to-user');
Route::resource('notice', 'NoticeController');
Route::post('/user/login','UserController@login')->name('user-login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
