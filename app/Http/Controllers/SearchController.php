<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
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
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index( Request $request )
  {
      $search = !empty( $request->input( 'search' ) ) ? $request->input( 'search' ) : '';

      return view( 'pages.search' )->withSearch( $search );
  }
}
