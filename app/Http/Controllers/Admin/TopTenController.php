<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TopTenPage;
use App\Movie;

use App\Http\Requests\Admin\TopTenFormRequest;

class TopTenController extends Controller
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

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(TopTenFormRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit()
    {
        $title = "Edit Top Ten";

        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

        return view( 'admin.pages.top-ten' )->withTitle( $title )->withTopten( $topten );
    }


    public function update(TopTenFormRequest $request)
    {
        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

		    $topten->heading = !empty( $request->input( 'heading' ) ) ? $request->input( 'heading' ) : '';

		    $topten->save();

        flashy()->success( 'Top Ten was updated successfully.' );

        return redirect( 'admin/top-ten' );
    }

    public function destroy($id)
    {
        //
    }

    public function move( $id )
    {
        $movie = Movie::find( $id );

        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

        $topten->movies()->syncWithoutDetaching( [ $movie->id => ['sort' => 0] ] );

        return redirect( 'admin/movies' );
    }

    public function remove( $id )
    {
        $movie = Movie::find( $id );

        $topten = TopTenPage::orderBy( 'id', 'desc' )->first();

        $topten->movies()->detach( [ $movie->id ] );

        return redirect( 'admin/top-ten' );
    }

    public function sort( Request $request )
    {
        if( !empty( $request->input( 'entityName' ) ) )
        {
            switch( $request->input( 'entityName' ) )
            {
                case "Section" :
                    $entity = !empty( $request->input( 'id' ) ) ? Section::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? Section::find( $request->input( 'positionEntityId' ) ) : "";
                break;

                case "Category" :
                    $entity = !empty( $request->input( 'id' ) ) ? Category::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? Category::find( $request->input( 'positionEntityId' ) ) : "";
                break;

                case "SubCategory" :
                    $entity = !empty( $request->input( 'id' ) ) ? SubCategory::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? SubCategory::find( $request->input( 'positionEntityId' ) ) : "";
                break;

                case "Stamp" :
                    $entity = !empty( $request->input( 'id' ) ) ? Stamp::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? Stamp::find( $request->input( 'positionEntityId' ) ) : "";
                break;

                case "Table" :
                    $entity = !empty( $request->input( 'id' ) ) ? Table::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? Table::find( $request->input( 'positionEntityId' ) ) : "";
                break;

                case "Menu" :
                    $entity = !empty( $request->input( 'id' ) ) ? Menu::find( $request->input( 'id' ) ) : "";
                    $positionEntity = !empty( $request->input( 'positionEntityId' ) ) ? Menu::find( $request->input( 'positionEntityId' ) ) : "";
                break;
            }

            if( !empty( $request->input( 'type' ) ) && !empty( $entity ) && !empty( $positionEntity ) )
            {
                if( $request->input( 'type' ) == "moveAfter" )
                {
                    $entity->moveAfter( $positionEntity );
                }
                else
                {
                    $entity->moveBefore( $positionEntity );
                }
            }
        }
    }
}
