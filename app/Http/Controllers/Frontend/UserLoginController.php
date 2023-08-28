<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Subcription;
use App\Models\UserService;
use Illuminate\Support\Str;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
     /**
     * User Login
     *
     */
    public function userlogin(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        $getuserstatus = User::where('email', $request->email)->first();

        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,

        ]);

        if ($credentials && Auth::user()->status == 1) {

            if (Auth::user()->type == 2) {
                // dd('guard-dashboard');
                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('guard-dashboard')->with($notification);
            } elseif (Auth::user()->type == 3) {
                    // dd('client-dashboard');
                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('client-dashboard')->with($notification);
            } elseif (Auth::check() && Auth::user()->type == 1) {

                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('dashboard/index')->with($notification);
            }
        }else{

            $notification = array('message' => 'Your email or password does not match', 'alert-type' => 'error');
            return back()->with($notification);
        }
        if (!$getuserstatus) {

            $notification = array('message' => 'Your email or password does not match', 'alert-type' => 'error');
            return back()->with($notification);
        } elseif ($getuserstatus->status == 0) {

            $notification = array('message' => 'Your are not Approved by Admin', 'alert-type' => 'info');
            return back()->with($notification);
        }
    }
    /**
     * User Log out
     *
     */
    public function userlogout()
    {
        Session::flush();
        Auth::logout();
        $notification = array('message' => 'You have logout Successfully', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);

    }
    /**
     * User change password
     *
     */
    public function changepassword()
    {
        return view('user-dashboard.change_password');
    }
    /**
     * User update password
     *
     */
    public function updatepassword(Request $request)
    {

        $this->validate($request, [
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        ]);
        // dd($request->all());
        $password = User::where('id', Auth::id())->first();
        $password->password = Hash::make($request->password);
        $password->save();
        $notification = array('message' => 'Password Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function user_signup(Request $request)
    {

    //    dd($request->all());
       $this->validate($request, [
        'name' => "required",
        'last_name' => "required",
        'email' => "required|email|unique:users",
        'username' => "required|min:4",
        // 'username' => "required|username|unique:users",
        // 'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'password' => 'required|min:6|',
        'contact' => "required",
        'userlocation' => "required",
        'type' => "required",
        // 'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

    ]);
    // dd($request->all());

    $cms = new User();
    $cms->name = $request->name;
    $cms->last_name = $request->last_name;
    $cms->username = $request->username;
    $random = Str::random(4);
    $cms->slug = Str::slug($request->username . '-' . $random);
    $cms->status = 1;
    $cms->userlocation = $request->userlocation;
    $cms->email = $request->email;
    $cms->contact = $request->contact;
    $cms->companyname = $request->companyname;
    if ($image = $request->file("image")) {
        $imageName = $image->getClientOriginalName();
        $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
        $cms->image = $imageName;
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
        // $cms = new UserService();
        // $cms->user_id = $cms->id;
        // $cms->services = json_encode($request->services);
        // $cms->save();
        $client_sub = new Subcription();
        if ($request->subscribe == 1) {
            $client_sub->email = $cms->email;
        }
        $client_sub->save();

        // $data = [
        //     'name' => $client->name,
        // ];
        // $emailToSend = $request->groom_email;
        // Mail::send('website.register.vendor_register', ['data' => $data], function ($message) use ($emailToSend) {
        //     $message
        //         ->to($emailToSend)->subject('Sign up');
        //     $message->from('iamjamesalbertt@gmail.com', 'South Dakota Bride');
        // });

        $notification = array('message' => ' Signup Successfully! ', 'alert-type' => 'success');
        return redirect()->route('frontend.signin')->with($notification);
    }
}
