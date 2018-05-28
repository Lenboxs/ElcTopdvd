<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Genre;
use App\Branch;
use App\Type;

class MovieController extends Controller
{
      public function movies()
       {
         $branches = Branch::all();

         $genres = Genre::all();

         $types = Type::all();

         return view( 'pages.movies',
           array(
             'branches' => $branches,
             'genres' => $genres,
             'types' => $types,
           )
         );
       }

     public function movie( $slug )
      {
          $movie = Movie::where( 'slug', $slug )->orderBy( 'id', 'desc' )->first();

          return view( 'pages.movie' )->withMovie( $movie );
      }
}
