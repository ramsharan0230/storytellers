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

    Route::get('setting', 'SettingController@index')->name('setting');
    Route::put('setting/save/{id}', 'SettingController@update')->name('setting.update');

    Route::resource('users', 'UserController');

    Route::get('/events', 'EventController@index')->name('event.index');
    Route::get('/event/create', 'EventController@create')->name('event.create');
    Route::post('/event/store', 'EventController@store')->name('event.store');
    Route::get('/event/edit/{id}', 'EventController@edit')->name('event.edit');
    Route::delete('/event/destroy/{id}', 'EventController@destroy')->name('event.destroy');
    Route::put('/event/update/{guest}', 'EventController@update')->name('event.update');
    Route::post('/event/make-slider', 'EventController@makeSlider');
    Route::post('/event/make-featured', 'EventController@makeFeatured');
    Route::get('event/gallery', 'EventController@eventGalleryIndex')->name('event.gallery');
    Route::get('event/gallery/create', 'EventController@createEventGallery')->name('event.gallery.create');
    Route::post('event/gallery/store', 'EventController@eventGallery')->name('event.gallery.store');
    Route::get('event/gallery/{id}/edit', 'EventController@eventGallery')->name('event.gallery.edit');
    Route::post('event/gallery/{id}/delete', 'EventController@deleteEventGallery')->name('event.gallery.delete');
    Route::get('event/gallery/{id}/show', 'EventController@showEventGallery')->name('event.gallery.show');
    Route::post('event/gallery/changeStatus', 'EventController@changeGalleryStatus')->name('event.gallery.changeStatus');
    Route::get('event/{id}/addgallery', 'EventController@addGallery')->name('event.addgallery');
    Route::delete('event/gallery/image/{id}/destroy', 'EventController@deleteEventGalleryImage')->name('event.gallery.image.destroy');

    Route::resource('upcomingevent', 'UpcomingEventController');
    

    Route::get('/guests', 'GuestController@index')->name('guest.index');
    Route::get('/guest/create', 'GuestController@create')->name('guest.create');
    Route::post('/guest/store', 'GuestController@store')->name('guest.store');
    Route::get('/guest/edit/{id}', 'GuestController@edit')->name('guest.edit');
    Route::put('/guest/update/{guest}', 'GuestController@update')->name('guest.update');
    Route::post('/guest/delete/{id}', 'GuestController@delete')->name('guest.delete');
    
    Route::resource('series', 'SeriesController');
    Route::resource('blogs', 'BlogController');
    Route::resource('user', 'UserController');
    Route::resource('bookings', 'BookingController');
    Route::post('/booking/conform/{id}', 'BookingController@conform')->name('booking.conform');
    Route::post('/booking/deny/{id}', 'BookingController@deny')->name('booking.deny');

    Route::get('/pages/about', 'PagesController@about')->name('pages.about');
    Route::get('/pages/about/create', 'PagesController@createAbout')->name('pages.about.create');
    Route::get('/pages/about/edit/{id}', 'PagesController@editAbout')->name('pages.about.edit');
    Route::post('/pages/about/store', 'PagesController@storeAbout')->name('pages.about.store');
    Route::post('/pages/about/{id}/update', 'PagesController@updateAbout')->name('pages.about.update');

    Route::get('/pages/contact', 'PagesController@contact')->name('pages.contact');
    Route::get('/pages/contact/create', 'PagesController@createContact')->name('pages.contact.create');
    Route::post('/pages/contact/store', 'PagesController@storeContact')->name('pages.contact.store');
    Route::get('/pages/contact/edit/{id}', 'PagesController@editContact')->name('pages.contact.edit');
    Route::post('/pages/contact/{id}/update', 'PagesController@updateContact')->name('pages.contact.update');

    Route::get('/page/team', 'PagesController@team')->name('page.team');
    Route::post('/pages/store', 'DashboardController@pagestore')->name('pages.store');
});

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about-us', 'HomeController@about')->name('about-us');
    Route::get('/contact-us', 'HomeController@contact')->name('contact-us');
    Route::get('/bookings', 'HomeController@boookings')->name('bookings');
    Route::get('/blogs', 'BlogController@blogs')->name('blogs');
    Route::get('/blog/{slug}', 'BlogController@blogDetail')->name('blog-detail');
    Route::get('/video-list', 'HomeController@videoList')->name('video-list');
    Route::get('/featured-video-list', 'HomeController@FeaturedVideo')->name('featured-video-list');
    Route::get('/events/{slug}', 'EventController@eventDetail')->name('event-detail');
    Route::post('/booking/store', 'FrontController@bookings')->name('booking.store');
    Route::get('/series/{id}', 'EventController@seriesDetail')->name('series-detail');
});
