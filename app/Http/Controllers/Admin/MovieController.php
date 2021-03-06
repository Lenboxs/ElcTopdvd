<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;
use App\Http\Requests\Admin\MovieFormRequest;

use App\Movie;
use App\Branch;
use App\Genre;
use App\Type;
use App\AgeRestriction;

class MovieController extends Controller
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
        $movies = Movie::all();

        $title = 'Manage Movies';

        return view( 'admin.movies.movies' )->withMovies( $movies )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Movie";

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.movies.add',
            array(
                'title' => $title,
                'branches' => $branches,
                'genres' => $genres,
                'types' => $types,
                'agerestrictions' => $agerestrictions
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( MovieFormRequest $request, UploadService $uploadService )
    {
        $movie = new Movie();

        $movie->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $movie->new = !empty( $request->input( 'new' ) ) ? 1 : 2;

        $movie->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $movie->slug = !empty( $request->input( 'name' ) ) ? str_slug( $request->input( 'name' ) ) : '';

        $movie->description = !empty( $request->input( 'description' ) ) ? $request->input( 'description' ) : '';

        $movie->image = $this->upload( 'image', $request, $uploadService );

        $movie->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );

        $movie->runtime = !empty( $request->input( 'runtime' ) ) ? $request->input( 'runtime' ) : '';

        $movie->agerestriction_id = !empty( $request->input( 'agerestriction_id' ) ) ? $request->input( 'agerestriction_id' ) : null;

        $movie->save();

        if( $request->exists( 'genres' ) )
        {
            $movie->genres()->detach();

            $movie->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $movie->branches()->detach();

            $movie->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'types' ) )
        {
            $game->types()->detach();

            $game->types()->attach( $request->input( 'types' ) );
        }

        flashy()->success( 'Movie was created successfully.' );

        return redirect( 'admin/add-movie' );

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
        $title = "Edit Movie";

        $movie = Movie::find( $id );

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.movies.edit',
            array(
                'title' => $title,
                'movie' => $movie,
                'branches' => $branches,
                'genres' => $genres,
                'types' => $types,
                'agerestrictions' => $agerestrictions
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
    public function update( MovieFormRequest $request, UploadService $uploadService )
    {
        $movie = Movie::find( $request->input( 'id' ) );

        $movie->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $movie->new = !empty( $request->input( 'new' ) ) ? 1 : 2;

        $movie->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $movie->slug = !empty( $request->input( 'name' ) ) ? str_slug( $request->input('name') ) : '';

        $movie->description = !empty( $request->input( 'description' ) ) ? $request->input( 'description' ) : '';

        $movie->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );

        $movie->runtime = !empty( $request->input( 'runtime' ) ) ? $request->input( 'runtime' ) : '';

        $movie->agerestriction_id = !empty( $request->input( 'agerestriction_id' ) ) ? $request->input( 'agerestriction_id' ) : null;

  	  	if( $request->input( 'remove_image' ) == 'true' )
  		  {
  			     $movie->image = '';
  		  }
        elseif( !empty( $request->file( 'image' ) ) )
  		  {
  			     $movie->image = $this->upload( 'image', $request, $uploadService );
  	  	}

  			$movie->save();

        if( $request->exists( 'genres' ) )
        {
            $movie->genres()->detach();

            $movie->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $movie->branches()->detach();

            $movie->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'types' ) )
        {
            $movie->types()->detach();

            $movie->types()->attach( $request->input( 'types' ) );
        }

        flashy()->success( 'Movies was updated successfully.' );

  			return redirect( 'admin/movies' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);

        $movie->delete();

        flashy()->success( 'Movie was deleted successfully.' );

        return redirect('admin/movies');
    }

    public function manage( $id )
    {
        $title = "Manage Movie Types";

        $movie = Movie::find( $id );

        $types = Type::all();

        return view( 'admin.movies.manage',
            array(
                'title' => $title,
                'movie' => $movie,
                'types' => $types
            )
        );
    }

    public function updateMovieType()
    {
        $movie = Movie::find( $id );

        flashy()->success( 'Movie was deleted successfully.' );

        return redirect( 'admin/movies' );
    }

    public function upload( $input, $request, $uploadService )
    {
    		if( !empty( $request->file( $input ) ) )
    		{
      			if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/movies' )->move() )
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
