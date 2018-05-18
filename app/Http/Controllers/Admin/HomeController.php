<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view( 'admin.index' )->withTitle( $title );
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
    public function settings()
    {
        $title = "Settings";

        return view( 'admin.pages.settings' )->withTitle( $title );
    }
}
