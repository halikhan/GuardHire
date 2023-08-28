<?php

namespace App\Http\Controllers;


use App\Models\packages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PackageManagementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getCMS = packages::all();
        return view('Package.index',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Package.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'deatails' => "required|max:255",
            'amount' => "required|max:255",
            'type' => "required|max:255",
            'title' => "required|unique:packages",
        ]);

        $cms = new packages();
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->amount = $request->amount;
        $cms->type = $request->type;
        $cms->deatails = $request->deatails;
        $cms->mid_details = $request->mid_details;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Package')->with($notification);

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
        $edit_data = packages::where('slug',$slug)->first();
        return view('Package.edit',get_defined_vars());
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
        $this->validate($request, [
            'deatails' => "required|max:255",
            'mid_details' => "required",
            'type' => "required|max:255",
            'amount' => "required|max:255",
            'title' => "required|max:255",
        ]);

        $cms = packages::findOrFail($id);
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->amount = $request->amount;
        $cms->type = $request->type;
        $cms->deatails = $request->deatails;
        $cms->mid_details = $request->mid_details;
        $cms->save();

        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Package')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($slug)
    {
        // dd($id);
        $cms = packages::where('slug',$slug)->first();
        $cms->delete();
        return redirect()->route('Package');
    }


}
