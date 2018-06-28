<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;

use App\Slider;
use App\HomePage;

class SliderController extends Controller
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
        $sliders = Slider::all();

        $title = 'Manage Sliders';

        return view('admin.sliders.sliders')->withSliders( $sliders )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Slider";

        return view( 'admin.sliders.add', [ 'title' => $title ] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $homepage = HomePage::orderBy( 'id', 'desc' )->first();

        $slider = new Slider();

        $slider->active= !empty($request->input('active')) ? 1 : 2;

        $slider->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $slider->home_page_id = !empty( $homepage ) ? $homepage->id : '';

        $slider->save();

        flashy()->success( 'Slider was created successfully.' );

        return redirect( 'admin/add-slider' );

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
        $title = "Edit Slider";

        $slider = Slider::find( $id );

        $slides = $slider->slides;

        return view( 'admin.sliders.edit',
            array(
                'title' => $title,
                'slider' => $slider,
                'slides' => $slides
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
    public function update( Request $request )
    {
        $slider = Slider::find( $request->input( 'id' ) );

        $slider->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $slider->new = !empty( $request->input( 'new' ) ) ? 1 : 2;

        $slider->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $slider->slug = !empty( $request->input( 'name' ) ) ? str_slug( $request->input('name') ) : '';

        $slider->description = !empty( $request->input( 'description' ) ) ? $request->input( 'description' ) : '';

        $slider->trailerLink = $this->getTrailerLink( $request->input( 'trailerLink' ) );

        $slider->year = !empty( $request->input( 'year' ) ) ? $request->input( 'year' ) : '';

        $status = true;

        flashy()->success( 'Sliders was updated successfully.' );

  			return redirect( 'admin/sliders' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        $slider->delete();

        flashy()->success( 'Slider was deleted successfully.' );

        return redirect( 'admin/sliders' );
    }
}
