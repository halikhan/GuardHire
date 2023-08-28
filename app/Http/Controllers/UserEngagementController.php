<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\wedding;
use App\Models\BookVendor;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserEngagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // dd('here');
         $getEngagementetails = wedding::where('user_id',Auth::user()->id)->where('ceremony',2)->get();
         return view('user-dashboard.userEngagement.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getServiceNames = service::all();
        return view('user-dashboard.userEngagement.create',get_defined_vars());
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
            'content' => "required",
            'vendor' => "required|max:255",
            'service' => "required|max:255",
            'date' => "required",
            'location' => "required",
            'bride' => "required|max:255",
            'groom' => "required",
            'groom_last_name' => "required",
            'bride_last_name' => "required",
            'engagement_image' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
        ]);
        $images = [];
        if($request->hasfile('engagement_image'))
         {
            foreach($request->file('engagement_image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('storage/uploads/cms/'), $name);
                $images[] = $name;
            }
        }
        if(is_array($images) && count($images) > 5)
        {
            $notification = array('message' =>'Please select only 5 images' , 'alert-type'=>'error' );
            return redirect()->back()->with($notification);
        }
        $cms = new wedding();
        $cms->user_id = Auth::user()->id;
        $random = Str::random(4);
        $cms->slug = Str::slug($request->groom.'-'.$random);
        $cms->groom = $request->groom;
        $cms->groom_last_name = $request->groom_last_name;
        $cms->bride = $request->bride;
        $cms->bride_last_name = $request->bride_last_name;
        $cms->ceremony = 2;
        // $cms->ceremony = $request->ceremony;
        $cms->service = json_encode($request->service);
        $cms->vendor = json_encode($request->vendor);
        $cms->location = $request->location;
        $cms->date = $request->date;
        $cms->content = $request->content;
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();
        $countForAmount = 0;
        foreach ($request->vendor as $item) {
            $savevednor = new BookVendor();
            $savevednor->user_id = Auth::user()->id;
            $savevednor->wedding_id = $cms->id;
            $savevednor->vendor_id = $item;
            $savevednor->service =isset($request->service[$countForAmount]);
            $countForAmount++;
            $savevednor->save();
        }


        $file= new ImageGallery();
        $file->wedding_id =  $cms->id;
        $file->user_id = Auth::user()->id;
        $file->ceremony = 2;
        $file->image = json_encode($images);
        $file->save();
        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('user-engagement')->with($notification);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //  $edit_data = wedding::find($id);
         $edit_data = wedding::where('slug',$slug)->first();
         $getUserWeddingimages = ImageGallery::where('wedding_id',$edit_data->id)->first();
          return view('user-dashboard.userEngagement.show',get_defined_vars());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         //  dd($id);
         $edit_data = wedding::where('slug',$slug)->first();
         $getUserWeddingimages = ImageGallery::where('wedding_id',$edit_data->id)->first();
         $getServiceNames = service::all();
         $getvendorslist = User::where('type',2)->get();
         return view('user-dashboard.userEngagement.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $wedding_data = wedding::where('slug',$slug)->first();
        $fileofimages =  ImageGallery::where('wedding_id',$wedding_data->id)->first();

        $oldweddingimageslist = json_decode($fileofimages->image);
        $this->validate($request, [

            'content' => "required",
            'vendor' => "required|max:255",
            'service' => "required|max:255",
            'date' => "required",
            'location' => "required",
            'bride' => "required|max:255",
            'groom_last_name' => "required",
            'bride_last_name' => "required",
            'groom' => "required",
            // 'ceremony' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",


        ]);

        $images = [];
        if($request->hasfile('engagement_image'))
         {
            foreach($request->file('engagement_image') as $file)
            {
                $images[] = $file;
            }
        }
          // dd(count($oldweddingimageslist));
        $totalimages = count($oldweddingimageslist) + count($images);
        // dd($totalimages);
        if($totalimages > 5)
        {
            // dd('here');
            $notification = array('message' =>'You can upload only 5 images' , 'alert-type'=>'error' );
            return redirect()->back()->with($notification);
        }
        $cms = wedding::where('slug',$slug)->first();
        $cms->user_id = Auth::user()->id;
        $cms->groom = $request->groom;
        $cms->groom_last_name = $request->groom_last_name;
        $cms->bride = $request->bride;
        $cms->bride_last_name = $request->bride_last_name;
        $cms->ceremony = 2;
        $cms->service = json_encode($request->service);
        $cms->vendor = json_encode($request->vendor);
        $cms->location = $request->location;
        $cms->date = $request->date;
        $cms->content = $request->content;
        if(empty($request->file('image'))){
            $cms->image = $request->banner_image;

        }
        if($image = $request->file("image")) {
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();


         $countForAmount = 0;
         foreach ($request->vendor as $item) {
             $savevednor =  BookVendor::where('wedding_id',$cms->id)->first();
             $savevednor->user_id = Auth::user()->id;
             $savevednor->wedding_id = $cms->id;
             $savevednor->vendor_id = $item;
             $savevednor->service =isset($request->service[$countForAmount]);
             $countForAmount++;
             $savevednor->save();
         }

         $file=  ImageGallery::where('wedding_id',$cms->id)->first();
         $file->wedding_id =  $cms->id;
         $file->user_id = Auth::user()->id;
         $file->ceremony = 2;
          $data = json_decode($file->image);

         if(empty($request->file('engagement_image'))){
             // dd(json_decode($request->old_wedding_image));
             $file->image = $request->old_engagement_image;
         }
         else {
             // return $data;
             // $data = [];
             foreach($request->file('engagement_image') as $image)
             {
                 $name=$image->getClientOriginalName();
                 $image->move(public_path('storage/uploads/cms/'), $name);
                 $data[] = $name;
             }
             $file->image = json_encode($data);
         }
         $file->save();
        // $file=  ImageGallery::where('wedding_id',$cms->id)->first();
        // $file->wedding_id =  $cms->id;
        // $file->user_id = Auth::user()->id;
        // $file->ceremony = 2;
        // $file->image = json_encode($images);
        // if($request->hasFile('engagement_image') == null){
        //     $file->image = $request->old_engagement_image;
        // }
        // $file->save();
        $notification = array('message' =>'Your data Updated Successfully' , 'alert-type'=>'success' );
        return redirect()->route('user-engagement')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // dd($id);
        $cms = wedding::where('slug',$slug)->first();
        $cms->delete();
        $file= ImageGallery::where('wedding_id',$cms->id)->first();
        foreach(json_decode($file->image) as $image){
            Storage::delete('public/uploads/cms/'.$image);
        }
        $file->delete();
        return back();

    }

    public function deleteengagementimg(Request $request){
        $image = $request->img;
        $del = ImageGallery::find($request->wedding_id);
        $images = json_decode($del->image);

        $newArr = array_filter($images, function($val) use($image) {

            return $val !== $image;

        });
        // dd(gettype($newArr));
        $array = [];
        foreach($newArr as $item){
            array_push($array, $item);
        }
        // return $array;
        $del->image = $array;
        $del->save();


        if($del ){
            return response()->json([
            'status' => 200,
            'msg' => 'Image Deleted Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'msg' => 'Something went wrong',
                ]);
        }

    }


}
