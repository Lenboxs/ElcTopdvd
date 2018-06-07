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
           $movies = Movie::where( 'active', 1 )->get();

           $branches = Branch::all();

           $genres = Genre::all();

           $types = Type::all();

           return view( 'pages.movies',
             array(
               'movies' => $movies,
               'branches' => $branches,
               'genres' => $genres,
               'types' => $types,
             )
           );
       }

    public function movie( $slug )
    {
          $movie = Movie::where( 'slug', $slug )->where( 'active', 1 )->orderBy( 'id', 'desc' )->first();

          return view( 'pages.movie' )->withMovie( $movie );
    }

    public function old()
    {
          $movie = Movie::where( 'active', 1 )->orderBy( 'id', 'desc' )->first();

          return view( 'pages.old-movies' )->withMovie( $movie );
    }

    public function kiddies()
    {
          $movie = Movie::where( 'active', 1 )->orderBy( 'id', 'desc' )->first();

          return view( 'pages.kiddies-budget' )->withMovie( $movie );
    }
}
