<?php

namespace App\Http\Controllers;

use App\Models\cms;
use App\Models\Sociallink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $getCMS = Sociallink::all();
        return view('sociallinks.index',get_defined_vars());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sociallinks.create');
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
            'type' => "required|max:255",
            'social_media' => "required|max:255",
        ]);

        $cms = new Sociallink();
        $cms->type = $request->type;
        $cms->social_media = $request->social_media;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('social')->with($notification);
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
        $edit_data = Sociallink::where('slug',$slug)->first();
        return view('sociallinks.edit',get_defined_vars());

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
            'type' => "required|max:255",
            'social_media' => "required|max:255",
        ]);

        $cms = Sociallink::findOrFail($id);
        $cms->type = $request->type;
        $cms->social_media = $request->social_media;
        if($request->type == '1'){
            $cms->slug = Str::slug('facebook');
        }if($request->type == '2'){
            $cms->slug = Str::slug('instagram');
        }if($request->type == '3'){
            $cms->slug = Str::slug('twitter');
        }if($request->type == '4'){
            $cms->slug = Str::slug('youtube');
        }
        $cms->save();
        $notification = array('message' =>'Your data updateed Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('social')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sociallink::find($id)->delete();
        return redirect()->route('social');

    }

}
