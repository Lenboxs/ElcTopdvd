<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\AgeRestrictionFormRequest;

use App\AgeRestriction;

class AgeRestrictionController extends Controller
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
       $agerestriction = AgeRestriction::all();

       $title = 'Manage Age Restriction';

       return view( 'admin.agerestrictions.agerestrictions' )->withAgeRestriction( $agerestriction )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Age Restriction";

      return view( 'admin.agerestrictions.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgeRestrictionFormRequest $request)
    {
      $agerestriction = new AgeRestriction();

      $agerestriction->name = !empty($request->input('name')) ? $request->input('name') : '';

      $agerestriction->save();

      return redirect('admin/add-agerestriction');
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
      $title = "Edit Age Restriction";

      $agerestriction = AgeRestriction::find( $id );

      return view( 'admin.agerestrictions.edit' )->withTitle( $title )->withAgeRestriction( $agerestriction );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgeRestrictionFormRequest $request)
    {
      $agerestriction = AgeRestriction::find($request->input('id'));

      $agerestriction->name = !empty($request->input('name')) ? $request->input('name') : '';

      $agerestriction->save();

      return redirect('admin/agerestrictions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $agerestriction = AgeRestriction::find($id);

      $agerestriction->delete();

      return redirect('admin/agerestrictions');
  }

}
