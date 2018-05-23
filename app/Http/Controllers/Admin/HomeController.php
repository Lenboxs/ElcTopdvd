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
     * Edit home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage()
    {
        $title = "Manage Home Page";

        return view( 'admin.pages.home' )->withTitle( $title );
    }

    /**
     * Edit home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function topTen()
    {
        $title = "Manage Top Ten Page";

        return view( 'admin.pages.top-ten' )->withTitle( $title );
    }

    /**
     * Edit home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function topRated()
    {
        $title = "Manage Top Rated Page";

        return view( 'admin.pages.top-rated' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addMovie()
    {
        $title = "Add New Movie";

        return view( 'admin.movies.add' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function movies()
    {
        $title = "Manage Movies";

        return view( 'admin.movies.movies' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSeries()
    {
        $title = "Add New Series";

        return view( 'admin.series.add' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function series()
    {
        $title = "Manage Series";

        return view( 'admin.series.series' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addBranch()
    {
        $title = "Add New Branch";

        return view( 'admin.branches.add' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function branches()
    {
        $title = "Manage Branches";

        return view( 'admin.branches.branches' )->withTitle( $title );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $title = "Manage Users";

        $users = User::all();

        return view( 'admin.users.users' )->withTitle( $title )->withUsers( $users );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUser( $id )
    {
        $title = "Edit User";

        $user = User::find( $id );

        $roles = Role::all();

        return view( 'admin.users.edit' )->withTitle( $title )->withUser( $user )->withRoles( $roles );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings()
    {
        $title = "Settings";

        return view( 'admin.pages.settings' )->withTitle( $title );
    }
}
