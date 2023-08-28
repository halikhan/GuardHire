<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();

        return view('languages.index',get_defined_vars());
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255|unique:languages',
            // 'code' => 'required|max:10|unique:languages,code,'.$language->id,
        ]);


        $language = new Language;
        $language->name = $request->name;
        // $language->code = $request->code;

        $language->save();

        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('languages.index')->with($notification);
    }

    // public function show(Language $language)
    // {
    //     return view('languages.index',get_defined_vars());
    // }

    public function edit($id)
    {
        $edit_language = Language::find($id);

        return view('languages.edit',get_defined_vars());
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required|max:255|unique:languages,name,'.$id,
            // 'code' => 'required|max:10|unique:languages,code,'.$language->id,
        ]);

        $language = Language::findOrFail($id);
        $language->name = $request->name;
        // $language->code = $request->code;
        $language->save();
        $notification = array('message' =>'Your data updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('languages.index')->with($notification);
    }

    public function destroy($id)
    {

        $language = Language::findOrFail($id);
        $language->delete();
        return redirect()->route('languages.index');

    }
}
