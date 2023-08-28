<?php

namespace App\Http\Controllers;

use App\Models\LogoManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LogoManagerController extends Controller
{
    public function logo_Index(){

        // dd('hee');
        $getCMS = LogoManager::all();
        return view('logomanager.index',get_defined_vars());

    }
    public function logo_create(){

        // dd('here');
        return view('logomanager.create');

    }
    public function logo_add(Request $request){

        // dd('here');
        // dd($request->all());
        $this->validate($request, [
            'title' => "required|max:255",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

        ]);

        $cms = new LogoManager();
        $cms->title = $request->title;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();

            $image->move(public_path('storage/uploads/logo/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('logo')->with($notification);
    }
    public function logo_edit($slug){

        // dd($id);
        $edit_data = LogoManager::where('slug',$slug)->first();
        return view('logomanager.edit',get_defined_vars());

    }

    public function logo_update(Request $request, $id){

        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|max:255',
            'image' => 'file|mimes:jpg,jpeg,png,gif|max:1024'
        ]);

            $cms = LogoManager::findOrFail($id);
            $cms->title = $request->title;
            $cms->slug = Str::slug($request->title,'-');
            // $cms->content = $request->content;
            if(!$request->file("image")){
                // dd('old image here');
                // $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
                $cms->image = $request->old_image;
                // dd($cms->profile_image_path);
            }else{
                // dd('image here');
                if($image = $request->file("image")) {
                    $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
                    $image->move(public_path('storage/uploads/logo/'), $imageName);
                    $cms->image = $imageName;
                }
            }

            $cms->save();
            $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('logo')->with($notification);

    }

    public function logo_destroy($id)
    {
        // dd($id);
        $cms = LogoManager::find($id);
        Storage::delete('public/uploads/logo/'.$cms->image);
        $cms->delete();
        return redirect()->route('logo');

    }


}
