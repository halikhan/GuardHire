<?php

namespace App\Http\Controllers;

use App\Models\GuardType;
use Illuminate\Http\Request;

class GuardTypeController extends Controller
{
    public function index()
    {
        $getGuardType = GuardType::all();
        return view('guardtype.index', compact('getGuardType'));
    }

    public function create()
    {
        return view('guardtype.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:guard_types|max:255'
        ]);

        $GuardType = GuardType::create($validated);

        return redirect()->route('guard.type')
            ->with('success', 'GuardType created successfully.');
    }

    public function edit($id)
    {
        $GuardType = GuardType::find($id);
        return view('guardtype.edit', compact('GuardType'));
    }

    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required|unique:guard_types|max:255'
        ]);
        $GuardTypeName = GuardType::findOrFail($id);
        $GuardTypeName->name = $request->name;
        $GuardTypeName->save();

            $notification = array('message' =>'GuardType updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('guard.type')->with($notification);
    }


    public function destroy($id)
    {
        // dd($id);
        GuardType::find($id)->delete();
        return redirect()->route('guard.type');

    }
}
