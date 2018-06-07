<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Series;
use App\Genre;
use App\Branch;
use App\Type;

class SeriesController extends Controller
{
    public function allSeries()
    {
        $series = Series::where( 'active', 1 )->get();

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        return view( 'pages.all-series',
          array(
            'series' => $series,
            'branches' => $branches,
            'genres' => $genres,
            'types' => $types,
          )
      );
    }

    public function series( $slug )
    {
        $series = Series::where( 'slug', $slug )->where( 'active', 1 )->orderBy( 'id', 'desc' )->first();

        return view( 'pages.series',
          array(
            'series' => $series
          )
      );
    }
}
