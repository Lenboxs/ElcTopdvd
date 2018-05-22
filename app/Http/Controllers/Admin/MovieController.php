<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        $title = 'Manage Movies';
        return view('admin.movies.movies')->withMovies($movies)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Movie";

      return view( 'admin.movies.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();

        $movie->active= !empty($request->input('active')) ? 1 : 2;
        $movie->new = !empty($request->input('new')) ? 1 : 2;
        $movie->name = !empty($request->input('name')) ? $request->input('name') : '';
        $movie->description = !empty($request->input('description')) ? $request->input('description') : '';
        $movie->image = !empty($request->input('image')) ? $request->input('image') : '';
        $movie->trailerLink = !empty($request->input('trailerLink')) ? $request->input('trailerLink') : '';

        $movie->save();

        return redirect('admin/add-movie');

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
      $title = "Edit Movie";

      return view( 'admin.movies.edit' )->withTitle( $title );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $movie = Movie::find($id);

      $movie->active= !empty($request->input('active')) ? 1 : 2;
      $movie->new = !empty($request->input('new')) ? 1 : 2;
      $movie->name = !empty($request->input('name')) ? $request->input('name') : '';
      $movie->description = !empty($request->input('description')) ? $request->input('description') : '';
      $movie->image = !empty($request->input('image')) ? $request->input('image') : '';
      $movie->trailerLink = !empty($request->input('trailerLink')) ? $request->input('trailerLink') : '';

      $movie->save();

      return redirect('admin/movies');
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

        return redirect('admin/movies');
    }
}