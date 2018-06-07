<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Game;
use App\Genre;
use App\Branch;
use App\Console;

class GameController extends Controller
{
    public function index()
    {
         $games = Game::where( 'active', 1 )->get();

         $branches = Branch::all();

         $genres = Genre::all();

         $consoles = Console::all();

         return view( 'pages.games',
           array(
             'games' => $games,
             'branches' => $branches,
             'genres' => $genres,
             'consoles' => $consoles,
           )
         );
     }

     public function show( $slug )
     {
           $game = Game::where( 'slug', $slug )->where( 'active', 1 )->orderBy( 'id', 'desc' )->first();

           return view( 'pages.game' )->withGame( $game );
     }
}
