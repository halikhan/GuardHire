<?php

namespace App\Http\Controllers\Frontend\guard;

use App\Models\Tag;
use App\Models\User;
use App\Models\UserTag;
use App\Models\GuardJob;
use App\Models\UserService;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use App\Models\UserLanguage;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\GuardCreditPoint;
use App\Models\packages;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuardController extends Controller
{
    public function guard_profile(Request $request)
    {


        // dd($request->all());
        $this->validate($request, [
            'description' => "required",
            // 'languages' => "required",
            // 'tags' => "required",
            'license_no' => "required",
            // 'slogan' => "required",
            'userlocation' => "required",
            'contact' => "required",
            'last_name' => "required",
            'name' => "required",
            'starting_rate' => "required",

            // 'image' => "file|mimes:jpg,jpeg,png,gif|max:1024",

        ]);

        // dd($request->all());
        $id = Auth::id();
        $cms = User::findOrFail($id);
        // dd($cms->id);
        $cms->name = $request->name;
        $cms->last_name = $request->last_name;
        $cms->status = 1;
        $cms->type = 2;
        $cms->companyname = $request->companyname;
        $cms->starting_rate = $request->starting_rate;
        $cms->userlocation = $request->userlocation;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->slogan = $request->slogan;
        $cms->license_no = $request->license_no;
        $cms->description = $request->description;
        $cms->language_id = !empty($request->languages) ? json_encode($request->languages) : null;
        $cms->tag_id = !empty($request->tags) ? json_encode($request->tags) : null;
        if (!$request->file("image")) {
            $cms->image = $request->old_image;
        } else {
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
                $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $cms->image = $imageName;
            }
        }
        $cms->save();
        $notification = array('message' => 'Your Profile Updated Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);

    }

    public function job_store(Request $request)
    {

        // dd($request->all());
        $totalCreditsPurchased = PaymentDetail::where('user_id', Auth::id())->sum('total_credit_points');
        $guardPaymentDetail = PaymentDetail::where('user_id', Auth::id())->latest()->first();
        $listingCount = GuardJob::where('user_id', Auth::id())->sum('listing_points');
        $totalCreditPoints = GuardCreditPoint::where('guard_id', Auth::id())->sum('credit_points');
        // $totalCreditsPurchased = $guardPaymentDetail->total_credit_points;

        // Assuming 2 credits used in GuardJob table
        $creditsUsedInGuardJob = $listingCount;
        // Assuming 5 credits used in GuardCreditPoint table
        $creditsUsedInGuardCreditPoint = $totalCreditPoints;
        $totalCreditsUsed = $creditsUsedInGuardJob + $creditsUsedInGuardCreditPoint;
        $remainingCredits = $totalCreditsPurchased - $totalCreditsUsed;

        // dd($remainingCredits);
        if ($remainingCredits >= 2) {
            // dd('you have more then 2');
            $request->validate([
                'job_type' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                // 'job_duration' => ['required', 'string', 'max:255'],
                'location' => ['required', 'exists:locations,id'],
                // 'per_hour_rate' => ['required', 'numeric', 'min:0'],
                'services.*' => ['nullable', 'exists:services,id'],
                'tags.*' => ['nullable', 'exists:tags,id'],
                'languages.*' => ['nullable', 'exists:languages,id'],
                // 'status' => ['required', Rule::in(['active', 'inactive'])]
            ]);

            $guardJob = new GuardJob();
            $guardJob->companyname = Auth::user()->companyname;
            $guardJob->job_type = $request->input('job_type');
            $guardJob->job_duration = $request->input('job_duration');
            $guardJob->location_id = $request->input('location');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->per_hour_rate = $request->input('per_hour_rate');
            $guardJob->services = $request->input('services');
            $guardJob->description = $request->description;
            $guardJob->languages = json_encode($request->languages);
            $guardJob->tags = json_encode($request->tags);
            $guardJob->status = 1;
            // $guardJob->listing_points = 2;
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
            if ($request->has('tags')) {
                foreach ($request->input('tags') as $tagId) {
                    $userTag = new UserTag();
                    $userTag->user_id = auth()->user()->id;
                    $userTag->tag_id = $tagId;
                    $userTag->guard_job_id = $guardJob->id;
                    $userTag->save();
                }
            }

            if ($request->has('languages')) {
                foreach ($request->input('languages') as $languageId) {
                    $userLanguage = new UserLanguage();
                    $userLanguage->user_id = auth()->user()->id;
                    $userLanguage->language_id = $languageId;
                    $userLanguage->guard_job_id = $guardJob->id;
                    $userLanguage->save();
                }
            }

            //    GuardCreditPoint::create([
            //         'guard_id' => Auth::id(),
            //         'credit_points' => $get_package->listing_points,
            //         'client_id' => Auth::id(),
            //         'client_job_id' => $guardJob->id,
            //     ]);

            // if ($request->has('location')) {
            //     foreach ($request->input('location') as $languageId) {
            //         $userLanguage = new UserLocation();
            //         $userLanguage->user_id = auth()->user()->id;
            //         $userLanguage->locations = $languageId;
            //         $userLanguage->guard_job_id = $guardJob->id;
            //         $userLanguage->save();
            //     }
            // }

            $notification = array('message' => 'Your Job Added Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('message' => 'You dont have credit to post job!', 'alert-type' => 'error');
            return redirect()->route('our.packages')->with($notification);
        }

    }

    public function guard_status(Request $request, $id)
    {
        // return "status";
        // return $id;
        $user_status = GuardJob::findOrFail($id);
        $newStatus = ($user_status->status == 0) ? 1 : 0;
        $user_status->status = $newStatus;
        $user_status->save();

        // if($newStatus == 1){
        //     $user = User::where('id',$id)->first();
        //     $data = [
        //         'name' => $user->name,
        //         'email' => $user->email,
        //         'password' => $user->show_password
        //     ];
        //     $emailToSend = $user->email;
        //     Mail::send('website.vendormail.credentials', ['data' => $data],
        //     function ($message) use ($emailToSend)
        //     {
        //         $message
        //             ->to($emailToSend)->subject('Credentials');
        //     });
        // }
        $notification = array('message' => 'Status Changed Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function guard_delete($id)
    {
        $guard = GuardJob::findOrFail($id);
        $guard->delete();

        // Delete tags associated with the guard
        $guardTag = UserTag::where('guard_job_id', $id)->first();
        $guardTag->delete();

        // Delete languages associated with the guard
        $guardlanguages = UserLanguage::where('guard_job_id', $id)->first();
        // Delete the guard
        $guardlanguages->delete();

        $notification = array('message' => 'Job Deleted Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
