<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Genre;
use App\Http\Requests\Admin\GenreFormRequest;

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

      return view( 'admin.pages.settings' )->withTitle( $title );
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

      return view( 'admin.pages.settings' )->withTitle( $title )->withGenre( $genre );
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

        return redirect( 'admin/settings#genres' );
     }
}
