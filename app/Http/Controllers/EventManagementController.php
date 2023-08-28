<?php

namespace App\Http\Controllers;

use App\Models\EventManagement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = EventManagement::all();
        return view('event.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('event.create');

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
            'description' => "required",
            'location' => "required",
            'event_time' => "required",
            'event_date' => "required|max:255",
            'title' => "required|max:255",
        ]);

        $cms = new EventManagement();
        $cms->title = $request->title;
        $random = Str::random(4);
        $cms->slug = Str::slug($request->title.'-'.$random);
        $cms->event_date = $request->event_date;
        $cms->event_time = $request->event_time;
        $cms->location = $request->location;
        $cms->description = $request->description;
        if($image = $request->file("image")) {
            $imageName = $image->getClientOriginalName();
            // $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('event')->with($notification);
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
         $edit_data = EventManagement::where('slug',$slug)->first();
         return view('event.edit',get_defined_vars());
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
            'event_time' => "required",
            'event_date' => "required|max:255",
            'title' => "required|max:255",
        ]);
        $cms = EventManagement::findOrFail($id);
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->event_date = $request->event_date;
        $cms->event_time = $request->event_time;
        $cms->location = $request->location;
        $cms->description = $request->description;
        if($image = $request->file("image")) {
            $imageName = $image->getClientOriginalName();
            // $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('event')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cms = EventManagement::where('slug',$slug)->first();
        $cms->delete();
        return redirect()->route('event');
    }


}
