<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Series;
use App\Genre;
use App\Branch;
use App\Type;

class SeriesController extends Controller
{
    public function series( $name )
    {
        $series = Series::all();

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        return view( 'pages.series',
          array(
            'series' => $series,
            'branches' => $branches,
            'genres' => $genres,
            'types' => $types,
          )
      );
    }
}
