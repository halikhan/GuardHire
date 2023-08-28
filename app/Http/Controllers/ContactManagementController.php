<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Models\ContactManagement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = ContactManagement::all();
        return view('contact-management.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('contact-management.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'title' => "required|max:255",
            'phone_number' => "required|max:255",
            'email' => "required",
            'location' => "required",
            'description' => "required",
        ]);

        $cms = new ContactManagement();
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->phone_number = $request->phone_number;
        $cms->email = $request->email;
        $cms->location = $request->location;
        $cms->description = $request->description;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('contact')->with($notification);
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
         $edit_data = ContactManagement::where('slug',$slug)->first();
         return view('contact-management.edit',get_defined_vars());
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
        // return $request->all();
        $this->validate($request, [
            'description' => "required",
            'location' => "required",
            'email' => "required",
            'phone_number' => "required|max:255",
            'title' => "required|max:255",
        ]);
        $cms = ContactManagement::findOrFail($id);
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->phone_number = $request->phone_number;
        $cms->email = $request->email;
        $cms->location = $request->location;
        $cms->description = $request->description;
        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('contact')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cms = ContactManagement::find($id);
        $cms->delete();
        return redirect()->route('contact');
    }


}
