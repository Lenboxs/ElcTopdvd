<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConsoleFormRequest;

use App\Settings;
use App\SocialMedia;
use App\Branch;
use App\Console;
use App\Type;
use App\Genre;
use App\AgeRestriction;
use App\Recaptcha;

class ConsoleController extends Controller
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
       $console = Console::all();

       $title = 'Manage Consoles';

       return view( 'admin.consoles.consoles' )->withConsole( $console )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Console";

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        $branches = Branch::all();

        $genres = Genre::all();

        $consoles = Console::all();

        $types = Type::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.pages.settings',
            array(
                'title' => $title,
                'settings' => $settings,
                'socialmedia' => $social_media,
                'recaptcha' => $recaptcha,
                'branches' => $branches,
                'genres' => $genres,
                'consoles' => $consoles,
                '$types' => $types,
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
    public function store( ConsoleFormRequest $request )
    {
        $console = new Console();

        $console->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $console->name = !empty($request->input('name')) ? $request->input('name') : '';

        $console->logo = $this->upload( 'logo', $request, $uploadService );

        $console->save();

        flashy()->success( 'Console was created successfully.' );

        return redirect( 'admin/settings#consoles' );
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
        $title = "Edit Console";

        $console = Console::find( $id );

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $agerestrictions = AgeRestriction::all();

        return view( 'admin.pages.settings',
          array(
              'title' => $title,
              'settings' => $settings,
              'socialmedia' => $social_media,
              'recaptcha' => $recaptcha,
              'branches' => $branches,
              'genres' => $genres,
              'console' => $console,
              'types' => $types,
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
    public function update( ConsoleFormRequest $request )
    {
        $console = Console::find($request->input('id'));

        $console->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $console->name = !empty($request->input('name')) ? $request->input('name') : '';

        if( $request->input( 'remove_logo' ) == 'true' )
  		  {
  			     $console->logo = '';
  		  }
        elseif( !empty( $request->file( 'logo' ) ) )
  		  {
  			     $console->logo = $this->upload( 'logo', $request, $uploadService );
  	  	}

        $console->save();

        flashy()->success( 'Console was updated successfully.' );

        return redirect( 'admin/settings#consoles' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        $console = Console::find( $id );

        $console->delete();

        flashy()->success( 'Console was deleted successfully.' );

        return redirect( 'admin/settings#consoles' );
    }

    public function upload( $input, $request, $uploadService )
    {
    		if( !empty( $request->file( $input ) ) )
    		{
      			if( $uploadService->setRequest( $request )->setFilename( $input )->setUploadDirectory( 'img/movies' )->move() )
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
