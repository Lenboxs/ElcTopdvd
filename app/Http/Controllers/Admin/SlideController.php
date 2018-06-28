<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;

use App\Slide;
use App\Slider;
use App\HomePage;

class SlideController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request, UploadService $uploadService )
    {
        $slider = Slider::find( $request->input( 'slider_id' ) );

        $slide = new Slide();

        $slide->active= !empty($request->input('active')) ? 1 : 2;

        $slide->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        $slide->image = $this->upload( 'image', $request, $uploadService );

        $slide->slider_id = $slider->id;

        $slide->link = !empty( $request->input( 'link' ) ) ? str_slug( $request->input('link') ) : '';

        $slide->save();

        flashy()->success( 'Slide was uploaded successfully.' );

        return redirect( 'admin/edit-slider/' . $slider->id );
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
        $title = "Edit Slide";

        $slide = Slide::find( $id );

        $slider = Slider::find( $slide->slider_id );

        return view( 'admin.slides.edit',
            array(
                'title' => $title,
                'slide' => $slide,
                'slider' => $slider
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
    public function update( Request $request, UploadService $uploadService )
    {
        $slider = Slider::find( $request->input( 'slider_id' ) );

        $slide = Slide::find( $request->input( 'id' ) );

        $slide->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $slide->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        if( $request->input( 'remove_image' ) == 'true' )
  		  {
  			     $slide->image = '';
  		  }
        elseif( !empty( $request->file( 'image' ) ) )
  		  {
  			     $slide->image = $this->upload( 'image', $request, $uploadService );
  	  	}

        $slide->slider_id = $slider->id;

        $slide->link = !empty( $request->input( 'link' ) ) ? str_slug( $request->input('link') ) : '';

        $slide->save();

        flashy()->success( 'Slides was updated successfully.' );

  			return redirect( 'admin/edit-slider/' . $slider->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $slide = Slide::find( $id );

        $slider = Slider::find( $slide->slider_id );

        $slide->delete();

        flashy()->success( 'Slide was deleted successfully.' );

        return redirect( 'admin/edit-slider/' . $slider->id );
    }

    public function upload( $input, $request, $uploadService )
    {
    		if( !empty( $request->file( $input ) ) )
    		{
      			if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/slides' )->move() )
      			{
      				return $uploadService->getTargetFile();
      			}

      			$this->status = $this->status && $uploadService->successful();
    		}
    		elseif( $request->input( 'remove_' . $input ) == 'true' )
    		{
    			   return '';
    		}
    }
}
