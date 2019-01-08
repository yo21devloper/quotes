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




Auth::routes();

Route::get('/topics', 'HomeController@topics')->name('topics');
Route::post('/login1', 'HomeController@login')->name('login1');
Route::get('/logout1', 'HomeController@logout1')->name('logout1');
Route::post('/submit', 'HomeController@submit')->name('submit');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/topics50', 'HomeController@topics50')->name('topics50');
Route::get('/people', 'HomeController@people')->name('people');
Route::post('/send_email', 'HomeController@send_email')->name('send_email');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/my-favorite', 'HomeController@favorite')->name('my-favorite');

Route::post('/myfavoritesubmit', 'HomeController@myfavoritesubmit')->name('myfavoritesubmit');
Route::get('/myfavorite', 'HomeController@myfavorite')->name('myfavorite');

Route::post('/mycollectionsubmit', 'HomeController@mycollectionsubmit')->name('mycollectionsubmit');
Route::get('/mycollection', 'HomeController@mycollection')->name('mycollection');
Route::get('/mycollectiondata/{topicname}', 'HomeController@mycollectiondata')->name('mycollectiondata');


Route::get('/my-favorite1', 'HomeController@favorite1')->name('my-favorite1');
Route::get('/my-collection', 'HomeController@collection')->name('collection');
Route::get('/my-collection1', 'HomeController@collection1')->name('collection1');
Route::post('/change_email', 'HomeController@change_email')->name('change_email');
Route::post('/change_password', 'HomeController@change_password')->name('change_password');
Route::post('/change_image', 'HomeController@change_image')->name('change_image');


Route::post('/delete', 'HomeController@delete')->name('delete');
Route::get('/motivational-quotes', 'HomeController@motivationalQuotes')->name('motivational-quotes');
Route::get('/poster/{quoteid}', 'HomeController@poster')->name('poster');
Route::get('/related_people/{position}', 'HomeController@related_people')->name('related_people');
Route::get('/people-innerside/{peopleid}', 'HomeController@people_innerside')->name('people-innerside');
Route::get('/topics_related/{topicid}', 'HomeController@topics_related')->name('topics-related');

Route::get('/forgot_password/{emailId}', 'Auth\PasswordController@showPasswordForm')->name('forgot_password');
Route::post('/forgot_password', 'Auth\PasswordController@password_register')->name('forgot_password');

Route::get('/verifyemail/{id}', 'HomeController@verifyemail')->name('verifyemail');

Route::get('/admin', 'Auth\LoginController@showLogin')->name('admin');
Route::post('/admin/logout', 'Auth\LoginController@logout')->name('admin/logout');
Route::get('/login', 'Auth\LoginController@showLogin')->name('login');
Route::get('/register', 'Auth\LoginController@showLogin')->name('register');

Route::get('/profile', 'ProfileController@showProfile')->name('profile');

Route::group(['middleware' => 'auth', 'prefix'=> 'admin'], function () {

Route::get('/dashboard', 'Admin\UserController@dashboard')->name('dashboard');
Route::get('/view_topics', 'Admin\UserController@topics')->name('topics');
Route::post('/submit_topic', 'Admin\UserController@submit_topic')->name('submit_topic');
Route::post('/delete_topic', 'Admin\UserController@delete_topic')->name('delete_topic');
Route::post('/update_topic', 'Admin\UserController@update_topic')->name('update_topic');
Route::post('/publish_topic', 'Admin\UserController@publish_topic')->name('publish_topic');
Route::post('/unpublish_topic', 'Admin\UserController@unpublish_topic')->name('unpublish_topic');


Route::get('/view_people', 'Admin\UserController@people')->name('people');
Route::get('/edit_people/{id}', 'Admin\UserController@edit_people')->name('edit_people');
Route::post('/submit_people', 'Admin\UserController@submit_people')->name('submit_people');
Route::post('/delete_people', 'Admin\UserController@delete_people')->name('delete_people');
Route::post('/update_people', 'Admin\UserController@update_people')->name('update_people');
Route::post('/publish_people', 'Admin\UserController@publish_people')->name('publish_people');
Route::post('/unpublish_people', 'Admin\UserController@unpublish_people')->name('unpublish_people');


Route::get('/view_quotes', 'Admin\UserController@quotes')->name('quotes');
Route::get('/add_quotes', 'Admin\UserController@add_quotes')->name('add_quotes');
Route::get('/edit_quotes/{id}', 'Admin\UserController@edit_quotes')->name('edit_quotes');
Route::post('/submit_quotes', 'Admin\UserController@submit_quotes')->name('submit_quotes');
Route::post('/delete_quotes', 'Admin\UserController@delete_quotes')->name('delete_quotes');
Route::post('/update_quotes', 'Admin\UserController@update_quotes')->name('update_quotes');
Route::post('/publish_quotes', 'Admin\UserController@publish_quotes')->name('publish_quotes');
Route::post('/unpublish_quotes', 'Admin\UserController@unpublish_quotes')->name('unpublish_quotes');

Route::get('/view_home', 'Admin\UserController@home')->name('home');
Route::get('/edit_home/{id}', 'Admin\UserController@edit_home')->name('edit_home');
Route::post('/update_home', 'Admin\UserController@update_home')->name('update_home');

Route::get('view_sociallinks','Admin\UserController@view_sociallinks')->name('view_sociallinks');
Route::get('/edit_sociallinks/{id}', 'Admin\UserController@edit_sociallinks')->name('edit_sociallinks');
Route::post('update_sociallinks','Admin\UserController@update_sociallinks')->name('update_sociallinks');

Route::get('my_profile','Admin\UserController@my_profile')->name('my_profile');

Route::get('change-password','Admin\UserController@change_password')->name('change-password');

Route::get('change-email','Admin\UserController@change_email')->name('change-email');

Route::post('updatepassword','Admin\UserController@updatepassword')->name('updatepassword');

Route::post('update_email','Admin\UserController@update_email')->name('update_email');

Route::post('update_email','Admin\UserController@update_email')->name('update_email');

Route::post('change_profile','Admin\UserController@change_profile')->name('change_profile');

Route::post('remove_pic','Admin\UserController@remove_pic')->name('remove_pic');

});