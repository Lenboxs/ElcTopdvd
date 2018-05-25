<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Recaptcha;


class RecaptchaController extends Controller
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
       $recaptcha = Recaptcha::all();

       $title = 'Manage Recaptcha';

       return view( 'admin.recaptchas.recaptchas' )->withRecaptcha( $recaptcha )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Recaptcha";

      return view( 'admin.recaptchas.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $recaptcha = new Recaptcha();

      $recaptcha->name = !empty($request->input('name')) ? $request->input('name') : '';

      $recaptcha->save();

      return redirect('admin/add-recaptcha');
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
      $title = "Edit Recaptcha";

      $recaptcha = Type::find( $id );

      return view( 'admin.recaptchas.edit' )->withTitle( $title )->withRecaptcha( $recaptcha );
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
      $recaptcha = Type::find($request->input('id'));

      $recaptcha->name = !empty($request->input('name')) ? $request->input('name') : '';

      $recaptcha->save();

      return redirect('admin/recaptchas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $recaptcha = Recaptcha::find($id);

      $recaptcha->delete();

      return redirect('admin/recaptchas');
  }

}
