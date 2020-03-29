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


    // Admin Routes
    Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {

        Route::middleware('isAdmin')->group(function (){
            Route::get('/', 'HomeController@index');
            Route::get('/dashboard', 'HomeController@index')->name('home');


            Route::name('server.')->namespace('Server')->group(function (){
                Route::resource('server' , 'ServersController');
            });
        });


        Route::namespace('Auth')->group(function(){
            //Login Routes
            Route::get('/login','LoginController@showLoginForm')->name('login');
            Route::post('/login','LoginController@login');
            Route::post('/logout','LoginController@logout')->name('logout');
            //Forgot Password Routes
            Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
            Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
            //Reset Password Routes
            Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
            Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');
        });
    });

    // users Routes
    Route::prefix('/user')->middleware(['auth','g2fa','verified'])->name('user.')->namespace('User')->group(function (){

        Route::get('/', 'DashboardController@index')->name('home');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        // Confirm Pass Route
        Route::prefix('/settings')->middleware(['password.confirm'])->namespace('Settings')->name('settings.')->group(function (){

            Route::get('/', 'ProfileSettingsController@index')->name('home');

            Route::prefix('/2fa')->namespace('twoFactorAuth')->name('twoFactor.')->group(function (){

                Route::prefix('/google')->namespace('Google')->name('google.')->group(function (){
                    Route::get('/', 'GoogleAuthenticatorController@index')->name('index');
                    Route::get('/activate', 'GoogleAuthenticatorController@activate')->name('activate');
                    Route::get('/deActivate', 'GoogleAuthenticatorController@deActivate')->name('activate');
                    Route::get('/reActivate', 'GoogleAuthenticatorController@reActivate')->name('activate');
                    Route::POST('/validate', 'GoogleAuthenticatorController@validateCode')->name('validate');
                });

            });

        });
    });


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/g2fa', function () {
    return redirect(URL()->previous());
})->name('g2fa')->middleware('g2fa');
