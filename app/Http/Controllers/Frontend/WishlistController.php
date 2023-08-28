<?php

namespace App\Http\Controllers\Frontend;

use App\Models\GuardJob;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientHiredCompany;
use App\Models\ClientHiredListingService;
use App\Models\CompanyWishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    /// ========= ITS FOR Listing Service WISHLISTS ============

    public function save_wishlist(Request $request)
    {

        // dd($request->all());
        $user = auth()->user();
        $wishlist = Wishlist::where([
            'user_id' => $user->id,
            'job_id' => $request->id,
            'guard_id' => $request->guard_job_details_id,
        ])->first();

        // $wishlistListingService = ClientHiredListingService::where([
        //     'client_id' => $user->id,
        //     'listing_id' => $request->id,
        //     'guard_id' => $request->guard_job_details_id,
        // ])->first();

        if ($wishlist) {
            // Wishlist item already exists, remove it
            $wishlist->delete();
            return response()->json([
                'status' => 'removed'
            ]);
        }

        Wishlist::create([
            'user_id' => $user->id,
            'guard_id' => $request->guard_job_details_id,
            'job_id' => $request->id,
            'status' => 1
        ]);
        // ClientHiredListingService::create([
        //     'client_id' => $user->id,
        //     'listing_id' => $request->id,
        //     'guard_id' => $request->guard_job_details_id,
        //     'status' => 1
        // ]);
        return response()->json([
            'status' => 'added'
        ]);

    }


    public function delete_wishlist($id)
    {
        // dd($id);
        $guard = Wishlist::findOrFail($id);
        $guard->delete();
        $notification = array('message' => 'Wishlist Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    /// ========= ITS FOR COMPANY WISHLISTS ============
    public function save_company_wishlist(Request $request)
    {

        // dd($request->all());
        $user = auth()->user();
        $wishlist = CompanyWishlist::where([
            'user_id' => $user->id,
            'guard_id' => $request->id,
        ])->first();
        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'status' => 'removed'
            ]);
        }

        // $wishlistCompany = ClientHiredCompany::where([
        //     'client_id' => $user->id,
        //     'company_id' => $request->id,
        // ])->first();

        // if ($wishlist && $wishlistCompany) {
        //     // Wishlist item already exists, remove it
        //     $wishlist->delete();
        //     $wishlistCompany->delete();
        //     // $wishlist->delete();
        //     return response()->json([
        //         'status' => 'removed'
        //     ]);
        // }

        CompanyWishlist::create([
            'user_id' => $user->id,
            'guard_id' => $request->id,
            'status' => 1
        ]);
        // $clientId = $user->id;
        // $companyId = $request->id;
        // ClientHiredCompany::updateOrCreate(
        //     ['client_id' => $clientId, 'company_id' => $companyId],
        //     ['status' => 1]
        // );
        return response()->json([
            'status' => 'added'
        ]);
    }
    public function hireCompnayAction(Request $request)
    {
        // Get the data from the AJAX request
        // dd($request->all());
        // $comp_data_id = $request->input('comp_data_id');

        $clientId = Auth::id();
        $companyId = $request->comp_data_id;
        ClientHiredCompany::updateOrCreate(
            ['client_id' => $clientId, 'company_id' => $companyId],
            ['status' => 1]
        );
        $user = auth()->user();
        $wishlist = CompanyWishlist::where([
            'user_id' => $user->id,
            'guard_id' => $request->comp_data_id,
        ])->first();
        $wishlist->status = 0;
        $wishlist->save();

        return response()->json(['message' => 'Hire action successful.']);
    }
    public function hirelistingAction(Request $request)
    {

        // dd($request->all());
        $Listing_guard = GuardJob::find($request->listing_data_id);
        // dd($Listing_guard->id);
        $clientId = Auth::id();
        $guard_id = $Listing_guard->user_id;
        ClientHiredListingService::create([
            'client_id' => $clientId,
            'listing_id' => $request->listing_data_id,
            'guard_id' => $guard_id,
            'status' => 1
        ]);
        $Listing_guard = Wishlist::where('job_id',$request->listing_data_id)->first();
        $Listing_guard->status = 0;
        $Listing_guard->save();
        $Listing_guard = GuardJob::where('id',$request->listing_data_id)->first();
        $Listing_guard->rating_status = 0;
        $Listing_guard->save();
        return response()->json(['message' => 'Hire action successful.']);
    }
    public function delete_compnay_wishlist($id)
    {
        // dd($id);
        $guard = CompanyWishlist::findOrFail($id);
        $guard->delete();
        $notification = array('message' => 'Wishlist Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
