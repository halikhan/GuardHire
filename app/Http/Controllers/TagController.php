<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags|max:255'
        ]);

        $tag = Tag::create($validated);

        return redirect()->route('tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required|unique:tags|max:255'
        ]);
        $TagName = Tag::findOrFail($id);
        $TagName->name = $request->name;
        $TagName->save();

            $notification = array('message' =>'Tag updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('tags.index')->with($notification);
    }


    public function destroy($id)
    {
        // dd($id);
        Tag::find($id)->delete();
        return redirect()->route('tags.index');

    }
}
