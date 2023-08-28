<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Config;
use App\Models\service;
use App\Models\GuardJob;
use App\Models\Language;
use App\Models\location;
use App\Models\GuardType;
use App\Models\testimonial;
use Illuminate\Http\Request;
use App\Models\ClientPostJob;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ApplyFiltersController extends Controller
{
    public function __construct()
    {
        $getlocation = location::all();
        $getGuardType = GuardType::all();
        $getLanguage = Language::all();
        $getservice = service::all();
        $getAlltag = Tag::all();
        $copyright = Config::first();
        $clientJobRates = ClientPostJob::all();
        $searchbanners = testimonial::where('id', '6')->first();
        view::share(get_defined_vars());
    }


    // ==== This is Client Search Functions Client will be Login to seacrh
    public function apply_Companies_search(Request $request)
    {
        // dd($request->all());

        if(Auth::check()){

         $query = User::where('status', '1')->where('type', 2)->with('get_guardjobs','guard_service','get_guard_tags.guard_tags_details','guard_ratings');

         if ($request->guardrating) {
            $minRating = (int) $request->guardrating;
            $query->whereHas('guard_ratings', function ($q) use ($minRating) {
                $q->where('rate', '>=', $minRating);
            });
            }

        if ($request->guardrating && $request->guardrating >= 1 && $request->guardrating <= 5) {
            $averageRating = (int) $request->guardrating;

             $searchResult = $query->get();

            // Calculate and add average rating for each user
            foreach ($searchResult as $user) {
                $user->average_rating = $user->guard_ratings->avg('rate');
            }

            // Filter users whose average rating matches the selected rating
            $filteredResult = $searchResult->filter(function ($user) use ($averageRating) {
                return $user->average_rating === $averageRating;
            });
        }

        if($request->serachservices){
            $query->wherein('services', $request->serachservices);
        }
        if($request->serachguardtype){
            $query->wherein('job_type', $request->serachguardtype);
        }
        if($request->hourlyrate == 1){
            // dd('0 t0 50');
            $query->whereBetween('per_hour_rate', ["min_rate" => 0, "max_rate" => 50]);
        }
        if($request->hourlyrate == 2){
            $query->whereBetween('per_hour_rate', ["min_rate" => 51, "max_rate" => 300]);
        }
        if($request->hourlyrate == 3){
            $query->whereBetween('per_hour_rate', ["min_rate" => 301, "max_rate" => 500]);
        }
        if($request->hourlyrate == 4){
            $query->where('per_hour_rate', '>', 500);
        }
        if($request->serachlocation){
            $query->wherein('location_id', $request->serachlocation);
        }

        if($request->serachlanguage){
            $lan = $request->serachlanguage;
            $query->with('get_user_languages', function($q) use ($lan){
                $q->whereOr('language_id', $lan);
            });
            // whereIn('language_id', $request->serachlanguage);
        }

        if($request->serachtags){
            $lan = $request->serachtags;
            $query->with('get_guard_tags', function($q) use ($lan){
                $q->whereOr('tag_id', $lan);
            });

            // $query->whereIn('tag_id', $request->serachtags);
        }

         $serachresult =  $query->get();
        return view('frontend.companies-serach-results', get_defined_vars());
        }
        else{
            $notification = array('message' => ' Please login first! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

    }
    public function apply_browes_services_search(Request $request)
    {
        // dd($request->all());

        // $getBrowseServices = GuardJob::with('guard_job_details','brwose_listing_tags','hired_Listing_Service')->with('guard_service','guard_location')->with('guard_ratings')->latest()

        if(Auth::check()){
         $query = GuardJob::with('guard_job_details','brwose_listing_tags','hired_Listing_Service','guard_location','guard_ratings');

        if($request->serachservices){
            // $query->wherein('services', $request->serachservices);
            $lan = $request->serachservices;
            $query->with('hired_Listing_Service', function($q) use ($lan){
                $q->whereOr('services', $lan);
            });
        }
        if($request->serachguardtype){
            $query->where('job_type', $request->serachguardtype);
        }
        if($request->hourlyrate == 1){
            // dd('0 t0 50');
            $query->whereBetween('per_hour_rate', ["min_rate" => 0, "max_rate" => 50]);
        }
        if($request->hourlyrate == 2){
            $query->whereBetween('per_hour_rate', ["min_rate" => 51, "max_rate" => 300]);
        }
        if($request->hourlyrate == 3){
            $query->whereBetween('per_hour_rate', ["min_rate" => 301, "max_rate" => 500]);
        }
        if($request->hourlyrate == 4){
            $query->where('per_hour_rate', '>', 500);
        }
        if($request->serachlocation){
            $query->wherein('location_id', $request->serachlocation);
        }

        if($request->serachlanguage){
            $lan = $request->serachlanguage;
            $query->with('get_user_languages', function($q) use ($lan){
                $q->whereOr('language_id', $lan);
            });
            // whereIn('language_id', $request->serachlanguage);
        }
        if($request->serachtags){
            $lan = $request->serachtags;
            $query->with('get_guard_tags', function($q) use ($lan){
                $q->whereOr('tag_id', $lan);
            });

            // $query->whereIn('tag_id', $request->serachtags);
        }

         $serachresult =  $query->get();
        return view('frontend.browes-services-serach-results', get_defined_vars());
        }else{
            $notification = array('message' => ' Please login first! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

    }

    // ==== This is Guard Search Functions Guard will be Login to seacrh
    public function apply_browes_quotes_search(Request $request)
    {

        // dd($request->all());

        if(Auth::check()){
            $query = ClientPostJob::whereStatus(1)->with('client_postjob_details')->with('get_guardtype')->with('client_location')->with('client_service');

        if ($request->location) {
            $query->whereHas('client_location', function($q) use($request) {
                $q->where('location', 'LIKE', '%'.$request->location.'%');
            });
        }

        if ($request->services) {
            $query->whereHas('client_service', function($q) use($request) {
                $q->where('services', 'LIKE', '%'.$request->services.'%');
            });
        }
        if ($request->hourlyrate) {
            $query->whereHas('client_postjob_details', function($q) use($request) {
                // $q->where('starting_rate', 'LIKE', '%'.$request->hourlyrate.'%');
                if($request->hourlyrate == 1){
                    // dd('0 t0 50');
                    $q->whereBetween('starting_rate', ["min_rate" => 0, "max_rate" => 50]);
                }
                if($request->hourlyrate == 2){
                    $q->whereBetween('starting_rate', ["min_rate" => 51, "max_rate" => 300]);
                }
                if($request->hourlyrate == 3){

                    $q->whereBetween('starting_rate', ["min_rate" => 301, "max_rate" => 500]);
                    // dd($q);
                }
                if($request->hourlyrate == 4){
                    $q->where('starting_rate', '>', 500);
                }
            });
        }else{
            if($request->hourlyrate == 1){
                // dd('0 t0 50');
                $query->whereBetween('per_hour_rate', ["min_rate" => 0, "max_rate" => 50]);
            }
            if($request->hourlyrate == 2){
                $query->whereBetween('per_hour_rate', ["min_rate" => 51, "max_rate" => 300]);
            }
            if($request->hourlyrate == 3){
                $query->whereBetween('per_hour_rate', ["min_rate" => 301, "max_rate" => 500]);
            }
            if($request->hourlyrate == 4){
                $query->where('per_hour_rate', '>', 500);
            }
        }
        if($request->serachguardtype){
            $query->wherein('job_type', $request->serachguardtype);
        }
        if($request->serachlocation){
            $query->where('location', $request->serachlocation);
        }
        if($request->serachservices){
            $query->where('services', $request->serachservices);
        }
         $clientSerachresult =  $query->get();
        //  dd($clientSerachresult);
         if ($clientSerachresult->isEmpty()) {
            // dd('no data found');
            return view('frontend.no-browse-requests-found');
        } else {
            return view('frontend.browse-requests-serach-results', get_defined_vars());
        }
        }else{
            $notification = array('message' => ' Please login first! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }


    }

    public function apply_howitworks_search(Request $request)
    {

        // dd($request->all());
        if(Auth::check()){
        $query = ClientPostJob::whereStatus(1)->with('client_postjob_details')->with('get_guardtype')->with('client_location')->with('client_service');

        if($request->location){
            $query->where('location', $request->location);
        }
        if($request->services){
            $query->where('services', $request->services);
        }

        if($request->serachlocation){
            $query->where('location', $request->serachlocation);
        }
        if($request->serachservices){
            $query->where('services', $request->serachservices);
        }

        if($request->usersearch){
            $lan = $request->usersearch;
            $query->with('client_location', function($q) use ($lan){
                $q->whereOr('location', $lan);
            });
        }
        if($request->usersearch){
            $lan = $request->usersearch;
            $query->with('client_service', function($q) use ($lan){
                $q->whereOr('service', $lan);
            });
        }
        // dd($query);
          $clientSerachresult =  $query->get();
        // dd($clientSerachresult);
         if ($clientSerachresult->isEmpty()) {
            // dd('no data found');
            return view('frontend.no-browse-requests-found');
        } else {
            return view('frontend.client-serach-results', get_defined_vars());
        }
            }else{
                $notification = array('message' => ' Please login first! ', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }

    }
}
