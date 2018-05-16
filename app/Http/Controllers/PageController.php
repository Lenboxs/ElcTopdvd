<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

	/**
     * Show the new releases.
     *
     * @return \Illuminate\Http\Response
     */
	public function top()
    {
        return view( 'pages.top-10' );
    }

	/**
     * Show the new releases.
     *
     * @return \Illuminate\Http\Response
     */
	public function headlines()
    {
        return view( 'pages.top-headlines' );
    }

	/**
     * Show the new releases.
     *
     * @return \Illuminate\Http\Response
     */
	public function newreleases()
    {
        return view( 'pages.new-releases' );
    }

	/**
     * Show the contact us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view( 'pages.contact' );
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
