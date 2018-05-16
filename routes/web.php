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

//Route::get( '/', function () { return view('welcome'); });

Auth::routes();

Route::get( '/admin', 'Admin\HomeController@index' )->name( 'admin' );

Route::get( '/', 'HomeController@index' )->name( 'home' );

Route::get( '/top-10', 'PageController@top' )->name( 'top-10' );

Route::get( '/top-headlines', 'PageController@headlines' )->name( 'top-headlines' );

Route::get( '/new-releases', 'PageController@newreleases' )->name( 'new-releases' );

Route::get( '/contact-us', 'PageController@contact' )->name( 'contact-us' );

Route::get( '/privacy-policy', 'PageController@policy' )->name( 'privacy-policy' );

Route::get( '/terms-and-conditions', 'PageController@terms' )->name( 'terms-and-conditions' );

Route::post( '/contact', 'ContactUsController@index' )->name( 'contact' );

Route::get( '/home', function () {
	return redirect( 'admin' );
});
