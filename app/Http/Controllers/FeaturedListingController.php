<?php

namespace App\Http\Controllers;

use App\Models\FeaturedClient;
use App\Models\FeaturedGuard;
use App\Models\GuardJob;
use App\Models\GuardType;
use App\Models\ImageGallery;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\service;
use App\Models\location;
use App\Models\Tag;
use App\Models\UserLanguage;
use App\Models\UserLocation;
use App\Models\UserTag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;


class FeaturedListingController extends Controller
{
    public function __construct()
    {
        $getlocation = location::all();
        $getGuardType = GuardType::all();
        $getLanguage = Language::all();
        $getservice = service::all();
        $getAlltag = Tag::all();
        $getTags = Tag::all();
        view::share(get_defined_vars());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $getCMS = User::where('type',3)->get();
        // $getCMS = User::where('type', '!=', 1)->get();
         $getCMS = User::whereIn('type', [4, 5])->with('featured_guardjobs')->get();
        return view('featured.index', get_defined_vars());
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        $getserveices = service::all();
        $getTags = Tag::all();
        $getlocation = location::all();
        $getGuardType = GuardType::all();
        $getLanguage = Language::all();

        return view('featured.create', get_defined_vars());
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
            'name' => "required",
            'last_name' => "required",
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'contact' => "required",
            'email' => "required|email|unique:users",
            // 'userlocation' => "required",
            'type' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
            'job_type' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'job_duration' => ['required', 'string', 'max:255'],
            'location' => ['required', 'exists:locations,id'],
            'per_hour_rate' => ['required', 'numeric', 'min:0'],
            'services.*' => ['nullable', 'exists:services,id'],
            'tags.*' => ['nullable', 'exists:tags,id'],
            'languages.*' => ['nullable', 'exists:languages,id'],

        ]);
        $cms = new User();
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $random = Str::random(4);
        $cms->slug = Str::slug($request->name . '-' . $random);
        $cms->status = 1;
        $cms->userlocation = $request->userlocation;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        if (!$request->file("image")) {
            // dd('old image here');
            $cms->image = env('APP_URL') . '/' . 'storage/uploads/No-image.jpg';
            // dd($cms->profile_image_path);
        } else {
            // dd('image here');
            if($image = $request->file("image")) {
                $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
                $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
        }
        $cms->type = $request->type;
        $cms->password = Hash::make($request->password);
        $cms->show_password = $request->password;
        $cms->save();
        if($cms->type == 4){
            $guardJob = new FeaturedGuard();
            $guardJob->companyname = $request->input('companyname');
            $guardJob->job_type = $request->input('job_type');
            $guardJob->job_duration = $request->input('job_duration');
            $guardJob->location_id = $request->input('location');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->services = $request->input('services');
            $guardJob->description = $request->description;
            $guardJob->language = json_encode($request->languages);
            $guardJob->tags = json_encode($request->tags);
            $guardJob->status = 1;
            // $guardJob->listing_points = 2;
            $guardJob->user_id = $cms->id;
            $guardJob->save();

        }
        elseif($cms->type == 5){
            $guardJob = new FeaturedClient();
            $guardJob->companyname = $request->input('companyname');
            $guardJob->job_type = $request->input('job_type');
            $guardJob->job_duration = $request->input('job_duration');
            $guardJob->location_id = $request->input('location');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->services = $request->input('services');
            $guardJob->description = $request->description;
            $guardJob->language = json_encode($request->languages);
            $guardJob->tags = json_encode($request->tags);
            $guardJob->status = 1;
            // $guardJob->listing_points = 2;
            $guardJob->user_id = $cms->id;
            $guardJob->save();
        }
        else{
            $notification = array('message' => 'Somthing Went wronge!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        $notification = array('message' => 'Your data Inserted Successfully ', 'alert-type' => 'success');
        return redirect()->route('featured')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);

        if (User::where('id', $id)->where('type', 4)->first()) {
            $show_data = User::where('id', $id)->with('featured_guardjobs.fet_guardtype','featured_guardjobs.fet_guardservice','featured_guardjobs.fet_guardlocation')->get();
            return view('featured.guard', get_defined_vars());
        } elseif (User::where('id', $id)->where('type', 5)->first()) {
             $show_data = User::where('id', $id)->with('featured_clientjobs.fet_clienttype','featured_clientjobs.fet_clientservice','featured_clientjobs.fet_clientlocation')->get();
            return view('featured.client', get_defined_vars());
        } else {
            $notification = array('message' => 'Your data is not available', 'alert-type' => 'error');
            return back()->with($notification);
        }

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
        //   $edit_data->id;

          $edit_data = User::where('slug', $slug)->first();
        //   dd($edit_data->type);
          if($edit_data->type == 4){
            $edit_data = User::where('id', $edit_data->id)->with('featured_guardjobs')->first();
             //  $edit_data->featured_guardjobs->location_id;
            $getlocation = location::all();
            $getUserLocation = UserLocation::where('user_id', $edit_data->id)->first();
            return view('featured.edit-guard', get_defined_vars());
          }
          elseif($edit_data->type == 5){

             $edit_data = User::where('id', $edit_data->id)->with('featured_clientjobs')->first();
            //  return $edit_data->featured_clientjobs[0]['location_id'];
            $getlocation = location::all();
            $getUserLocation = UserLocation::where('user_id', $edit_data->id)->first();
            return view('featured.edit-client', get_defined_vars());
          }

        return view('featured.index', get_defined_vars());


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

        $this->validate($request, [
            'name' => "required",
            'last_name' => "required",
            'contact' => "required",
            // 'email' => "required|email|unique:users",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

        ]);
        $cms = User::findOrFail($id);
        // dd($cms->id);
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $random = Str::random(4);
        $cms->slug = Str::slug($request->name . '-' . $random);
        $cms->status = 1;
        // $cms->userlocation = $request->userlocation;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        if (!$request->file("image")) {
            // dd('old image here');
            $cms->image = $request->oldimage;
        } else {
            // dd('image here');
            if($image = $request->file("image")) {
                $imageName = date("Y-m-d") . '__' . time() . "__" . $image->getClientOriginalName();
                $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
        }
        $cms->type = $request->type;
        if ($request->password == null) {
            $cms->password = $request->oldpassword;
        } else {
            $cms->password = Hash::make($request->password);
            $cms->show_password = $request->password;
        }
        $cms->save();
        if($cms->type == 4){
            // dd('daata 4 here');
            $guardJob = FeaturedGuard::where('user_id',$cms->id)->first();
            $guardJob->companyname = $request->input('companyname');
            $guardJob->job_type = $request->input('job_type');
            $guardJob->job_duration = $request->input('job_duration');
            $guardJob->location_id = $request->input('location');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->services = $request->input('services');
            $guardJob->description = $request->description;
            $guardJob->language = json_encode($request->languages);
            $guardJob->tags = json_encode($request->tags);
            $guardJob->status = 1;
            // $guardJob->listing_points = 2;
            $guardJob->user_id = $cms->id;
            $guardJob->save();
        }
        elseif($cms->type == 5){
            // dd('here');

            $guardJob = FeaturedClient::where('user_id',$cms->id)->first();
            $guardJob->companyname = $request->input('companyname');
            $guardJob->job_type = $request->input('job_type');
            $guardJob->job_duration = $request->input('job_duration');
            $guardJob->location_id = $request->input('location');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->services = $request->input('services');
            $guardJob->description = $request->description;
            $guardJob->language = json_encode($request->languages);
            $guardJob->tags = json_encode($request->tags);
            $guardJob->status = 1;
            // $guardJob->listing_points = 2;
            $guardJob->user_id = $cms->id;
            $guardJob->save();
        }
        else{
            $notification = array('message' => 'Somthing Went wronge!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }


        $notification = array('message' => 'User Updated Successfully', 'alert-type' => 'success');
        return redirect()->route('featured')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $cms = User::where('slug', $slug)->first();
        Storage::delete('public/uploads/cms/' . $cms->image);
        $cms->delete();
        return redirect()->route('featured');
    }

    public function user_status(Request $request, $id)
    {
        // return "status";
        $user_status = User::findOrFail($id);
        $newStatus = ($user_status->status == 0) ? 1 : 0;
        $user_status->status = $newStatus;
        if ($newStatus == 1) {
            $user_status->show_status = 'ON';
        } elseif ($newStatus == 0) {
            $user_status->show_status = 'OFF';
        }
        if ($newStatus == 1) {
            $user = User::where('id', $id)->first();
            $data = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->show_password
            ];
            // $emailToSend = $user->email;
            // Mail::send('website.vendormail.credentials', ['data' => $data],
            // function ($message) use ($emailToSend)
            // {
            //     $message
            //         ->to($emailToSend)->subject('Credentials');
            // });
        }
        $user_status->save();
        $notification = array('message' => 'User Status Changed Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
