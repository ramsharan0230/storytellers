<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::group(['namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('postLogin', 'LoginController@postLogin')->name('postLogin');
    Route::get('password-reset', 'PasswordResetController@resetForm')->name('password-reset');
    Route::post('send-email-link', 'PasswordResetController@sendEmailLink')->name('sendEmailLink');
    Route::get('reset-password/{token}', 'PasswordResetController@passwordResetForm')->name('passwordResetForm');
    Route::post('update-password', 'PasswordResetController@updatePassword')->name('updatePassword');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin',], function () {
    Route::get('logout', 'LoginController@Logout')->name('logout');
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', 'UserController');

    Route::get('/events', 'EventController@index')->name('event.index');
    Route::get('/event/create', 'EventController@create')->name('event.create');
    Route::post('/event/store', 'EventController@store')->name('event.store');
    Route::get('/event/edit/{id}', 'EventController@edit')->name('event.edit');
    Route::delete('/event/destroy/{id}', 'EventController@destroy')->name('event.destroy');
    Route::put('/event/update/{guest}', 'EventController@update')->name('event.update');
    Route::post('/event/make-slider', 'EventController@makeSlider');

    Route::get('/guests', 'GuestController@index')->name('guest.index');
    Route::get('/guest/create', 'GuestController@create')->name('guest.create');
    Route::post('/guest/store', 'GuestController@store')->name('guest.store');
    Route::get('/guest/edit/{id}', 'GuestController@edit')->name('guest.edit');
    Route::put('/guest/update/{guest}', 'GuestController@update')->name('guest.update');
    Route::post('/guest/delete/{id}', 'GuestController@delete')->name('guest.delete');
    
    Route::resource('series', 'SeriesController');
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about-us', 'HomeController@about')->name('about-us');
    Route::get('/contact-us', 'HomeController@contact')->name('contact-us');
    Route::get('/bookings', 'HomeController@boookings')->name('bookings');
    Route::get('/video-list', 'HomeController@videoList')->name('video-list');
    Route::get('/events/{slug}', 'EventController@eventDetail')->name('event-detail');
});
