<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;
use App\Http\Requests\Admin\GameFormRequest;

use App\Game;
use App\Branch;
use App\Genre;
use App\Console;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware( 'auth' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        $title = 'Manage Games';

        return view('admin.games.games')->withGames($games)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Game";

        $branches = Branch::all();

        $genres = Genre::all();

        $consoles = Console::all();

        return view( 'admin.games.add',
            array(
                'title' => $title,
                'branches' => $branches,
                'genres' => $genres,
                'consoles' => $consoles
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( GameFormRequest $request, UploadService $uploadService )
    {
        $game = new Game();

        $game->active= !empty($request->input('active')) ? 1 : 2;

        $game->new = !empty($request->input('new')) ? 1 : 2;

        $game->name = !empty($request->input('name')) ? $request->input('name') : '';

        $game->slug = !empty($request->input('name')) ? str_slug( $request->input('name') ) : '';

        $game->description = !empty($request->input('description')) ? $request->input('description') : '';

        $game->image = $this->upload( 'image', $request, $uploadService );

        $game->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );

        $game->year = !empty( $request->input( 'year' ) ) ? $request->input( 'year' ) : '';

        $game->save();

        if( $request->exists( 'genres' ) )
        {
            $game->genres()->detach();

            $game->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $game->branches()->detach();

            $game->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'consoles' ) )
        {
            $game->consoles()->detach();

            $game->consoles()->attach( $request->input( 'consoles' ) );
        }

        flashy()->success( 'Game was created successfully.' );

        return redirect( 'admin/add-game' );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id )
    {
        $title = "Edit Game";

        $game = Game::find( $id );

        $branches = Branch::all();

        $genres = Genre::all();

        $consoles = Console::all();

        return view( 'admin.games.edit',
            array(
                'title' => $title,
                'game' => $game,
                'branches' => $branches,
                'genres' => $genres,
                'consoles' => $consoles
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( GameFormRequest $request, UploadService $uploadService )
    {
        $game = Game::find( $request->input( 'id' ) );

        $game->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $game->new = !empty( $request->input( 'new' ) ) ? 1 : 2;

        $game->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $game->slug = !empty( $request->input( 'name' ) ) ? str_slug( $request->input('name') ) : '';

        $game->description = !empty( $request->input( 'description' ) ) ? $request->input( 'description' ) : '';

        $game->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );

        $game->year = !empty( $request->input( 'year' ) ) ? $request->input( 'year' ) : '';

        $status = true;

  	  	if( $request->input( 'remove_image' ) == 'true' )
  		  {
  			     $game->image = '';
  		  }
        elseif( !empty( $request->file( 'image' ) ) )
  		  {
  			     $game->image = $this->upload( 'image', $request, $uploadService );

  			     $status = $uploadService->successful();
  	  	}

  			$game->save();

        if( $request->exists( 'genres' ) )
        {
            $game->genres()->detach();

            $game->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $game->branches()->detach();

            $game->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'consoles' ) )
        {
            $game->consoles()->detach();

            $game->consoles()->attach( $request->input( 'consoles' ) );
        }

        flashy()->success( 'Games was updated successfully.' );

  			return redirect( 'admin/games' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = Game::find($id);

        $game->delete();

        flashy()->success( 'Game was deleted successfully.' );

        return redirect( 'admin/games' );
    }

    public function upload( $input, $request, $uploadService )
    {
    		if( !empty( $request->file( $input ) ) )
    		{
      			if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/games' )->move() )
      			{
      				return $uploadService->getTargetFile();
      			}

      			$this->status = $this->status && $uploadService->successful();
    		}
    		elseif( $request->input( 'remove_' . $input ) == 'true' )
    		{
    			   return '';
    		}
    }

    public function getTrailerLink( $trailerLink )
    {
        if( empty( $trailerLink ) )
        {
           return '';
        }

        if( strpos( $trailerLink, 'embed' ) !== false )
        {
            return $trailerLink;
        }
        elseif( strpos( $trailerLink, 'watch' ) !== false )
        {
            $url = explode( "?", $trailerLink );

            $video = explode( "=", $url[1] );

            return "https://www.youtube.com/embed/" . $video[1] . "?rel=0&amp;controls=0&amp;showinfo=0";
        }
        else
        {
           return '';
        }
    }
}
