<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;
use App\Http\Requests\Admin\TypeFormRequest;

class TypeController extends Controller
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
       $type = Type::all();

       $title = 'Manage Types';

       return view( 'admin.types.types' )->withType( $type )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Type";

      return view( 'admin.pages.settings' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeFormRequest $request)
    {
      $type = new Type();

      $type->name = !empty($request->input('name')) ? $request->input('name') : '';

      $type->save();

      return redirect( 'admin/settings#types' );
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
      $title = "Edit Type";

      $type = Type::find( $id );

      return view( 'admin.pages.settings' )->withTitle( $title )->withType( $type );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeFormRequest $request)
    {
      $type = Type::find($request->input('id'));

      $type->name = !empty($request->input('name')) ? $request->input('name') : '';

      $type->save();

      return redirect( 'admin/settings#types' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $type = Type::find($id);

      $type->delete();

      return redirect( 'admin/settings#types' );
    }
}
