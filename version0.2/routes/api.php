<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signup','API\UserController@signup');
Route::post('login','API\UserController@login');
Route::get('majors','API\UserController@majors');
Route::get('universities','API\UserController@universities');
Route::get('community','API\UserController@community');
Route::post('profile','API\UserController@profile');
Route::get('events','API\UserController@events');
Route::get('tutors','API\UserController@tutors');
Route::get('musics','API\UserController@musics');
Route::post('edit_profile','API\UserController@edit_profile');
Route::get('sports','API\UserController@sports');
Route::post('forgot_password','API\UserController@forgot_password');
Route::post('activity_wall','API\UserController@activity_wall');
Route::get('activitywalls','API\UserController@activitywalls');
Route::post('social_login','API\UserController@social_login');
Route::post('social_exist','API\UserController@social_exist');
Route::post('change_password','API\UserController@change_password');
Route::post('delete_account','API\UserController@delete_account');
Route::post('enable_notification','API\UserController@enable_notification');
Route::post('get_notification_detail','API\UserController@get_notification_detail');
Route::post('notification','API\UserController@notification');
Route::post('deleteaccount_permanent','API\UserController@deleteaccount_permanent');
Route::post('platform','API\UserController@platform');
Route::post('logout','API\UserController@logout');

