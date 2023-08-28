<?php

namespace App\Http\Controllers\Frontend\guard;

use Illuminate\Http\Request;
use App\Models\PortfolioImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($image = $request->file("image")) {
            foreach ($request->file('image') as $image) {
                $userTag = new PortfolioImage();
                $userTag->user_id = auth()->user()->id;
                    $imageName = $image->getClientOriginalName();
                    $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                    $userTag->image = $imageName;
                    $userTag->save();
                }
            }

        $notification = array('message' => 'Portfolio Images Added Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $portfolioImage = PortfolioImage::findOrFail($id);
        Storage::delete($portfolioImage->image);
        $portfolioImage->delete();
        $notification = array('message' => 'Portfolio Images deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
