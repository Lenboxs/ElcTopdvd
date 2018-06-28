<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\AgeRestrictionFormRequest;

use App\Settings;
use App\SocialMedia;
use App\Branch;
use App\Type;
use App\Console;
use App\Genre;
use App\AgeRestriction;
use App\Recaptcha;

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
       $title = 'Manage Age Restriction';

       $agerestrictions = AgeRestriction::all();

       return view( 'admin.agerestrictions.agerestrictions' )->withAgerestrictions( $agerestrictions )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Age Restriction";

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
    public function store(AgeRestrictionFormRequest $request)
    {
        $agerestriction = new AgeRestriction();

        $agerestriction->active= !empty( $request->input( 'active' ) ) ? 1 : 2;

        $agerestriction->name = !empty($request->input('name')) ? $request->input('name') : '';

        $agerestriction->save();

        flashy()->success( 'Age Restriction was created successfully.' );

        return redirect( 'admin/settings#age-restrictions' );
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

      $settings = Settings::orderBy( 'id', 'desc' )->first();

      $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

      $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

      $branches = Branch::all();

      $genres = Genre::all();

      $types = Type::all();

      $consoles = Console::all();

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
            'agerestriction' => $agerestriction,
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
    public function update( AgeRestrictionFormRequest $request )
    {
        $agerestriction = AgeRestriction::find( $request->input( 'id' ) );

        $agerestriction->active = !empty( $request->input( 'active' ) ) ? 1 : 2;

        $agerestriction->name = !empty($request->input('name')) ? $request->input('name') : '';

        $agerestriction->save();

        flashy()->success( 'Age Restriction was updated successfully.' );

        return redirect( 'admin/settings#age-restrictions' );
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

        flashy()->success( 'Age Restriction was deleted successfully.' );

        return redirect( 'admin/settings#age-restrictions' );
    }
}
