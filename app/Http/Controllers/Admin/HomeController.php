<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

use App\Role;
use App\User;
use App\Movie;
use App\Series;
use App\HomePage;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		    $this->middleware( 'auth' );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Admin Dashboard";

        $movies = Movie::all();

        $series = Series::all();

        $users = User::all();

        $admins = new Collection();

        foreach( $users as $user )
        {
           if( $user->isAdmin() )
           {
                $admins->push( $user );
           }
        }

        return view( 'admin.index' )->withTitle( $title )->withUsers( $users )->withAdmins( $admins )->withSeries( $series )->withMovies( $movies );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $title = "Manage Home Page";

        $sliders = Slider::where( 'active', 1 )->get();

        $homepage = HomePage::getHomePage();

        return view( 'admin.pages.home', [
          'title' => $title,
          'homepage' => $homepage,
          'sliders' => $sliders
        ]);
    }

    public function updateHomepage( Request $request )
    {
        $homepage = HomePage::getHomePage();

        $homepage->slider_id = !empty( $request->input( 'slider' ) ) ? $request->input( 'slider' ) : '';

        $homepage->save();

        flashy()->success( 'Home page was updated successfully.' );

        return redirect( 'admin/home-page' );
    }
}
