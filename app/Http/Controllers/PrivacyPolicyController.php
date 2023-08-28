<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrivacyPolicyController extends Controller
{
    public function privacy_Index(){

        $getCMS = PrivacyPolicy::all();
        return view('privacy-policy.index',get_defined_vars());

    }
    public function privacy_create(){
        return view('privacy-policy.create');

    }
    public function privacy_add(Request $request){

        $this->validate($request, [
            'title' => "required|max:255",
            'description' => "required",
        ]);

        $cms = new PrivacyPolicy();
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->description = $request->description;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('logo')->with($notification);
    }
    public function privacy_edit($slug){

        $edit_data = PrivacyPolicy::where('slug',$slug)->first();
        return view('privacy-policy.edit',get_defined_vars());

    }

    public function privacy_update(Request $request, $id){
        $this->validate($request, [
            'title' => "required|max:255",
             'description' => "required"
        ]);

            $cms = PrivacyPolicy::findOrFail($id);
            $cms->title = $request->title;
            $cms->slug = Str::slug($request->title,'-');
            $cms->description = $request->description;
            $cms->save();
            $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('privacy')->with($notification);
    }

    public function privacy_destroy($id)
    {
        $cms = PrivacyPolicy::find($id);
        $cms->delete();
        $notification = array('message' =>'Your data has been Deleted' , 'alert-type'=>'error' );
        return redirect()->route('privacy');

    }


}
