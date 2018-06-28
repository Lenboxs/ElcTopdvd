<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Type;
use App\Console;
use App\HomePage;

class HomeController extends Controller
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
    public function index()
    {
        $home = HomePage::getHomePage();

        $slider = $home->slider;

        $movies = Movie::take(7)->get();

        $types = Type::where( 'active', 1 )->get();

        $consoles = Console::where( 'active', 1 )->get();

        return view( 'home',
          array(
            'home' => $home,
            'slider' => $slider,
            'movies' => $movies,
            'types' => $types,
            'consoles' => $consoles
          )
        );
    }
}
