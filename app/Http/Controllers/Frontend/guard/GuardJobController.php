<?php

namespace App\Http\Controllers\Frontend\guard;

use App\Models\Tag;
use App\Models\service;
use App\Models\UserTag;
use App\Models\GuardJob;
use App\Models\Language;
use App\Models\location;
use App\Models\GuardType;
use App\Models\ImageGallery;
use App\Models\UserLanguage;
use Illuminate\Http\Request;
use App\Models\ClientPostJob;
use App\Models\PortfolioImage;
use App\Http\Controllers\Controller;
use App\Models\ClientRatingByGuard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuardJobController extends Controller
{

    public function job_edit(Request $request)
    {
        // return ["response" => $request->all()];
        // dd($request->all());

        $getlocation = location::all();
        $getGuardType = GuardType::all();
        $getservice = service::all();
        $getLanguage = Language::all();
        $getTags = Tag::all();
        $clientJobRates = ClientPostJob::all();
        $getGuardType = GuardType::all();
        $guardJob = GuardJob::where('id', $request->id)->with('get_guardtype')->with('guard_location')->with('guard_service')->first();
        $userLanguage = UserLanguage::where('guard_job_id', $request->id)->get();
        $userTag = UserTag::where('guard_job_id', $request->id)->get();
        // $userPortfolioImage = PortfolioImage::where('user_id', $request->user_id)->get();
        //  $getClientInformation = ClientPostJob::with('client_postjob_details')->get();
        //  $editguardjob = GuardJob::find($request->id)->first();

        return response()->json([
            'html' => view('frontend.guard_dashboard.guard-job-modal', get_defined_vars())->render()
        ]);

    }

    public function job_update(Request $request)
    {

        // dd($request->all());

        $id = $request->guardjob_id;
        $request->validate([
            'job_type' => ['required', 'string', 'max:255'],
            'companyname' => ['required', 'string', 'max:255'],
            // 'job_duration' => ['required', 'string', 'max:255'],
            'job_duration' => 'nullable|string',
            'location' => ['required', 'exists:locations,id'],
            'per_hour_rate' => 'nullable|string',
            'services.*' => ['nullable', 'exists:services,id'],
            'tags.*' => ['nullable', 'exists:tags,id'],
            'languages.*' => ['nullable', 'exists:languages,id'],
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // 'status' => ['required', Rule::in(['active', 'inactive'])]
        ]);
        // dd($request->all());

        $guardJob = GuardJob::where('id', $id)->first();
        // $guardJob = GuardJob::findOrFail($id);
        $guardJob->job_type = $request->input('job_type');
        $guardJob->companyname = $request->input('companyname');
        $guardJob->job_duration = $request->input('job_duration', null);
        $guardJob->location_id = $request->input('location');
        $guardJob->per_hour_rate = $request->input('per_hour_rate', null);
        $guardJob->services = $request->input('services');
        $guardJob->languages = json_encode($request->languages);
        $guardJob->tags = json_encode($request->tags);
        $guardJob->status = 1;
        $guardJob->user_id = auth()->user()->id;
        $guardJob->save();

        if ($request->file("jobimage")) {
            // dd($image);
            foreach ($request->file('jobimage') as $image) {
                    $userTag = new ImageGallery();
                    $userTag->user_id = auth()->user()->id;
                    $userTag->guard_job_id = $guardJob->id;
                    $userTag->ceremony = 1;
                    $imageName = $image->getClientOriginalName();
                    $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                    $userTag->image = $imageName;
                    $userTag->save();
                }
        }
        // $images = [];
        // if($request->hasfile('job_image'))
        //  {
        //     foreach($request->file('job_image') as $file)
        //     {
        //         $name = time().rand(1,100).'.'.$file->extension();
        //         $file->move(public_path('storage/uploads/cms/'), $name);
        //         $images[] = $name;
        //     }
        // }
        // $file= new ImageGallery();
        // $file->guard_job_id =  $guardJob->id;
        // $file->user_id = auth()->user()->id;
        // $file->ceremony = 1;
        // $file->image = json_encode($images);
        // $file->save();

        if ($request->has('tags')) {
            foreach ($request->input('tags') as $tagId) {
                UserTag::updateOrCreate(
                    [
                        'guard_job_id' => $request->guardjob_id,
                        'user_id' => auth()->user()->id,
                        'tag_id' => $tagId,
                    ],
                    [
                        'user_id' => auth()->user()->id,
                        'tag_id' => $tagId,
                        'guard_job_id' => $request->guardjob_id,
                    ]
                );
            }
        }

        if ($request->has('tags')) {
            $requestedTags = $request->input('tags');
            $existingTags = UserTag::where('guard_job_id', $guardJob->id)->pluck('tag_id')->toArray();

            // Find tags that need to be deleted (existing tags that are not in the request)
            $tagsToDelete = array_diff($existingTags, $requestedTags);
            UserTag::where('guard_job_id', $guardJob->id)->whereIn('tag_id', $tagsToDelete)->delete();

            // Update existing tags and insert new tags
            foreach ($requestedTags as $tagId) {
                $userTag = UserTag::where('tag_id', $tagId)->where('guard_job_id', $guardJob->id)->first();

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
                    $newUserTag->guard_job_id = $guardJob->id;
                    $newUserTag->save();
                }
            }
        }

        if ($request->has('languages')) {
            $requestedLanguages = $request->input('languages');
            $existingLanguages = UserLanguage::where('guard_job_id', $guardJob->id)->pluck('language_id')->toArray();

            // Find languages that need to be deleted (existing languages that are not in the request)
            $languagesToDelete = array_diff($existingLanguages, $requestedLanguages);
            UserLanguage::where('guard_job_id', $guardJob->id)->whereIn('language_id', $languagesToDelete)->delete();

            // Update existing languages and insert new languages
            foreach ($requestedLanguages as $languageId) {
                $userLanguage = UserLanguage::where('language_id', $languageId)->where('guard_job_id', $guardJob->id)->first();

                if ($userLanguage) {
                    // If an existing record is found, update its fields
                    $userLanguage->user_id = auth()->user()->id;
                    // You may or may not update language_id and client_job_id here depending on your needs
                    // For example, if you want to keep the existing language_id and client_job_id, you can remove these two lines:
                    // $userLanguage->language_id = $languageId;
                    // $userLanguage->guard_job_id = $guardJob->id;
                    $userLanguage->save();
                } else {
                    // If no existing record is found, create a new UserLanguage record
                    $newUserLanguage = new UserLanguage();
                    $newUserLanguage->user_id = auth()->user()->id;
                    $newUserLanguage->language_id = $languageId;
                    $newUserLanguage->guard_job_id = $guardJob->id;
                    $newUserLanguage->save();
                }
            }
        }

        $notification = array('message' => 'Your Job Updated Successfully', 'alert-type' => 'success');
        return back()->with($notification);
    }

    public function jobimagedelete($id){
            // dd($id);
            $portfolioImage = ImageGallery::findOrFail($id);
            Storage::delete($portfolioImage->image);
            $portfolioImage->delete();
            $notification = array('message' => 'Image deleted Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
    }

    public function client_info_edit(Request $request){
            // dd($request->all());
         $clientjob = ClientPostJob::where('id', $request->id)->with('get_guardtype')->with('client_postjob_details')->first();

        return response()->json([
            'html' => view('frontend.guard_dashboard.client-info-modal', get_defined_vars())->render()
        ]);

    }

    public function client_comment_modal(Request $request){
        // dd($request->all());
     $clientjob = ClientPostJob::where('id', $request->id)->with('get_guardtype')->with('client_postjob_details')->first();

    return response()->json([
        'html' => view('frontend.guard_dashboard.client-comment-modal', get_defined_vars())->render()
    ]);

    }


    public function store_hire_client_rating(Request $request)
    {

            // dd($request->all());
        // validate the user input
        $validatedData = $request->validate([
            'client_id' => ['required', 'numeric'],
            'rate' => ['required', 'numeric', 'in:1,2,3,4,5'],
            'message' => ['required', 'string']
        ]);
        // create a new rating record
        $guardRating = new ClientRatingByGuard();
        $guardRating->guard_id = Auth::id();
        $guardRating->client_id = $validatedData['client_id'];
        $guardRating->rate = $validatedData['rate'];
        $guardRating->message = $validatedData['message'];
        $guardRating->status = 1;
        $guardRating->save();
        $notification = array('message' => 'Client Rated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
