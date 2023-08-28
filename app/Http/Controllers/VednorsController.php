<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\service;
use App\Models\location;
use App\Models\AboutVendor;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Exports\VendorExport;
use App\Models\VendorContact;
use App\Models\vendorManagement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class VednorsController extends Controller
{
    public function index()
    {

        $getCMS = User::where('type',2)->with('get_vednorbusinesscategory')->latest()->get();
        return view('adminVendor.index',get_defined_vars());



    }
    public function export(Request $request)
    {
        // dd($request->all());
        // return $request->dataValue;
        return Excel::download(new VendorExport($request->dataValue), 'Vendor-list.xlsx');
        // return Excel::download(new VendorExport, 'Vendor.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getLocationNames = location::all();
        $getServiceNames = service::all();
        return view('adminVendor.create',get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $getServiceNames = service::where('id',$request->bussinessCategory)->first();
        //  return  $getServiceNames->service;
        $this->validate($request, [
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'locations' => "required|max:255",
            'bussinessCategory' => "required|max:255",
            'contact' => "required|max:255",
            'company' => "required|max:255",
            'email' => 'required|email|unique:users',
            'name' => 'required|unique:users',
            'last_name' => "required|max:255",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

        ]);
        // dd($request->all());

        $cms = new User();
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $cms->bussinessCategory = $request->bussinessCategory;
        $cms->show_bus_cat = $getServiceNames->service;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->company = $request->company;
        $cms->slug = Str::slug($request->name,'-');
        if(!$request->file("image")){
            // dd('old image here');
            $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            // dd($cms->profile_image_path);
        }else{
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
                 $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
            $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$imageName;
        }
        // $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$imageName;
        // $cms->type = $request->type;
        $cms->type = 2;
        $cms->status = 1;
        $cms->password = Hash::make($request->password);
        $cms->show_password = $request->password;
        $cms->save();


        $images = [];
        ImageGallery::updateOrCreate(
        [
            'user_id'   => $cms->id,

        ],
        [
            'user_id'   => $cms->id,
            'image'   =>json_encode($images),
        ],
        );

        UserLocation::updateOrCreate(
            [
                'user_id'   => $cms->id,
             ],
            [
            'user_id' => $cms->id,
            'locations' =>json_encode($request->locations)
             ]);

        $notification = array('message' =>'Your data Inserted Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('adminVendor')->with($notification);

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
        $edit_data = User::where('slug',$slug)->first();
         $getServiceNames = service::all();
        $getLocationNames = location::all();
        $getVendorlocations = UserLocation::where('user_id', $edit_data->id)->first();
         $getvendorimages = ImageGallery::where('user_id', $edit_data->id)->first();
         $getvendorabout =  AboutVendor::where('user_id', $edit_data->id)->first();
        //  $getvendorDetailsService = User::where('id', $gevendorslug->id)->with('get_vednorbusinesscategory', 'get_user_rating')->get();
        $getVendorContact = VendorContact::where('vendor_id', $edit_data->id)->latest()->get();

        $getvendorDetailsService = User::where('id', $edit_data->id)->with('get_vednorbusinesscategory')->first();
        // $getvendorimages = json_decode($getvendorimages->image );
        //         dd($data);
         $edit_data = User::where('slug',$slug)->first();
         return view('adminVendor.edit',get_defined_vars());
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

        // dd($request->all());
        $getServiceNames = service::where('id',$request->bussinessCategory)->first();
        // return $getServiceNames->service;
        $this->validate($request, [
            // 'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'locations' => "required|max:255",
            'bussinessCategory' => "required|max:255",
            'contact' => "required|max:255",
            'company' => "required|max:255",
            // 'wedding_image' => "mimes:jpg,jpeg,png,gif|max:1024",
            'name' => 'required',
            'last_name' => "required|max:255",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
            'aboutvendor' => "required",
            'reviews' =>  "required",
            // 'wedding_image' => "required",

        ]);

        // dd($request->all());
        $images = [];
        $fileofimages =  ImageGallery::where('user_id',$id)->first();
        // dd($fileofimages->image);
        if($fileofimages ){
            // dd($fileofimages);
            $oldweddingimageslist = json_decode($fileofimages->image);
            if($request->hasfile('wedding_image'))
            {
                foreach($request->file('wedding_image') as $file)
                {
                    $images[] = $file;
                }
            }
            //   dd(count($oldweddingimageslist));
            $totalimages = count($oldweddingimageslist) + count($images);
            //   dd($totalimages);
            if($totalimages > 10)
            {
                // dd('here');
                $notification = array('message' =>'You can upload only 10 images' , 'alert-type'=>'error' );
                return redirect()->back()->with($notification);
            }
        }

        $cms = User::findOrFail($id);
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $cms->bussinessCategory = $request->bussinessCategory;
        $cms->show_bus_cat = $getServiceNames->service;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->company = $request->company;
        $cms->slug = Str::slug($request->name,'-');

        if(empty($request->file("image"))){
            // dd('old image here');
            $cms->image = $request->old_image;
            $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$request->old_image;
        }else{
            // dd('new image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
            $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$imageName;
        }

        $cms->type = 2;
        $cms->status = 1;
        if($request->password == null){
            $cms->password = $request->prevpassword;
        }else {
            $cms->password = Hash::make($request->password);
            $cms->show_password = $request->password;
        }
        $cms->save();
         UserLocation::updateOrCreate(
            [
                'user_id'   => $cms->id,
             ],
            [
            'user_id' => $cms->id,
            'locations' =>json_encode($request->locations)
             ]);


        // $images = json_decode($fileofimages->image ??'');
        // if ($request->hasfile('wedding_image')) {
        //     foreach ($request->file('wedding_image') as $file) {
        //         $name = time() . rand(1, 100) . '.' . $file->extension();
        //         $file->move(public_path('storage/uploads/cms/'), $name);
        //         $images[] = $name;
        //     }
        // }


        $images = json_decode($fileofimages->image ??'');
        if(empty($request->file("wedding_image"))){
            // dd('old image here');
            $cms->image = $request->old_wedding_image;
        }else{
            // dd('new image here');
            foreach ($request->file('wedding_image') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('storage/uploads/cms/'), $name);
                $images[] = $name;
            }
        }
        // dd($images);

        ImageGallery::updateOrCreate(
            [
                'user_id'   => $id,

            ],
            [
                'user_id'   => $id,
                'image'   => json_encode($images),
            ],
        );

        AboutVendor::updateOrCreate(
            [
                'user_id'   => $id,

            ],
            [

                'user_id'   => $id,
                'aboutvendor'   => $request->aboutvendor,
                'reviews'       => $request->reviews,
                'image2'       => !empty($request->file("image2")) ? $imageName = $request->image2->getClientOriginalName() : '',

            ],
        );
        // !empty($request->file("image")) ? $request->image->move(public_path('storage/uploads/cms/'), $imageName) : '';
        !empty($request->file("image2")) ? $request->image2->move(public_path('storage/uploads/cms/'), $imageName) : '';

        $notification = array('message' =>'Your data Updated Successfully ' , 'alert-type'=>'success' );
        return redirect()->route('adminVendor')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {

        $cms = User::where('slug',$slug)->first();
        if ($cms) {
            Rating::where('vendor_id', $cms->id)
            ->update([
                'status' => 0
             ]);
        }
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms = User::where('slug',$slug)->first();
        if($cms){
            AboutVendor::where('user_id',$cms->id)->delete();
            // $cms->delete();
        }
        $cms->delete();

        return redirect()->route('adminVendor');

    }

    public function vendor_status(Request $request,$id)
    {
         $vendor_status =  User::findOrFail($id);
         $newStatus = ($vendor_status->status == 0) ? 1 : 0;
         $vendor_status->status = $newStatus;
         if($newStatus == 1){
            $vendor_status->show_status = 'ON';
        }elseif($newStatus == 0){
            $vendor_status->show_status = 'OFF';
        }
         if($newStatus == 1){
            $user = User::where('id',$id)->first();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->show_password
            ];
            $emailToSend = $user->email;
            Mail::send('website.vendormail.credentials', ['data' => $data],
            function ($message) use ($emailToSend)
            {
                $message->to($emailToSend)->subject('Credentials');
            });
        }
        $vendor_status->save();
        $notification = array('message' =>'Vendor Status Changed Successfully' , 'alert-type'=>'success' );
        return redirect()->back()->with($notification);

    }

}
