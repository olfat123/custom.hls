<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

Route::get('/', 'UserController@showLogin');
Route::get('/login', 'UserController@showLogin');


$router->group(['middleware' => ['auth']], function () use ($router){

    #Word Search
    Route::get('/glossary', 'GlossaryController@showGlossary')->name('glossary');
    #Profile and Change Password
    Route::get('/profile', 'UserController@showProfile')->name('profile');
    #Buy Suscription
    Route::get('/suscription', 'WebstoreController@showSuscription')->name('suscription');
    #update password
    Route::post('/updatepassword','UserController@updatePassword');
    #Add New Studente to Academy
    Route::get('/academy', 'AcademyController@showAcademy')->name('academy');
    #Contact US
    Route::get('/sendfeedback', 'SendFeedBackController@index');


    # Adding a product to the shopping cart
    Route::get('/add/{product}', 'WebstoreController@addToCart')->name('add');
    # Removing an product from the shopping cart
    Route::get('/remove/{productId}', 'WebstoreController@removeProductFromCart')->name('remove');
    # Clearing all products from the shopping cart
    Route::get('/empty', 'WebstoreController@destroyCart')->name('empty');
    # PayPal checkout
    Route::get('checkout', 'PaypalController@payWithpaypal')->name('checkout');
    # PayPal status callback
    Route::get('status', 'PaypalController@getPaymentStatus');

});

Route::get('/forgot-password', function () {
    return view('forgot-password');
});


Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

# Generated routes for authentication
Auth::routes();








