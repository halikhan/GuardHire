<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\service;
use App\Models\location;
use App\Models\UserService;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\ClientPostJob;
use App\Models\GuardCreditPoint;
use App\Models\GuardJob;
use App\Models\PaymentDetail;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class UserManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $getCMS = User::where('type',3)->get();
         $getCMS = User::where('type','!=',1)->get();
         return view('users.index',get_defined_vars());
    }

    public function export(Request $request)
    {
        // dd('export');
        return Excel::download(new UsersExport($request->dataValue), 'users-list.xlsx');

        // return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function import()
    // {
    //     Excel::import(new UsersImport,request()->file('file'));

    //     return back();
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('here');
        $getserveices = service::all();
        $getlocation = location::all();
        return view('users.create',get_defined_vars());

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
            // 'email' => "required|email|unique:users",
            'userlocation' => "required",
            'type' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

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
        if(!$request->file("image")){
            // dd('old image here');
            // $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
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

        $cms->type = $request->type;
        $cms->password = Hash::make($request->password);
        $cms->show_password = $request->password;
        $cms->save();


        UserLocation::updateOrCreate(
            [
                'user_id'   => $cms->id,
             ],
            [
            'user_id' => $cms->id,
            'locations' => $request->userlocation,
             ]);

        $notification = array('message' =>'Your data Inserted Successfully' , 'alert-type'=>'success' );
        return redirect()->route('user')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (User::where('id', $id)->where('type',2)->first())
        {
             $show_data = User::where('id', $id)->with('get_guardjobs.guard_service','get_guardjobs.guard_location')->get();
             return view('users.guard',get_defined_vars());

        }
        elseif (User::where('id', $id)->where('type',3)->first())
        {

            $show_data = User::where('id', $id)->with('get_clientjobs.client_location','get_clientjobs.client_service','get_clientjobs.get_guardtype')->get();
            return view('users.client',get_defined_vars());
            // return view('users.show_guard_package',get_defined_vars());

        }
        else{

            $notification = array('message' =>'Your data is not available' , 'alert-type'=>'error' );
            return back()->with($notification);
        }
    }

    public function package_details_show($id)
    {

        if (User::where('id', $id)->where('type',2)->first())
        {
            $totalCreditsPurchased = PaymentDetail::where('user_id', $id)->sum('total_credit_points');
            $guardPaymentDetail = PaymentDetail::where('user_id', $id)->latest()->first();
            $listingCount = GuardJob::where('user_id', $id)->sum('listing_points');
            $totalCreditPoints = GuardCreditPoint::where('guard_id', $id)->sum('credit_points');
            // $totalCreditsPurchased = $guardPaymentDetail->total_credit_points;

            // Assuming 2 credits used in GuardJob table
            $creditsUsedInGuardJob = $listingCount;
            // Assuming 5 credits used in GuardCreditPoint table
            $creditsUsedInGuardCreditPoint = $totalCreditPoints;
            $totalCreditsUsed = $creditsUsedInGuardJob + $creditsUsedInGuardCreditPoint;
            $remainingCredits = $totalCreditsPurchased - $totalCreditsUsed;
            //  $show_data = User::where('id', $id)->with('get_guardjobs.guard_service','get_guardjobs.guard_location')->get();
             return view('users.show_guard_package',get_defined_vars());

        }
        else{

            $notification = array('message' =>'Your data is not available' , 'alert-type'=>'error' );
            return back()->with($notification);
        }
    }

    public function user_gift_points(Request $request)
    {
        // dd($request->all());
        $user_lastest_package = PaymentDetail::where('id', $request->package_id)->where('user_id', $request->user_id)->latest()->first();
        // Get the gifted points from the request and add it to the total_credit_points
        $giftedPoints = $request->input('gifted_points');
        $updatingUserCredits = $user_lastest_package->total_credit_points + $giftedPoints;
        $user_lastest_package->total_credit_points = $updatingUserCredits;
        $user_lastest_package->save();
        $notification = array('message' =>'points gifted Successfully' , 'alert-type'=>'success' );
        return back()->with($notification);
        // return Response::json(['updatingUserCredits' => $updatingUserCredits]);
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
         //   $edit_data->id;
        $edit_data = User::where('slug',$slug)->first();
        $getlocation = location::all();
        $getUserLocation = UserLocation::where('user_id',$edit_data->id)->first();
         return view('users.edit',get_defined_vars());
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
            // 'password' => 'min:6',
            // 'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'contact' => "required",
            // 'email' => "required|email|unique:users",
            'userlocation' => "required",
            // 'type' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

        ]);
        $cms = User::findOrFail($id);
        // dd($cms->id);
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $random = Str::random(4);
        $cms->slug = Str::slug($request->name . '-' . $random);
        if($request->featured_status == "on"){
            $cms->featured_status = 1;
        }else{
            $cms->featured_status = 0;
        }
        if($request->status == "on"){
            $cms->status = 1;
        }else{
            $cms->status = 0;
        }

        $cms->userlocation = $request->userlocation;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        if(!$request->file("image")){
            // dd('old image here');
            // $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            $cms->image = $request->oldimage;
            // dd($cms->profile_image_path);
        }else{
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
        }
        $cms->type = $request->type;
        if($request->password == null){
            $cms->password = $request->oldpassword;
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
            'locations' => $request->userlocation,
             ]);

        $notification = array('message' =>'User Updated Successfully' , 'alert-type'=>'success' );
        return redirect()->route('user')->with($notification);

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
        Storage::delete('public/uploads/cms/'.$cms->image);
        $cms->delete();
        return redirect()->route('user');
    }

    public function user_status(Request $request,$id)
    {
        // return "status";
        $user_status = User::findOrFail($id);
        $newStatus = ($user_status->status == 0) ? 1 : 0;
        $user_status->status = $newStatus;
        if($newStatus == 1){
            $user_status->show_status = 'ON';
        }elseif($newStatus == 0){
            $user_status->show_status = 'OFF';
        }
        if($newStatus == 1){
            $user = User::where('id',$id)->first();
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
        $notification = array('message' =>'User Status Changed Successfully' , 'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
    public function featured_user($id)
    {
        // return "status";
        $user_status = User::findOrFail($id);
        $newStatus = ($user_status->featured_status == 0) ? 1 : 0;
        $user_status->featured_status = $newStatus;
        $user_status->save();

        // if($user_status->type == 2){
        //     $featuredguardjobs = GuardJob::where('user_id',$user_status->id)->get();
        //     $newStatus = ($featuredguardjobs->featured_status == 0) ? 1 : 0;
        //     $featuredguardjobs->featured_status = $newStatus;
        //     $featuredguardjobs->save();
        // }else{
        //     $featuredguardjobs = ClientPostJob::where('user_id',$user_status->id)->get();
        //     $newStatus = ($featuredguardjobs->featured_status == 0) ? 1 : 0;
        //     $featuredguardjobs->featured_status = $newStatus;
        //     $featuredguardjobs->save();
        // }
        $notification = array('message' =>'featured Status Changed Successfully' , 'alert-type'=>'success' );
        return redirect()->back()->with($notification);
    }
}
