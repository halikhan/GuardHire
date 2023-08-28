<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Http\Request;

class InquiryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Inquiry::all();
        return view('inquiry.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('inquiry.create');
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
            'name' => "required|max:255",
            'message' => "required|max:255",
            'contact' => "required|max:255",
            'email' => "required|email|unique:users",
            'type' => "required",
        ]);

        $cms = new Inquiry();
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->type = $request->type;
        $cms->message = $request->message;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Inquiry')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Inquiry::where('id',$id)->first();
        return view('inquiry.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $edit_data = Inquiry::find($id);
        return view('inquiry.edit',get_defined_vars());


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
            'name' => "required|max:255",
            'message' => "required|max:255",
            'contact' => "required|max:255",
            'email' => "required|email",

        ]);

        $cms = Inquiry::findOrFail($id);
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->message = $request->message;
        $cms->type = $request->type;
        $cms->save();
        $notification = array('message' =>'Your data updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Inquiry')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Inquiry::where('id',$id)->first();
        $message->delete();
        return redirect()->route('Inquiry');
    }
}
