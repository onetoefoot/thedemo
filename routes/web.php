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

// Landing Page Routes
Route::get('/', function () { return view('welcome'); });
Route::get('/terms', function () { return view('terms'); });
Route::get('/privacy', function () { return view('privacy'); });

Route::domain('www.noeler.com')->group(function () { 

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
    
    // Catch All Route
    Route::any('{any}', function () {
        abort(404);
    })->where('any', '.*');
});

Route::group(['middleware' => 'tenancy.enforce'], function () {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/account/passport', 'PassportController@index');
    Route::prefix('backend')->group(function () {
        Route::group(['middleware' => 'backend'], function () {
            Route::resource('users', 'UserController');
            Route::resource('roles', 'RoleController');
            Route::resource('permissions', 'PermissionController');
            Route::resource('activity-log', 'ActivityLogController');
            Route::prefix('ajax')->group(function() {
                Route::resource('roles', 'RoleController', ['as' => 'ajax']);
            });
        });
    });
});

// Authentication Web Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    
// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
