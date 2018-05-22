<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
      public function movies()
       {
           return view( 'pages.movies' );
       }

     public function movie( $name )
      {
          $title = str_replace( "-", " ", title_case( $name ) );

          return view( 'pages.movie' )->withTitle( $title )->withName( $title );
      }
}
