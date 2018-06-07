<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadService;
use App\Http\Requests\Admin\TypeFormRequest;

use App\Settings;
use App\SocialMedia;
use App\Branch;
use App\Type;
use App\Console;
use App\Genre;
use App\AgeRestriction;
use App\Recaptcha;

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

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $consoles = Console::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.pages.settings',
            array(
                'title' => $title,
                'settings' => $settings,
                'socialmedia' => $social_media,
                'recaptcha' => $recaptcha,
                'branches' => $branches,
                'genres' => $genres,
                'types' => $types,
                'consoles' => $consoles,
                'agerestrictions' => $agerestrictions,
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( TypeFormRequest $request, UploadService $uploadService )
    {
        $type = new Type();

        $type->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $type->name = !empty($request->input('name')) ? $request->input('name') : '';

        $type->logo = $this->upload( 'logo', $request, $uploadService );

        $type->save();

        flashy()->success( 'Type was created successfully.' );

        return redirect( 'admin/settings#types' );
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
        $title = "Edit Type";

        $type = Type::find( $id );

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        $branches = Branch::all();

        $genres = Genre::all();

        $consoles = Console::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.pages.settings',
          array(
              'title' => $title,
              'settings' => $settings,
              'socialmedia' => $social_media,
              'recaptcha' => $recaptcha,
              'branches' => $branches,
              'genres' => $genres,
              'type' => $type,
              'consoles' => $consoles,
              'agerestrictions' => $agerestrictions,
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
    public function update( TypeFormRequest $request, UploadService $uploadService )
    {
        $type = Type::find( $request->input( 'id' ) );

        $type->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $type->name = !empty( $request->input( 'name' ) ) ? $request->input( 'name' ) : '';

        if( $request->input( 'remove_logo' ) == 'true' )
  		  {
  			     $type->logo = '';
  		  }
        elseif( !empty( $request->file( 'logo' ) ) )
  		  {
  			     $type->logo = $this->upload( 'logo', $request, $uploadService );
  	  	}

        $type->save();

        flashy()->success( 'Type was updated successfully.' );

        return redirect( 'admin/settings#types' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $type = Type::find( $id );

        $type->delete();

        flashy()->success( 'Type was deleted successfully.' );

        return redirect( 'admin/settings#types' );
    }

    public function upload( $input, $request, $uploadService )
    {
    		if( !empty( $request->file( $input ) ) )
    		{
      			if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/types' )->move() )
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
