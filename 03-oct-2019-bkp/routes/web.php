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

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});

Route::get('/send/email', 'HomeController@mail');


Route::get('/', function () {
    // return view('welcome');
    return view('front/home');
});

Auth::routes();

// Login Routes
Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\LoginController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

// Home Routes
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contactform', 'HomeController@contactform')->name('contactform');

/**
* This is only for super admin & admin access
*/

Route::group(['prefix' => 'admin' ,'namespace' => 'Admin', 'middleware' => ['superadmin','admin', 'web'] ], function () {
    // Admin controller
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
    Route::get('edit-profile/{profile}', 'AdminController@editProfile')->name('profile.edit');
    Route::post('update-profile/{profile}', 'AdminController@updateProfile')->name('profile.update');
    Route::get('password/reset', 'AdminController@showChangePasswordForm')->name('password.reset');
    Route::post('update/password', 'AdminController@updatePassword')->name('password.update');

    // User controller resource
    Route::resource('users', 'UserController');

    // Post controller resource
    Route::resource('posts', 'PostController');

    // Service controller resource
    Route::resource('services', 'ServiceController');
});

/**
* This is only for subscriber access
*/
Route::group(['prefix' => 'account' , 'middleware' => ['subscriber','web'] ], function () {

    Route::resource('dashboard', 'DashboardController');

});

