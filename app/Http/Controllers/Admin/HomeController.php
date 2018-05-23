<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

use App\Role;
use App\User;
use App\Movie;
use App\Series;

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
              $admins->concat($user);
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
        $title = "Admin Dashboard";

        $movies = Movie::all();

        $series = Series::all();

        $users = User::all();

        $admins = new Collection();

        foreach( $users as $user )
        {
           if( $user->isAdmin() )
           {
              $admins->concat($user);
           }
        }

        return view( 'admin.index' )->withTitle( $title )->withUsers( $users )->withAdmins( $admins )->withSeries( $series )->withMovies( $movies );
    }
}
