<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('Api')->group(function () {
   

    // Authentication Routes
    Route::prefix('user')->name('user.')->group(function () {
        // User Register Route
        Route::post('/register', 'AuthController@register')->name('register');
        Route::post('/resendOtp', 'AuthController@resendOtp')->name('resendOtp');
        Route::post('/verifyOtp', 'AuthController@verifyOtp')->name('verifyOtp');

        // User Login Route
        Route::post('/login', 'AuthController@login')->name('login');
		Route::post('/forgotPassword', 'AuthController@forgotPassword')->name('forgotPassword');
		Route::post('/verifyForgotPasswordOtp', 'AuthController@verifyForgotPasswordOtp')->name('verifyForgotPasswordOtp');
		Route::post('/resendForgotPasswordOtp', 'AuthController@resendForgotPasswordOtp')->name('resendForgotPasswordOtp');
		Route::post('/resetPassword', 'AuthController@resetPassword')->name('resetPassword');
	    Route::get('/getPage', 'HomeController@getPage')->name('getPage');
		
		Route::middleware(['auth:sanctum'])->group(function () {
			
			Route::get('/logout', 'AuthController@logout')->name('logout');
			Route::post('/changePassword', 'AccountController@changePassword')->name('changePassword');
			Route::get('/profile', 'AccountController@getProfile')->name('profile');
			Route::post('/updateProfile', 'AccountController@updateProfile')->name('updateProfile');
			Route::get('/notification', 'AccountController@notification')->name('notification');
			Route::post('/contactUs', 'HomeController@contactUs')->name('contactUs');
		
		});
    });


});