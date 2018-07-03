<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;
use App\Http\Requests\Admin\StaffFormRequest;

use App\Staff;

class StaffController extends Controller
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
        $staff = Staff::all();

        $title = 'Manage Staff';

        return view( 'admin.staff.staff' )->withStaff( $staff )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Staff";

        return view( 'admin.staff.add',
            array(
                'title' => $title
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StaffFormRequest $request )
    {
        $staff = new Staff();

        $staff->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $staff->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $staff->position = !empty( $request->input( 'position' ) ) ? $request->input( 'position' ) : '';

        $staff->image = uploadFile( 'image', $request );

        $staff->save();

        flashy()->success( 'Team member was created successfully.' );

        return redirect( 'admin/team' );

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
        $title = "Edit Staff";

        $staff = Staff::find( $id );

        return view( 'admin.staff.edit',
            array(
                'title' => $title,
                'staff' => $staff
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
    public function update( StaffFormRequest $request )
    {
        $staff = Staff::find( $request->input( 'id' ) );

        $staff->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $staff->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $staff->position = !empty( $request->input( 'position' ) ) ? $request->input( 'position' ) : '';

  	  	if( $request->input( 'remove_image' ) == 'true' )
  		  {
  			     $staff->image = '';
  		  }
        elseif( !empty( $request->file( 'image' ) ) )
  		  {
  			     $staff->image = uploadFile( 'image', $request );
  	  	}

  			$staff->save();

        flashy()->success( 'Team member was updated successfully.' );

  			return redirect( 'admin/team' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $staff = Staff::find( $id );

        $staff->delete();

        flashy()->success( 'Team member was deleted successfully.' );

        return redirect( 'admin/team' );
    }
}
