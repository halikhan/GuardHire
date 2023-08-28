<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TermsConditionController extends Controller
{
    public function terms_Index(){

        $getCMS = TermsCondition::all();
        return view('terms-conditions.index',get_defined_vars());

    }
    public function terms_create(){
        return view('terms-conditions.create');

    }
    public function terms_add(Request $request){

        $this->validate($request, [
            'title' => "required|max:255",
            'description' => "required",
        ]);

        $cms = new TermsCondition();
        $cms->title = $request->title;
        $cms->slug = Str::slug($request->title,'-');
        $cms->description = $request->description;
        $cms->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('terms')->with($notification);
    }
    public function terms_Edit($slug){

        $edit_data = TermsCondition::where('slug',$slug)->first();
        return view('terms-conditions.edit',get_defined_vars());

    }

    public function terms_update(Request $request, $id){
        $this->validate($request, [
            'title' => "required|max:255",
             'description' => "required"
        ]);

            $cms = TermsCondition::findOrFail($id);
            $cms->title = $request->title;
            $cms->slug = Str::slug($request->title,'-');
            $cms->description = $request->description;
            $cms->save();
            $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
            return redirect()->route('terms')->with($notification);
    }

    public function terms_destroy($id)
    {
        $cms = TermsCondition::find($id);
        $cms->delete();
        $notification = array('message' =>'Your data has been Deleted' , 'alert-type'=>'error' );
        return redirect()->route('terms');

    }


}
