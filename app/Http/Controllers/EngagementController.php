<?php

namespace App\Http\Controllers;

use App\Models\wedding;
use App\Models\engagement;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\service;
use App\Models\BookVendor;

class EngagementController extends Controller
{

    public function index()
    {
        // dd('here');
        $getCMS = wedding::where('ceremony','2')->get();
        // return $getCMS;
        return view('engagement.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
           $users = User::where('type',3)->where('groom_first_name','!=' ,null)->get();

        // dd($users->groom_first_name);
        $getServiceNames = service::all();
        return view('engagement.create',get_defined_vars());

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
        // dd($request->all());
        $this->validate($request, [
            'content' => "required",
            'vendor' => "required|max:200",
            'service' => "required|max:200",
            'date' => "required|max:200",
            'location' => "required|max:200",
            'bride' => "required|max:200",
            'groom' => "required|max:200",
            'groom_last_name' => "required|max:200",
            'bride_last_name' => "required|max:200",
        ]);

        $cms = new wedding();
        $cms->user_id =$request->user_id;
        $random = Str::random(4);
        $cms->service = json_encode($request->service);
        $cms->vendor = json_encode($request->vendor);
        $cms->slug = Str::slug($request->groom.'-'.$random);
        $cms->groom = $request->groom;
        $cms->groom_last_name = $request->groom_last_name;
        $cms->bride = $request->bride;
        $cms->bride_last_name = $request->bride_last_name;
        $cms->ceremony = 2;
        $cms->location = $request->location;
        $cms->date = $request->date;
        $cms->content = $request->content;


        if($image = $request->file("image")) {
            $imageName = $image->getClientOriginalName();
            $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
            $image->move(public_path('storage/uploads/cms/'), $imageName);
            $cms->image = $imageName;
        }
        $cms->save();


        $images = [];
        if($request->hasfile('wedding_image'))
         {
            foreach($request->file('wedding_image') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('storage/uploads/cms/'), $name);
                $images[] = $name;
            }
        }
        if($request->vendor){

            foreach ($request->vendor as $item) {
                $savevednor = new BookVendor();
                $savevednor->user_id = $request->user_id;
                $savevednor->wedding_id = $cms->id;
                $savevednor->vendor_id = $item;
                // $savevednor->service =isset($request->service[$countForAmount]);
                // $countForAmount++;
                $savevednor->save();
            }
        }
        $file= new ImageGallery();
        $file->wedding_id =  $cms->id;
        $file->user_id = $request->user_id;
        $file->ceremony = 2;
        $file->image = json_encode($images);
        $file->save();


        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('admin_engagement')->with($notification);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $edit_data = wedding::where('slug',$slug)->first();
         $getUserWeddingimages = ImageGallery::where('wedding_id',$edit_data->id)->first();
         return view('engagement.show',get_defined_vars());
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
         $edit_data = wedding::where('slug',$slug)->first();
        //  return $edit_data;
         $getUserWeddingimages = ImageGallery::where('wedding_id', $edit_data->id)->first();
         $users = User::where('type',3)->where('groom_first_name','!=' ,null)->get();
         //  update work
         $getvendorslist = User::where('type',2)->get();

         $getServiceNames = service::all();
         return view('engagement.edit',get_defined_vars());
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
    //    dd($request->all());
            $wedding_data = wedding::where('slug',$slug)->first();
       //   return  $wedding_data->id;
           $fileofimages =  ImageGallery::where('wedding_id',$wedding_data->id)->first();
           // dd(json_decode($file->image));
           $oldweddingimageslist = json_decode($fileofimages->image);
               // dd($oldweddingimageslist);
           $this->validate($request, [
               'content' => "required",
               'date' => "required|max:255",
               'location' => "required|max:255",
               'bride' => "required|max:255",
               'groom' => "required|max:255",
               'groom_last_name' => "required",
               'bride_last_name' => "required",
           ]);

           $images = [];
           if($request->hasfile('wedding_image'))
            {
               foreach($request->file('wedding_image') as $file)
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
           // dd('save');

           $cms = wedding::where('slug',$slug)->first();
           $cms->user_id = $request->user_id;
           $cms->groom = $request->groom;
           $cms->service = json_encode($request->service);
           $cms->vendor = json_encode($request->vendor);
           $cms->groom_last_name = $request->groom_last_name;
           $cms->bride = $request->bride;
           $cms->bride_last_name = $request->bride_last_name;
           $cms->slug = $request->slug;
           $cms->location = $request->location;
           $cms->date = $request->date;
           $cms->content = $request->content;
           $cms->ceremony = 2;
           if(empty($request->file('image'))){
               $cms->image = $request->old_image;

           }
           if($image = $request->file("image")) {
               $imageName = $image->getClientOriginalName();
               $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
               $image->move(public_path('storage/uploads/cms/'), $imageName);
               $cms->image = $imageName;
           }
           $cms->save();

           foreach ($request->vendor as $item) {
            $savevednor =  BookVendor::where('wedding_id',$cms->id)->first();
            $savevednor->user_id = $request->user_id;
            $savevednor->wedding_id = $cms->id;
            $savevednor->vendor_id = $item;
            $savevednor->save();
        }
           $file=  ImageGallery::where('wedding_id',$cms->id)->first();
           $file->wedding_id =  $cms->id;
        //    $file->user_id = Auth::user()->id;
        // update work
            $file->user_id = $request->user_id;
        //    update work
           $file->ceremony = 2;
            $data = json_decode($file->image);

           if(empty($request->file('wedding_image'))){

               // dd(json_decode($request->old_wedding_image));

               $file->image = $request->old_wedding_image;

           }
           else {
               // return $data;
               // $data = [];
               foreach($request->file('wedding_image') as $image)
               {
                   $name=$image->getClientOriginalName();
                   $image->move(public_path('storage/uploads/cms/'), $name);
                   $data[] = $name;
               }
               $file->image = json_encode($data);
           }
           $file->save();
        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('admin_engagement')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cms = wedding::where('slug',$slug)->first();
        if($cms){
            Storage::delete('public/uploads/cms/'.$cms->image);
        }
        $cms->delete();
        $file= ImageGallery::where('wedding_id',$cms->id)->first();
        if($file){

            foreach(json_decode($file->image) as $image){
                Storage::delete('public/uploads/cms/'.$image);
            }
            $file->delete();
        }
        return redirect()->route('admin_engagement');
    }

    public function deleteimg(Request $request){
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

    public function servicestypeengagement(Request $request)
    {
        // return 'test';
        $package_type_Status = User::where('bussinessCategory', $request->id)->where('type',2)->get();
        return ["status" => "true", "data" => $package_type_Status];
    }


}
