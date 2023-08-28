<?php

namespace App\Http\Controllers;

use App\Models\Subcription;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class SubcriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Subcription::where('email','!=',null)->get();
        return view('Subcription.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('Subcription.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        session()->put('email', $request->email);
        $this->validate($request, [
            'email' => "required|email|unique:Subcriptions",
        ]);

        $cms = new Subcription();
        $cms->email = $request->email;
        $cms->slug = Str::slug($request->email,'-');
        $cms->save();
        $token = sha1(uniqid(time(), true));
        $emailToSend = $request->email;
        $headers[] = 'To: southdakota <noreply@southdakota.com>';
        Mail::send('Mail.subscription_mail', ['data' => route('Subcription', ['token' => $token])], function ($messages) use ($emailToSend,$headers) {
            $messages->to($emailToSend,implode("\r\n", $headers));
            $messages->subject('Subscription');
            // implode("\r\n", $headers);
        });
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Subcription')->with($notification);

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
        // dd($id);
        $edit_data = Subcription::find($id);
        return view('Subcription.edit',get_defined_vars());
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
            'email' => "required|max:255",
        ]);
        $cms = Subcription::findOrFail($id);
        $cms->email = $request->email;
        $cms->slug = Str::slug($request->email,'-');
        $cms->save();
        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('Subcription')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $subscribe = Subcription::find($id);
        $subscribe->delete();
        return redirect()->route('Subcription');

    }


}
