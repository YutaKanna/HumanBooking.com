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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('talents', 'TalentController@index')->name('talents.index');
Route::get('talents/{talent}', 'TalentController@show')->name('talents.show');

Route::get('projects/create', 'ProjectController@create')->name('projects.create');
Route::post('projects', 'ProjectController@store')->name('projects.store');

// agency
Route::group(['prefix' => 'agency'],function(){
   Route::get('login','Agency\LoginController@showLoginForm')->name('agencies.login');
   Route::post('login','Agency\LoginController@authenticate')->name('agencies.authenticate');
});

//ログイン後
Route::group(['prefix' => 'agency','middleware' => 'auth:agency'],function(){
   Route::get('', 'Agency\AgencyController@index')->name('agencies.index');
   // notification
   // todo: {agency}/notificationsにURLを変更
   Route::get('notifications', 'NotificationsController@index')->name('notifications.index');
   Route::get('notifications/{notificationId}', 'NotificationsController@show')->name('notifications.show');

   Route::post('logout','Agency\LoginController@logout')->name('agencies.logout');
 });

// planner
Route::group(['prefix' => 'planner'],function(){
   Route::get('login','Planner\LoginController@showLoginForm')->name('planners.login');
   Route::post('login','Planner\LoginController@authenticate')->name('planners.authenticate');
});

//ログイン後
Route::group(['prefix' => 'planner','middleware' => 'auth:planner'],function(){
   Route::get('', 'Planner\PlannerController@index')->name('planners.index');
   Route::post('logout','Planner\LoginController@logout')->name('planners.logout');
 });