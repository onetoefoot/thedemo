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

Route::group(['middleware' => 'tenancy.enforce'], function () {
    Auth::routes();
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
