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
//admin
Route::get( '/admin', 'Admin\HomeController@index' )->name( 'admin' );

//adminpages

Route::get( '/admin/home-page', 'Admin\HomeController@homePage' )->name( 'home-page' );

Route::get( '/admin/top-ten', 'Admin\HomeController@topTen' )->name( 'top-ten' );

Route::get( '/admin/top-rated', 'Admin\HomeController@topRated' )->name( 'top-rated' );

//adminmovies

Route::get( '/admin/movies', 'Admin\MovieController@index' )->name( 'movies' );

Route::get( '/admin/add-movie', 'Admin\MovieController@create' )->name( 'add-movie' );

Route::post('/admin/store-movie','Admin\MovieController@store')->name('store-movie');

Route::get( '/admin/edit-movie', 'Admin\MovieController@edit' )->name( 'edit-movie' );

Route::post('/admin/update-movie','Admin\MovieController@update')->name('update-movie');

Route::get( '/admin/delete-movie', 'Admin\MovieController@destroy' )->name( 'delete-movie' );

//adminseries

Route::get( '/admin/add-series', 'Admin\HomeController@addSeries' )->name( 'add-series' );

Route::get( '/admin/series', 'Admin\HomeController@series' )->name( 'series' );

//adminusers

Route::get( '/admin/users', 'Admin\HomeController@users' )->name( 'users' );

Route::get( '/admin/edit-user/{id}', 'Admin\HomeController@editUser' )->name( 'edit-user' );

//adminsettings

Route::get( '/admin/settings', 'Admin\HomeController@settings' )->name( 'settings' );

//adminbracnhs

Route::get( '/admin/add-branch', 'Admin\HomeController@addBranch' )->name( 'add-branch' );

Route::get( '/admin/branches', 'Admin\HomeController@branches' )->name( 'branches' );

//homepage

Route::get( '/', 'HomeController@index' )->name( 'home' );

//topten

Route::get( '/top-10', 'TopController@top' )->name( 'top-10' );

//toprated

Route::get( '/top-rated', 'TopController@rated' )->name( 'top-rated' );

//movies

Route::get( '/movies', 'MovieController@movies' )->name( 'movies' );

Route::get( '/movie/{name}', 'MovieController@movie' )->name( 'movie' );




//series

Route::get( '/series/{name}', 'SeriesController@series' )->name( 'series' );

//contactus

Route::get( '/contact-us', 'PageController@contact' )->name( 'contact-us' );

Route::post( '/contact', 'ContactUsController@index' )->name( 'contact' );

//privacypolicy

Route::get( '/privacy-policy', 'PageController@policy' )->name( 'privacy-policy' );

//T&C

Route::get( '/terms-and-conditions', 'PageController@terms' )->name( 'terms-and-conditions' );



Route::get( '/home', function () {
	return redirect( 'admin' );
});
