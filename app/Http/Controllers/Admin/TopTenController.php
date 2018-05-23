<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TopTenPage;

class TopTenController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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

        return view( 'admin.toptens.edit' )->withTitle( $title )->withTopten( $topten );
      }


    public function update(Request $request)
    {
       //
    }

    public function destroy($id)
    {
        //
    }
}
