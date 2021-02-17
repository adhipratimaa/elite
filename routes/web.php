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

Route::group(['namespace'=>'Admin'],function(){
	Route::get('login','LoginController@login')->name('login');
	Route::post('postLogin','LoginController@postLogin')->name('postLogin');
	 
});

Route::group(['namespace'=>'Admin','middleware'=>['auth'],'prefix'=>'admin'],function(){
	Route::resource('dashboard','DashboardController');
	Route::get('logout','LoginController@Logout')->name('logout');
	Route::resource('blog','BlogController');
	Route::resource('service','ServiceController');
	Route::resource('program', 'ProgramController');
	Route::get('download-career/{id}','CareerController@downloadCareer')->name('downloadCareer');
	Route::resource('career', 'CareerController');
    Route::resource('subscriber', 'SubscriberController');
	Route::resource('slider', 'SliderController');
	Route::get('download-quote/{id}','QuoteController@downloadQuote')->name('downloadQuote');
    Route::resource('quote', 'QuoteController');
	Route::post('slider-process','SliderController@sliderProcess')->name('sliderProcess');
	Route::post('crop-modal','SliderController@cropmodal')->name('cropmodal');
	Route::post('crop-process','SliderController@cropprocess')->name('slidercropprocess');
	Route::post('update-slider/{id}','SliderController@updateSlider')->name('updateSlider');
	Route::resource('setting','SettingController');
	Route::resource('page', 'PageController');
	Route::resource('testimonial', 'TestimonialController');

	// Route::post('/payment', ['as' => 'payment', 'uses' => 'PaymentController@payWithpaypal']);
	// Route::get('/payment/status',['as' => 'status', 'uses' => 'PaymentController@getPaymentStatus']);
	// route for view/blade file
	Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaymentController@payWithPaypal',));
	// route for post request
	Route::post('paypal', array('as' => 'paypal','uses' => 'PaymentController@postPaymentWithpaypal',));
	// route for check status responce
	Route::get('paypal', array('as' => 'status','uses' => 'PaymentController@getPaymentStatus',));

});


Route::group(['namespace'=>'Front'],function(){
	Route::get('/','DefaultController@index')->name('home');
	// Route::get('program', 'DefaultController@program')->name('front.program');
	// Route::post('referral-programs', 'DefaultController@referral_programs')->name('referral_programs');
	Route::post('referral_programs', 'DefaultController@referral_programs')->name('referral_programs');
	Route::get('services','DefaultController@services')->name('services');
	// Route::get('career', 'DefaultController@career')->name('career');
	Route::post('contact-us-career','DefaultController@contactUs_career')->name('contactUs_career');
	Route::get('contact', 'DefaultController@contact')->name('contact');
	Route::post('contact-us','DefaultController@contactUs')->name('contactUs');
	Route::get('payment', 'DefaultController@payment')->name('payment');
	Route::post('payment-store','DefaultController@payment_store')->name('payment_store');
	Route::get('quote', 'DefaultController@quote')->name('quote');
	Route::post('quote-store', 'DefaultController@quote_store')->name('quote_store');
	Route::post('subscription', 'DefaultController@subscription')->name('subscription');
    Route::get('blogs','DefaultController@allBlogs')->name('allBlogs');
	Route::get('blog/{slug}','DefaultController@blogInner')->name('blogInner');



	Route::get('services/{slug}','DefaultController@serviceInner')->name('serviceInner');
	Route::get('{slug}','DefaultController@page')->name('page');
	Route::get('career', 'DefaultController@career')->name('career');
	

});