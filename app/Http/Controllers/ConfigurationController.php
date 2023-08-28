<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
USE Illuminate\Support\Str;
class ConfigurationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Config::all();
        // dd( $getCMS);
        return view('configration.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('configration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'configuration' => "required|max:255",
        ]);

        $cms = new Config();
        $cms->configuration = $request->configuration;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('congfigration')->with($notification);
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
    public function edit($slug)
    {
        // dd($id);
        $edit_data = Config::where('slug',$slug)->first();
        return view('configration.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'configuration' => "required|max:255",

        ]);

        $cms = Config::findOrFail($id);
        $cms->configuration = $request->configuration;
        $cms->slug =Str::slug(Str::limit($request->configuration, 10));
        $cms->save();
        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('congfigration')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Config::find($id)->delete();
        return redirect()->route('congfigration');
    }
}
