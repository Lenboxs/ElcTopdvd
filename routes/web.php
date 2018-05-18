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

Route::get( '/admin/add-movie', 'Admin\HomeController@addMovie' )->name( 'add-movie' );

Route::get( '/admin/movies', 'Admin\HomeController@movies' )->name( 'movies' );

Route::get( '/admin/add-series', 'Admin\HomeController@addSeries' )->name( 'add-series' );

Route::get( '/admin/series', 'Admin\HomeController@series' )->name( 'series' );

Route::get( '/admin/settings', 'Admin\HomeController@settings' )->name( 'settings' );

Route::get( '/admin/add-branch', 'Admin\HomeController@addBranch' )->name( 'add-branch' );

Route::get( '/admin/branches', 'Admin\HomeController@branches' )->name( 'branches' );

Route::get( '/', 'HomeController@index' )->name( 'home' );

Route::get( '/top-10', 'PageController@top' )->name( 'top-10' );

Route::get( '/top-headlines', 'PageController@headlines' )->name( 'top-headlines' );

Route::get( '/movies', 'PageController@movies' )->name( 'movies' );

Route::get( '/movie/{name}', 'PageController@movie' )->name( 'movie' );

Route::get( '/series/{name}', 'PageController@series' )->name( 'series' );

Route::get( '/contact-us', 'PageController@contact' )->name( 'contact-us' );

Route::get( '/privacy-policy', 'PageController@policy' )->name( 'privacy-policy' );

Route::get( '/terms-and-conditions', 'PageController@terms' )->name( 'terms-and-conditions' );

Route::post( '/contact', 'ContactUsController@index' )->name( 'contact' );

Route::get( '/home', function () {
	return redirect( 'admin' );
});
