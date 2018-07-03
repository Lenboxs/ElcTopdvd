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
Auth::routes();

//Route::get( '/', function () { return view('welcome'); });
Route::get( '/login', function () {
	return redirect( 'sign-in' );
})->name( 'login' );

Route::get( '/register', function () {
	return redirect( 'sign-in' );
})->name( 'register' );


//admin
Route::get( '/sign-in', 'Auth\SignInController@index' )->name( 'sign-in' );

Route::group( [ 'middleware' => ['IsAdmin' ] ], function () {

Route::get( '/admin', 'Admin\HomeController@index' )->name( 'admin' );

//adminpages

Route::get( '/admin/home-page', 'Admin\HomeController@homePage' )->name( 'home-page' );

Route::post( '/admin/update-homepage', 'Admin\HomeController@updateHomepage' )->name( 'update-home-page' );

Route::get( '/admin/top-ten', 'Admin\TopTenController@edit' )->name( 'top-ten' );

Route::get( '/admin/movie-to-top-ten/{id}', 'Admin\TopTenController@move' )->name( 'movie-to-top-ten' );

Route::get( '/admin/remove-movie-from-top-ten/{id}', 'Admin\TopTenController@remove' )->name( 'remove-movie-from-top-ten' );

Route::get( '/admin/sort', 'Admin\TopTenController@sort' )->name( 'sort-top-ten-movies' );

Route::post( '/admin/update-topten', 'Admin\TopTenController@update' )->name( 'update-topten' );

Route::get( '/admin/about-us', 'Admin\HomeController@aboutUs' )->name( 'about-us' );

Route::post( '/admin/update-about-us', 'Admin\HomeController@updateAboutUs' )->name( 'update-about-us' );

//adminmovies

Route::get( '/admin/movies', 'Admin\MovieController@index' )->name( 'movies' );

Route::get( '/admin/add-movie', 'Admin\MovieController@create' )->name( 'add-movie' );

Route::post( '/admin/store-movie','Admin\MovieController@store' )->name( 'store-movie' );

Route::get( '/admin/edit-movie/{id}', 'Admin\MovieController@edit' )->name( 'edit-movie' );

Route::post( '/admin/update-movie','Admin\MovieController@update' )->name( 'update-movie' );

Route::get( '/admin/manage-movie/{id}', 'Admin\MovieController@manage' )->name( 'manage-movie' );

Route::post( '/admin/update-movie-type','Admin\MovieController@updateMovieType' )->name( 'update-movie-type' );

Route::get( '/admin/delete-movie/{id}', 'Admin\MovieController@destroy' )->name( 'delete-movie' );

//adminseries

Route::get( '/admin/series', 'Admin\SeriesController@index' )->name( 'series' );

Route::get( '/admin/add-series', 'Admin\SeriesController@create' )->name( 'add-series' );

Route::post('/admin/store-series','Admin\SeriesController@store')->name( 'store-series' );

Route::get( '/admin/edit-series/{id}', 'Admin\SeriesController@edit' )->name( 'edit-series' );

Route::post('/admin/update-series','Admin\SeriesController@update')->name( 'update-series' );

Route::get( '/admin/delete-series/{id}', 'Admin\SeriesController@destroy' )->name( 'delete-series' );

//admingames

Route::get( '/admin/games', 'Admin\GameController@index' )->name( 'games' );

Route::get( '/admin/add-game', 'Admin\GameController@create' )->name( 'add-game' );

Route::post( '/admin/store-game','Admin\GameController@store' )->name( 'store-game' );

Route::get( '/admin/edit-game/{id}', 'Admin\GameController@edit' )->name( 'edit-game' );

Route::post( '/admin/update-game','Admin\GameController@update' )->name( 'update-game' );

Route::get( '/admin/delete-game/{id}', 'Admin\GameController@destroy' )->name( 'delete-game' );

//adminsliders

Route::get( '/admin/sliders', 'Admin\SliderController@index' )->name( 'sliders' );

Route::get( '/admin/add-slider', 'Admin\SliderController@create' )->name( 'add-slider' );

Route::post( '/admin/store-slider','Admin\SliderController@store' )->name( 'store-slider' );

Route::get( '/admin/edit-slider/{id}', 'Admin\SliderController@edit' )->name( 'edit-slider' );

Route::post( '/admin/update-slider','Admin\SliderController@update' )->name( 'update-slider' );

Route::get( '/admin/delete-slider/{id}', 'Admin\SliderController@destroy' )->name( 'delete-slider' );

//adminslides

Route::get( '/admin/slides', 'Admin\SlideController@index' )->name( 'slides' );

Route::get( '/admin/add-slide', 'Admin\SlideController@create' )->name( 'add-slide' );

Route::post( '/admin/store-slide','Admin\SlideController@store' )->name( 'store-slide' );

Route::get( '/admin/edit-slide/{id}', 'Admin\SlideController@edit' )->name( 'edit-slide' );

Route::post( '/admin/update-slide','Admin\SlideController@update' )->name( 'update-slide' );

Route::get( '/admin/delete-slide/{id}', 'Admin\SlideController@destroy' )->name( 'delete-slide' );

//adminteam

Route::get( '/admin/team', 'Admin\StaffController@index' )->name( 'team' );

Route::get( '/admin/add-team-member', 'Admin\StaffController@create' )->name( 'add-team-member' );

Route::post('/admin/store-team-member','Admin\StaffController@store')->name( 'store-team-member' );

Route::get( '/admin/edit-team-member/{id}', 'Admin\StaffController@edit' )->name( 'edit-team-member' );

Route::post('/admin/update-team-member','Admin\StaffController@update')->name( 'update-team-member' );

Route::get( '/admin/delete-team-member/{id}', 'Admin\StaffController@destroy' )->name( 'delete-team-member' );

//adminusers

Route::get( '/admin/users', 'Admin\UserController@index' )->name( 'users' );

Route::get( '/admin/add-user', 'Admin\UserController@create' )->name( 'add-user' );

Route::post('/admin/store-user','Admin\UserController@store')->name( 'store-user' );

Route::get( '/admin/edit-user/{id}', 'Admin\UserController@edit' )->name( 'edit-user' );

Route::post('/admin/update-user','Admin\UserController@update')->name( 'update-user' );

Route::get( '/admin/delete-user/{id}', 'Admin\UserController@destroy' )->name( 'delete-user' );

//adminsettings

Route::get( '/admin/settings', 'Admin\SettingsController@edit' )->name( 'settings' );

Route::post('/admin/update-settings','Admin\SettingsController@update')->name('update-settings');

Route::post('/admin/update-recaptcha','Admin\RecaptchaController@update')->name('update-recaptcha');

Route::post('/admin/update-socialmedia','Admin\SocialMediaController@update')->name('update-socialmedia');

//adminbracnhs

Route::get( '/admin/branches', 'Admin\BranchController@index' )->name( 'branches' );

Route::get( '/admin/manage-branches', 'Admin\BranchController@manage' )->name( 'manage-branches' );

Route::get( '/admin/manage-branch/{id}', 'Admin\BranchController@manageBranch' )->name( 'manage-branch' );

Route::get( '/admin/add-branch', 'Admin\BranchController@create' )->name( 'add-branch' );

Route::post('/admin/store-branch','Admin\BranchController@store')->name('store-branch');

Route::get( '/admin/edit-branch/{id}', 'Admin\BranchController@edit' )->name( 'edit-branch' );

Route::post('/admin/update-branch','Admin\BranchController@update')->name('update-branch');

Route::get( '/admin/delete-branch/{id}', 'Admin\BranchController@destroy' )->name( 'delete-branch' );

//admingenres

Route::get( '/admin/genres', 'Admin\GenreController@index' )->name( 'genres' );

Route::get( '/admin/add-genre', 'Admin\GenreController@create' )->name( 'add-genre' );

Route::post('/admin/store-genre','Admin\GenreController@store')->name( 'store-genre' );

Route::get( '/admin/edit-genre/{id}', 'Admin\GenreController@edit' )->name( 'edit-genre' );

Route::post('/admin/update-genre','Admin\GenreController@update')->name( 'update-genre' );

Route::get( '/admin/delete-genre/{id}', 'Admin\GenreController@destroy' )->name( 'delete-genre' );

//admintypes

Route::get( '/admin/types', 'Admin\TypeController@index' )->name( 'types' );

Route::get( '/admin/add-type', 'Admin\TypeController@create' )->name( 'add-type' );

Route::post('/admin/store-type','Admin\TypeController@store')->name( 'store-type' );

Route::get( '/admin/edit-type/{id}', 'Admin\TypeController@edit' )->name( 'edit-type' );

Route::post('/admin/update-type','Admin\TypeController@update')->name( 'update-type' );

Route::get( '/admin/delete-type/{id}', 'Admin\TypeController@destroy' )->name( 'delete-type' );

//admintypes

Route::get( '/admin/consoles', 'Admin\ConsoleController@index' )->name( 'consoles' );

Route::get( '/admin/add-console', 'Admin\ConsoleController@create' )->name( 'add-console' );

Route::post('/admin/store-console','Admin\ConsoleController@store')->name( 'store-console' );

Route::get( '/admin/edit-console/{id}', 'Admin\ConsoleController@edit' )->name( 'edit-console' );

Route::post('/admin/update-console','Admin\ConsoleController@update')->name( 'update-console' );

Route::get( '/admin/delete-console/{id}', 'Admin\ConsoleController@destroy' )->name( 'delete-conosle' );

//admingenres

Route::get( '/admin/age-restrictions', 'Admin\AgeRestrictionController@index' )->name( 'age-restrictions' );

Route::get( '/admin/add-age-restriction', 'Admin\AgeRestrictionController@create' )->name( 'add-age-restriction' );

Route::post('/admin/store-age-restriction','Admin\AgeRestrictionController@store')->name( 'store-age-restriction' );

Route::get( '/admin/edit-age-restriction/{id}', 'Admin\AgeRestrictionController@edit' )->name( 'edit-age-restriction' );

Route::post('/admin/update-age-restriction','Admin\AgeRestrictionController@update')->name( 'update-age-restriction' );

Route::get( '/admin/delete-age-restriction/{id}', 'Admin\AgeRestrictionController@destroy' )->name( 'delete-age-restriction' );

} );
//-----------------------------------------------------------------------------------------------------------------------------------------
//homepage

Route::get( '/', 'HomeController@index' )->name( 'home' );
Route::get( '/search', 'SearchController@index' )->name( 'search' );

//topten

Route::get( '/top-10', 'TopController@top' )->name( 'top-10' );

//toprated

Route::get( '/top-rated', 'TopController@rated' )->name( 'top-rated' );

Route::get( '/about-us', 'PageController@about' )->name( 'about-us' );

//movies

Route::get( '/movies', 'MovieController@movies' )->name( 'movies' );

Route::get( '/movie/{name}', 'MovieController@movie' )->name( 'movie' );

Route::get( '/old-movies', 'MovieController@old' )->name( 'old-movies' );

Route::get( '/kiddies-budget', 'MovieController@kiddies' )->name( 'kiddies-budget' );

//series

Route::get( '/series', 'SeriesController@allSeries' )->name( 'all-series' );

Route::get( '/series/{name}', 'SeriesController@series' )->name( 'series' );

// games

Route::get( '/games', 'GameController@index' )->name( 'games' );

Route::get( '/game/{name}', 'GameController@show' )->name( 'game' );

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
