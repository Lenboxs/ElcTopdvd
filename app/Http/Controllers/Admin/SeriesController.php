<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;
use App\Http\Requests\Admin\SeriesFormRequest;

use App\Series;
use App\Branch;
use App\Genre;
use App\Type;
use App\AgeRestriction;

class SeriesController extends Controller
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
      $series = Series::all();

      $title = 'Manage Series';

      return view('admin.series.series')->withSeries($series)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Series";

      $branches = Branch::all();

      $genres = Genre::all();

      $types = Type::all();

      $agerestrictions = AgeRestriction::all();

      return view( 'admin.series.add',
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
    public function store( SeriesFormRequest $request, UploadService $uploadService )
    {
        $series = new Series();

        $series->active= !empty($request->input('active')) ? 1 : 2;
        $series->new = !empty($request->input('new')) ? 1 : 2;
        $series->name = !empty($request->input('name')) ? $request->input('name') : '';
        $series->slug = !empty($request->input('name')) ? str_slug( $request->input('name') ) : '';
        $series->description = !empty($request->input('description')) ? $request->input('description') : '';
        $series->image = $this->upload( 'image', $request, $uploadService );
        $series->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );
        $series->season = !empty($request->input('season')) ? $request->input('season') : '';

        $series->agerestriction_id = !empty( $request->input( 'agerestriction_id' ) ) ? $request->input( 'agerestriction_id' ) : null;

        $series->save();

        if( $request->exists( 'genres' ) )
        {
            $series->genres()->detach();

            $series->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $series->branches()->detach();

            $series->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'types' ) )
        {
            $game->types()->detach();

            $game->types()->attach( $request->input( 'types' ) );
        }

        flashy()->success( 'Series was created successfully.' );

        return redirect('admin/add-series');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Series";

        $series = Series::find( $id );

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.series.edit',
            array(
                'title' => $title,
                'series' => $series,
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
    public function update(SeriesFormRequest $request, UploadService $uploadService )
    {
        $series = Series::find($request->input('id'));

        $series->active= !empty($request->input('active')) ? 1 : 2;
        $series->new = !empty($request->input('new')) ? 1 : 2;
        $series->name = !empty($request->input('name')) ? $request->input('name') : '';
        $series->slug = !empty($request->input('name')) ? str_slug( $request->input('name') ) : '';
        $series->description = !empty($request->input('description')) ? $request->input('description') : '';

        $series->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );
        $series->season = !empty($request->input('season')) ? $request->input('season') : '';

        $series->agerestriction_id = !empty( $request->input( 'agerestriction_id' ) ) ? $request->input( 'agerestriction_id' ) : null;

        $status = true;

        if( $request->input( 'remove_image' ) == 'true' )
    		{
    			   $series->image = '';
    		}
        elseif( !empty( $request->file( 'image' ) ) )
    		{
    			   $series->image = $this->upload( 'image', $request, $uploadService );

    			   $status = $uploadService->successful();
    		}

        if( $request->exists( 'genres' ) )
        {
            $series->genres()->detach();

            $series->genres()->attach( $request->input( 'genres' ) );
        }

        if( $request->exists( 'branches' ) )
        {
            $series->branches()->detach();

            $series->branches()->attach( $request->input( 'branches' ) );
        }

        if( $request->exists( 'types' ) )
        {
            $game->types()->detach();

            $game->types()->attach( $request->input( 'types' ) );
        }

    		$series->save();

        flashy()->success( 'Series was updated successfully.' );

    		return redirect( 'admin/series' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $series = Series::find($id);

        $series->delete();

        flashy()->success( 'Series was deleted successfully.' );

        return redirect('admin/series');
    }

    public function upload( $input, $request, $uploadService )
    {
        if( !empty( $request->file( $input ) ) )
        {
            if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/series' )->move() )
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
