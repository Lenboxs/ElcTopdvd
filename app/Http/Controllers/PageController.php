<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function contact()
    {
        $branches = Branch::all();

        return view( 'pages.contact' )->withBranches( $branches );
    }

    public function about()
    {
        return view( 'pages.about-us' );
    }

    public function terms()
    {
        return view( 'pages.terms' );
    }

    public function policy()
    {
        return view( 'pages.policy' );
    }
}
