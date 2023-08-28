<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function userRating(Request $request, $id)
    {

        $this->validate($request, [
            'userName' => "required",
            'stars_rating' => "required",
            'review' => "required",
        ]);
            //  dd($request->all());
            if (false == Auth::check()) {

                $notification = array('message' =>'kindly sign up first' , 'alert-type'=>'error' );
                return back()->with($notification);
            }
            elseif (Auth::user()->type == '2') {

                $notification = array('message' =>'Sorry user can only give reviews!' , 'alert-type'=>'error' );
                return back()->with($notification);
            }
            else {
                Rating::updateOrCreate(
                    [
                       'vendor_id'   => $request->id,
                        'user_id'   => Auth::user()->id,

                    ],
                    [
                        'user_id'   => Auth::user()->id,
                        'vendor_id'   => $request->id,
                        'userName'   => $request->userName,
                        'stars_rating'       => $request->stars_rating,
                        'review'       => $request->review,
                    ],
                    );
            }


        $notification = array('message' =>'You have rated Successfully ' , 'alert-type'=>'success' );
        return back()->with($notification);

    }


}
