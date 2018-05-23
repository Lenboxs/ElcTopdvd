<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $setting = Setting::all();
      $title = 'Manage Settings';
      return view('admin.settings.settings')->withSettings($setting)->withTitle($title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $title = "Add New Setting";
      return view( 'admin.settings.add' )->withTitle( $title );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $setting = new Setting();

      $setting->heading = !empty($request->input('heading')) ? $request->input('heading') : '';
      $setting->logo = !empty($request->input('logo')) ? $request->input('logo') : '';

      $setting->save();

      return redirect('admin/add-setting');
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
    public function edit($id)
    {
      $title = "Edit Setting";
      $setting = Setting::find( $id );
      return view( 'admin.settings.edit' )->withTitle( $title )->withSetting( $setting );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $setting = Setting::find($request->input('id'));

      $setting->heading = !empty($request->input('heading')) ? $request->input('heading') : '';
      $setting->logo = !empty($request->input('logo')) ? $request->input('logo') : '';

      $setting->save();

      return redirect('admin/settings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $setting = Setting::find($id);

      $setting->delete();

      return redirect('admin/settings');
    }
}
