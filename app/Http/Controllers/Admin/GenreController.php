<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GenreFormRequest;

use App\Settings;
use App\SocialMedia;
use App\Branch;
use App\Type;
use App\Genre;
use App\AgeRestriction;
use App\Recaptcha;

class GenreController extends Controller
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
       $genre = Genre::all();

       $title = 'Manage Genre';

       return view( 'admin.genres.genres' )->withGenre( $genre )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Genre";

      $settings = Settings::orderBy( 'id', 'desc' )->first();

      $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

      $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

      $branches = Branch::all();

      $genres = Genre::all();

      $types = Type::all();

      $agerestrictions = AgeRestriction::all();

      return view( 'admin.pages.settings',
        array(
            'title' => $title,
            'settings' => $settings,
            'socialmedia' => $social_media,
            'branches' => $branches,
            'genres' => $genres,
            'types' => $types,
            'agerestrictions' => $agerestrictions,
        )
      );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreFormRequest $request)
    {
      $genre = new Genre();

      $genre->name = !empty($request->input('name')) ? $request->input('name') : '';

      $genre->save();

      flashy()->success( 'Genre was created successfully.' );

      return redirect( 'admin/settings#genres' );
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
    public function edit( $id )
    {
      $title = "Edit Genre";

      $genre = Genre::find( $id );

      $settings = Settings::orderBy( 'id', 'desc' )->first();

      $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

      $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

      $branches = Branch::all();

      $types = Type::all();

      $agerestrictions = AgeRestriction::all();

      return view( 'admin.pages.settings',
        array(
            'title' => $title,
            'settings' => $settings,
            'socialmedia' => $social_media,
            'branches' => $branches,
            'genre' => $genre,
            'types' => $types,
            'agerestrictions' => $agerestrictions,
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
    public function update(GenreFormRequest $request)
    {
      $genre = Genre::find($request->input('id'));

      $genre->name = !empty($request->input('name')) ? $request->input('name') : '';

      $genre->save();

      flashy()->success( 'Genre was updated successfully.' );

      return redirect( 'admin/settings#genres' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);

        $genre->delete();

        flashy()->success( 'Genre was deleted successfully.' );

        return redirect( 'admin/settings#genres' );
     }
}
