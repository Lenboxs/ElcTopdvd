<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topten;

class TopTenController extends Controller
{

    public function index()
    {
      $topten = Topten::all();
      $title = 'Manage Top Ten';
      return view('admin.toptens.toptens')->withTopten($topten)->withTitle($title);
    }

    public function create()
    {
      $title = "Add New Top Ten";
      return view( 'admin.toptens.add' )->withTitle( $title );
    }

    public function store(Request $request)
    {
      $topten = new Topten();

      $topten->heading = !empty($request->input('heading')) ? $request->input('heading') : '';

      $topten->save();

      return redirect('admin/add-topten');
    }

    public function show($id)
    {
    }


    public function edit($id)
      {
        $title = "Edit Top ten";
        $topten = Topten::find( $id );
        return view( 'admin.toptens.edit' )->withTitle( $title )->withTopten( $topten );
      }


    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
