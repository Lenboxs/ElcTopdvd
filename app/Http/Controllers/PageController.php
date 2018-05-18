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
      * Show movies page.
      *
      * @return \Illuminate\Http\Response
      */
 	  public function movies()
     {
         return view( 'pages.movies' );
     }

	 /**
     * Show movie page.
     *
     * @return \Illuminate\Http\Response
     */
	  public function movie( $name )
    {
        $title = str_replace( "-", " ", title_case( $name ) );

        return view( 'pages.movie' )->withTitle( $title )->withName( $title );
    }

    /**
      * Show series page.
      *
      * @return \Illuminate\Http\Response
      */
     public function series( $name )
     {
         return view( 'pages.series' );
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
