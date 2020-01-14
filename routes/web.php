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


Route::get('/front-guides','FrontGuideController@index')->name('frontGuide');
Route::get('/guide/{id}','FrontGuideController@guide')->name('guide');
Route::post('/save-guide', 'AppliedGuideController@store')->name('save.guide');

Auth::routes();

Route::get('/', 'HomeController@index')->name('admin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//route-----guide

Route::resource('/admin/guide','GuideController');
Route::resource('/admin/replies','ReplyController');
Route::resource('/admin/quizzed','QuizzedController');
Route::delete('question/delete/{id}', 'QuestionController@destroy');
Route::resource('/admin/enterprise','EnterpriseController');
