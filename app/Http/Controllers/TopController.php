<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TopTenPage;

class TopController extends Controller
{
      public function top()
      {
          $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

          $movies = $topten->movies;

          return view( 'pages.top-10',
            array(
              'topten' => $topten,
              'movies' => $movies
            )
          );
      }

      public function rated()
      {
          $title = "top rated";
          return view( 'pages.top-rated' )->withTitle($title);
      }
}
