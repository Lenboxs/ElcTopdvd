<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BranchFormRequest;

use App\Settings;
use App\SocialMedia;
use App\Branch;
use App\Type;
use App\Genre;
use App\AgeRestriction;
use App\Recaptcha;

class BranchController extends Controller
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
       $branches = Branch::all();

       $title = 'Manage Branches';

       return view( 'admin.branches.branches' )->withBranches( $branches )->withTitle( $title );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Branch";

        $settings = Settings::orderBy( 'id', 'desc' )->first();

        $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

        $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

        $branches = Branch::all();

        $genres = Genre::all();

        $types = Type::all();

        $agerestrcitions = AgeRestriction::all();

        return view( 'admin.pages.settings',
          array(
              'title' => $title,
              'settings' => $settings,
              'socialmedia' => $social_media,
              'branches' => $branches,
              'genres' => $genres,
              'types' => $types,
              'agerestrcitions' => $agerestrcitions,
          )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchFormRequest $request)
    {
      $branch = new Branch();

      $branch->name = !empty($request->input('name')) ? $request->input('name') : '';
      $branch->email = !empty($request->input('email')) ? $request->input('email') : '';
      $branch->contact_number = !empty($request->input('contact_number')) ? $request->input('contact_number') : '';
      $branch->address = !empty($request->input('address')) ? $request->input('address') : '';

      $branch->save();

      return redirect( 'admin/settings#branches' );
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
      $title = "Edit Branch";

      $branch = Branch::find( $id );

      $settings = Settings::orderBy( 'id', 'desc' )->first();

      $social_media = SocialMedia::orderBy( 'id', 'desc' )->first();

      $recaptcha = Recaptcha::orderBy( 'id', 'desc' )->first();

      $genres = Genre::all();

      $types = Type::all();

      $agerestrcitions = AgeRestriction::all();

      return view( 'admin.pages.settings',
        array(
            'title' => $title,
            'settings' => $settings,
            'socialmedia' => $social_media,
            'branch' => $branch,
            'genres' => $genres,
            'types' => $types,
            'agerestrcitions' => $agerestrcitions,
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
    public function update(BranchFormRequest $request)
    {
        $branch = Branch::find($request->input('id'));

        $branch->name = !empty($request->input('name')) ? $request->input('name') : '';
        $branch->email = !empty($request->input('email')) ? $request->input('email') : '';
        $branch->contact_number = !empty($request->input('contact_number')) ? $request->input('contact_number') : '';
        $branch->address = !empty($request->input('address')) ? $request->input('address') : '';

        $branch->save();

        return redirect( 'admin/settings#branches' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);

        $branch->delete();

        return redirect( 'admin/settings#branches' );
    }

    public function manage()
    {
        $title = "Manage Branch Movies";

        $branches = Branch::all();

        return view( 'admin.branches.manage' )->withTitle( $title )->withBranches( $branches );
    }
}
