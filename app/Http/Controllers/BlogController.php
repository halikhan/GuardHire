<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('here');
        $getCMS = Blog::all();
        return view('blogs.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        return view('blogs.create');

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
        $this->validate($request, [
            'content' => "required",
            // 'image' => "required",
            'title' => "required|unique:blogs",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
            // 'bride' => "required",
        ]);
        // dd($request->all());

        $cms = new Blog();
        $cms->groom = $request->title;
        // $cms->bride = $request->bride;
        $cms->slug = Str::slug($request['title']);
        $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('blogs')->with($notification);
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
         $edit_data = Blog::where('slug',$slug)->first();
         return view('blogs.edit',get_defined_vars());
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
            'content' => "required",
            // 'bride' => "required|max:255",
            'title' => "required|max:255",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
        ]);
        $cms = Blog::findOrFail($id);
        $cms->groom = $request->title;
        $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }

        $cms->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('blogs')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cms = Blog::where('slug',$slug)->first();
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        return redirect()->route('blogs');
    }


}
