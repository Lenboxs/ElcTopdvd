<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Http\Requests\Admin\ReviewFormRequest;

class ReviewController extends Controller
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
       $review = Review::all();

       $title = 'Manage Reviews';

       return view( 'admin.reviews.reviews' )->withReview( $review )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Review";

      return view( 'admin.reviews.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewFormRequest $request)
    {
      $review = new Review();

      $review->name = !empty($request->input('name')) ? $request->input('name') : '';

      $review->save();

      flashy()->success( 'Review was created successfully.' );

      return redirect('admin/add-review');
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
      $title = "Edit Review";

      $review = Review::find( $id );

      return view( 'admin.reviews.edit' )->withTitle( $title )->withReview( $review );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewFormRequest $request)
    {
      $review = Review::find($request->input('id'));

      $review->name = !empty($request->input('name')) ? $request->input('name') : '';

      $review->save();

      flashy()->success( 'Review was updated successfully.' );

      return redirect('admin/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $review = Review::find($id);

      $review->delete();

      flashy()->success( 'Review was deleted successfully.' );

      return redirect('admin/reviews');
  }

}
