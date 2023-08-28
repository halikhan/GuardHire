<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
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
        // dd('check dataaaa');
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => "required|max:255",
            'last_name' => "required|max:255",
            'address' => "required|max:255",
            'city' => "required|max:255",
            'country' => "required|max:255",
            'zip_code' => "required|max:255",
        ]);

        $arr = [
            'email' => $request->email,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'package_title' => $request->package_title,
            'package_amount' => $request->package_amount,
        ];
        session()->put('checkout', $arr);
        // dd('here');
        return redirect()->route('AmeaToday_buy-now');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // session()->put('checkout', $arr);
    }

    public function StorePaymentDetails(Request $request)
    {

      User::create([

            'email' => session()->get('User_Signup')['email'],
            'name' => session()->get('User_Signup')['name'],
            'last_name' => session()->get('User_Signup')['last_name'],
            'type' => session()->get('User_Signup')['type'],
            'password' => session()->get('User_Signup')['password'],
        ]);

       $userdertails = User::latest()->first();

        checkout::create([

            'user_id' =>$userdertails->id,
            'email' => session()->get('checkout')['email'],
            'name' => session()->get('checkout')['name'],
            'last_name' => session()->get('checkout')['last_name'],
            'address' => session()->get('checkout')['address'],
            'city' => session()->get('checkout')['city'],
            'country' => session()->get('checkout')['country'],
            'zip_code' => session()->get('checkout')['zip_code'],
            'country' => session()->get('checkout')['country'],
            'package_title' => session()->get('checkout')['package_title'],
            'package_amount' => session()->get('checkout')['package_amount'],

        ]);



        $token = sha1(uniqid(time(), true));
        $emailToSend = session()->get('User_Signup')['email'];
        Mail::send('Mail.SignUp_mail', ['data' => route('AmeaToday', ['token' => $token])], function ($messages) use ($emailToSend) {
            $messages->to($emailToSend);
            $messages->subject('Sign Up Successfully');
        });

        session()->forget('User_Signup');
        session()->forget('checkout');
        session()->forget('authenticated');

        $email = $userdertails->email;
        $password = $userdertails->password;


        if($email = $userdertails->email &&  $password = $userdertails->password){
            Auth::attempt([
                'email' => $email,
                'password' => $password,
            ]);
            return response()->json([
                'status' => 200
            ]);

        }

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
    public function destroy($id)
    {
        //
    }
}
