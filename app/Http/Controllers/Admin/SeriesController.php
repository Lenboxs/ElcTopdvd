<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Series;

class SeriesController extends Controller
{
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

      return view( 'admin.series.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $series = new Series();

      $series->active= !empty($request->input('active')) ? 1 : 2;
      $series->new = !empty($request->input('new')) ? 1 : 2;
      $series->name = !empty($request->input('name')) ? $request->input('name') : '';
      $series->slug = !empty($request->input('name')) ? slug($request->input('name')) : '';
      $series->description = !empty($request->input('description')) ? $request->input('description') : '';
      $series->image = !empty($request->input('image')) ? $request->input('image') : '';
      $series->trailerLink = !empty($request->input('trailerLink')) ? $request->input('trailerLink') : '';
      $series->season = !empty($request->input('season')) ? $request->input('season') : '';

      $series->save();

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

      return view( 'admin.series.edit' )->withTitle( $title );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $series = Series::find($request->input('id'));

      $series->active= !empty($request->input('active')) ? 1 : 2;
      $series->new = !empty($request->input('new')) ? 1 : 2;
      $series->name = !empty($request->input('name')) ? $request->input('name') : '';
      $series->slug = !empty($request->input('name')) ? slug($request->input('name')) : '';
      $series->description = !empty($request->input('description')) ? $request->input('description') : '';
      $series->image = !empty($request->input('image')) ? $request->input('image') : '';
      $series->trailerLink = !empty($request->input('trailerLink')) ? $request->input('trailerLink') : '';
      $series->season = !empty($request->input('season')) ? $request->input('season') : '';

      $series->save();

      return redirect('admin/series');
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

      return redirect('admin/series');
    }
}
