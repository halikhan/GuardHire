<?php

namespace App\Http\Controllers\Frontend\client;

use App\Models\Tag;
use App\Models\User;
use App\Models\Config;
use App\Models\service;
use App\Models\UserTag;
use App\Models\GuardJob;
use App\Models\Language;
use App\Models\location;
use App\Models\Wishlist;
use App\Models\GuardType;
use App\Models\ImageGallery;
use App\Models\UserLanguage;
use Illuminate\Http\Request;
use App\Models\ClientPostJob;
use App\Http\Controllers\Controller;
use App\Models\ClientHiredCompany;
use App\Models\CompanyRating;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{

    public function client_profile(Request $request)
    {

        // dd($request->all());
        
        $this->validate($request, [
            'description' => "required",
            // 'languages' => "required",
            // 'tags' => "required",
            'email' => "required",
            'services' => "required",
            'userlocation' => "required",
            'contact' => "required",
            'last_name' => "required",
            'name' => "required",
            'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",
            // 'tags.*' => 'required', 'exists:tags,id',
            // 'languages.*' => 'required', 'exists:languages,id',
        ]);

        // dd($request->all());
        $id = Auth::user()->id;
        $cms = User::findOrFail($id);
        // dd($cms->id);
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $cms->status = 1;
        $cms->type = 3;
        $cms->companyname = $request->companyname;
        $cms->userlocation = $request->userlocation;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->services = $request->services;
        $cms->license_no = $request->license_no;
        $cms->description = $request->description;
        $cms->language_id = !empty($request->languages) ? json_encode($request->languages) : null;
        $cms->tag_id = !empty($request->tags) ? json_encode($request->tags) : null;
        // $cms->password = Auth::user()->password;
        if (!$request->file("image")) {
            $cms->image = $request->old_image;
            // dd($cms->profile_image_path);
        } else {
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
        }
        $cms->save();

        // if ($request->has('tags')) {
        //     foreach ($request->input('tags') as $tagId) {
        //         $userTag = new UserTag();
        //         $userTag->user_id = auth()->user()->id;
        //         $userTag->tag_id = $tagId;
        //         $userTag->guard_job_id = $cms->id;
        //         $userTag->save();
        //     }
        // }

        // if ($request->has('languages')) {
        //     foreach ($request->input('languages') as $languageId) {
        //         $userLanguage = new UserLanguage();
        //         $userLanguage->user_id = auth()->user()->id;
        //         $userLanguage->language_id = $languageId;
        //         $userLanguage->guard_job_id = $cms->id;
        //         $userLanguage->save();
        //     }
        // }


        $notification = array('message' => 'Your Profile Updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function post_job_store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'job_type' => 'required|string|max:255',
            'job_duration' => ['nullable', 'string', 'max:255'],
            'location' => 'required|string|max:255',
            'per_hour_rate.*' => 'nullable','numeric',
            // 'per_hour_rate' => 'required|numeric|min:0.01',
            'starting_date' => 'required|date',
            // 'ending_date' => 'required|date|after_or_equal:starting_date',
            'description' => 'required|string|max:1000',
            // 'tags.*' => ['nullable', 'exists:tags,id'],
            // 'languages.*' => ['nullable', 'exists:languages,id'],
            'services.*' => 'required|string|max:255',

        ]);

        $clientpostjob = new ClientPostJob();
        $clientpostjob->job_type = $validatedData['job_type'];
        $clientpostjob->job_duration =  !empty($request->job_duration) ? $request->job_duration: null;
        $clientpostjob->location = $validatedData['location'];
        $clientpostjob->per_hour_rate = !empty($request->per_hour_rate) ? $request->per_hour_rate: null;
        $clientpostjob->starting_date = $validatedData['starting_date'];
        $clientpostjob->ending_date = !empty($request->ending_date) ? $request->ending_date: null;;
        $clientpostjob->description = $validatedData['description'];
        $clientpostjob->services = $request->services;
        $clientpostjob->languages = !empty($request->languages) ? json_encode($request->languages) : null;
        $clientpostjob->tags = !empty($request->tags) ? json_encode($request->tags) : null;
        $clientpostjob->status = 1;
        $clientpostjob->user_id = auth()->user()->id;
        $clientpostjob->save();
        // dd($request->all());

        if ($request->has('tags')) {
            foreach ($request->input('tags') as $tagId) {
                $userTag = new UserTag();
                $userTag->user_id = auth()->user()->id;
                $userTag->tag_id = $tagId;
                $userTag->client_job_id = $clientpostjob->id;
                $userTag->save();
            }
        }

        if ($request->has('languages')) {
            foreach ($request->input('languages') as $languageId) {
                $userLanguage = new UserLanguage();
                $userLanguage->user_id = auth()->user()->id;
                $userLanguage->language_id = $languageId;
                $userLanguage->client_job_id = $clientpostjob->id;
                $userLanguage->save();
            }
        }

        if ($request->file("jobimage")) {
            foreach ($request->file('jobimage') as $image) {
                $userimage = new ImageGallery();
                $userimage->user_id = auth()->user()->id;
                $userimage->client_job_id = $clientpostjob->id;
                $userimage->guard_job_id = null;
                $userimage->ceremony = 1;
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $userimage->image = $imageName;
                $userimage->save();
            }
        }
        $notification = array('message' => 'Your Job Posted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function client_status(Request $request, $id)
    {
        // return "status";
        // return $id;
        $user_status = ClientPostJob::findOrFail($id);
        $newStatus = ($user_status->status == 0) ? 1 : 0;
        $user_status->status = $newStatus;
        $user_status->save();
        $notification = array('message' => 'Status Changed Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function clientjob_edit(Request $request)
    {
        // return ["response" => $request->id];
        // dd($request->all());
        $getTags = Tag::all();
        $getGuardType = GuardType::all();
        $getLanguage = Language::all();
        $getlocation = location::all();
        $getGuardType = GuardType::all();
        $getservice = service::all();
        $clientJobs = ClientPostJob::where('id', $request->id)->where('user_id', Auth::id())->with('get_guardtype')->with('client_location')->with('client_service')->first();


        $userTag = UserTag::where('client_job_id', $request->id)->with('guard_tags_details')->get();
        $userLanguage = UserLanguage::where('client_job_id', $request->id)->with('user_Language_details')->get();

        return response()->json([
            'html' => view('frontend.client_dashboard.client-job-edit', get_defined_vars())->with('clientJob', $clientJobs)->render()
        ]);
    }
    public function client_job_update(Request $request)
    {
        // dd($request->all());

        $id = $request->clientjob_id;
        $validatedData = $request->validate([
            'job_type' => ['required', 'string', 'max:255'],
            'job_duration' => ['nullable', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            // 'per_hour_rate' => ['required', 'numeric'],
            'starting_date' => ['required', 'date'],
            'per_hour_rate.*' => ['nullable', 'numeric'],
            // 'ending_date' => ['required', 'date', 'after_or_equal:starting_date'],
            'description' => ['required', 'string'],
        ]);

        $job = ClientPostJob::findOrFail($id);
        $job->job_type = $validatedData['job_type'];
        $job->job_duration = !empty($request->job_duration) ? $request->job_duration: null;
        $job->location = $validatedData['location'];
        $job->per_hour_rate = !empty($request->per_hour_rate) ? $request->per_hour_rate: null;
        $job->starting_date = $validatedData['starting_date'];
        // $job->ending_date = $validatedData['ending_date'];
        $job->ending_date = !empty($request->ending_date) ? $request->ending_date: null;
        $job->description = $validatedData['description'];
        $job->services = $request->services;
        $job->languages = !empty($request->languages) ? json_encode($request->languages) : null;
        $job->tags = !empty($request->tags) ? json_encode($request->tags) : null;
        $job->status = 1;
        $job->user_id = auth()->user()->id;
        $job->save();

        if ($request->file("jobimage")) {
            // dd($image);
            foreach ($request->file('jobimage') as $image) {
                $userimage = new ImageGallery();
                $userimage->user_id = auth()->user()->id;
                $userimage->client_job_id = $job->id;
                $userimage->ceremony = 1;
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $userimage->image = $imageName;
                $userimage->save();
            }
        }

        // dd($request->all());

        if ($request->has('tags')) {
            $requestedTags = $request->input('tags');
            $existingTags = UserTag::where('client_job_id', $job->id)->pluck('tag_id')->toArray();

            // Find tags that need to be deleted (existing tags that are not in the request)
            $tagsToDelete = array_diff($existingTags, $requestedTags);
            UserTag::where('client_job_id', $job->id)->whereIn('tag_id', $tagsToDelete)->delete();

            // Update existing tags and insert new tags
            foreach ($requestedTags as $tagId) {
                $userTag = UserTag::where('tag_id', $tagId)->where('client_job_id', $job->id)->first();

                if ($userTag) {
                    // If an existing record is found, update its fields
                    $userTag->user_id = auth()->user()->id;
                    // You may or may not update tag_id and client_job_id here depending on your needs
                    // For example, if you want to keep the existing tag_id and client_job_id, you can remove these two lines:
                    // $userTag->tag_id = $tagId;
                    // $userTag->client_job_id = $job->id;
                    $userTag->save();
                } else {
                    // If no existing record is found, create a new UserTag record
                    $newUserTag = new UserTag();
                    $newUserTag->user_id = auth()->user()->id;
                    $newUserTag->tag_id = $tagId;
                    $newUserTag->client_job_id = $job->id;
                    $newUserTag->save();
                }
            }
        }

        if ($request->has('languages')) {
            $requestedLanguages = $request->input('languages');
            $existingLanguages = UserLanguage::where('client_job_id', $job->id)->pluck('language_id')->toArray();

            // Find languages that need to be deleted (existing languages that are not in the request)
            $languagesToDelete = array_diff($existingLanguages, $requestedLanguages);
            UserLanguage::where('client_job_id', $job->id)->whereIn('language_id', $languagesToDelete)->delete();

            // Update existing languages and insert new languages
            foreach ($requestedLanguages as $languageId) {
                $userLanguage = UserLanguage::where('language_id', $languageId)->where('client_job_id', $job->id)->first();

                if ($userLanguage) {
                    // If an existing record is found, update its fields
                    $userLanguage->user_id = auth()->user()->id;
                    // You may or may not update language_id and client_job_id here depending on your needs
                    // For example, if you want to keep the existing language_id and client_job_id, you can remove these two lines:
                    // $userLanguage->language_id = $languageId;
                    // $userLanguage->client_job_id = $job->id;
                    $userLanguage->save();
                } else {
                    // If no existing record is found, create a new UserLanguage record
                    $newUserLanguage = new UserLanguage();
                    $newUserLanguage->user_id = auth()->user()->id;
                    $newUserLanguage->language_id = $languageId;
                    $newUserLanguage->client_job_id = $job->id;
                    $newUserLanguage->save();
                }
            }
        }


        $notification = array('message' => 'Your Post Job updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function client_delete($id)
    {
        // dd($id);
        $guard = ClientPostJob::findOrFail($id);
        $guard->delete();

        // $guardTag = UserTag::where('client_job_id', $id)->first();
        // $guardTag->delete();
        // $guardlanguages = UserLanguage::where('client_job_id', $id)->first();
        // $guardlanguages->delete();

        $notification = array('message' => 'Posted Job Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function clientjobimagedelete($id)
    {
        // dd($id);
        $portfolioImage = ImageGallery::findOrFail($id);
        Storage::delete($portfolioImage->image);
        $portfolioImage->delete();
        $notification = array('message' => 'Image deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function hire_Guard_info(Request $request)
    {
        // dd($request->all());

        $hireGuardiInfo = GuardJob::where('id', $request->id)->with('get_guardtype')->with('guard_location')->with('guard_service')->with('guard_job_details')->first();
        return response()->json([
            'html' => view('frontend.client_dashboard.hire-guard-info-modal')->with('info', $hireGuardiInfo)->render()
        ]);
    }

    public function store_hire_Guard_rating(Request $request)
    {

        // dd($request->all());
       // validate the user input
                $validatedData = $request->validate([
                    'guardjobid' => ['required', 'numeric'],
                    'rate' => ['required', 'numeric', 'in:1,2,3,4,5'],
                    'message' => ['required', 'string']
                ]);

                // update the guard job rating status
                $hireGuardiInfo = GuardJob::where('id', $validatedData['guardjobid'])->first();
                $hireGuardiInfo->rating_status = 1;
                $hireGuardiInfo->save();
                // create a new rating record
                $guardRating = new Rating();
                $guardRating->user_id = auth()->user()->id;
                $guardRating->guard_id = $hireGuardiInfo->user_id;
                $guardRating->guard_job_id = $validatedData['guardjobid'];
                $guardRating->rate = $validatedData['rate'];
                $guardRating->message = $validatedData['message'];
                $guardRating->save();
                $notification = array('message' => 'Guard Rated Successfully', 'alert-type' => 'success');
                return redirect()->back()->with($notification);

        // return response()->json([
        //     'html' => view('frontend.client_dashboard.hire-guard-info-modal')->with('info', $hireGuardiInfo)->render()
        // ]);
    }

    public function hire_companies_info(Request $request)
    {
        // dd($request->all());

        $hireCopmaniesInfo = ClientHiredCompany::where('id', $request->id)->with('guard_job_details.guard_location')
        ->first();
        // $hireGuardiInfo = GuardJob::where('id', $request->id)->with('get_guardtype')->with('guard_location')->with('guard_service')->with('guard_job_details')->first();
        return response()->json([
            'html' => view('frontend.client_dashboard.hire-companies-info-modal')->with('companyinfo', $hireCopmaniesInfo)->render()
        ]);
    }
    public function store_hire_Company_rating(Request $request)
    {

        // dd($request->all());
       // validate the user input
                $validatedData = $request->validate([
                    'guardCompanyid' => ['required', 'numeric'],
                    'rate' => ['required', 'numeric', 'in:1,2,3,4,5'],
                    'message' => ['required', 'string']
                ]);


                // create a new rating record
                $guardRating = new CompanyRating();
                $guardRating->client_id = auth()->user()->id;
                $guardRating->guard_id = $validatedData['guardCompanyid'];
                $guardRating->rate = $validatedData['rate'];
                $guardRating->message = $validatedData['message'];
                $guardRating->status = 1;
                $guardRating->save();
                $notification = array('message' => 'Company Rated Successfully', 'alert-type' => 'success');
                return redirect()->back()->with($notification);

        // return response()->json([
        //     'html' => view('frontend.client_dashboard.hire-guard-info-modal')->with('info', $hireGuardiInfo)->render()
        // ]);
    }
}
