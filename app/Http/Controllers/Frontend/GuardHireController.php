<?php

namespace App\Http\Controllers\Frontend;


use App\Models\cms;
use App\Models\FAQ;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Config;
use App\Models\Rating;
use App\Models\Inquiry;
use App\Models\service;
use App\Models\UserTag;
use App\Models\GuardJob;
use App\Models\Language;
use App\Models\location;
use App\Models\packages;
use App\Models\Wishlist;
use App\Models\GuardType;
use App\Models\Subcription;
use App\Models\testimonial;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use App\Models\UserLanguage;
use App\Models\UserLocation;
use Illuminate\Http\Request;
use App\Models\ClientPostJob;
use App\Models\PaymentDetail;
use App\Models\PrivacyPolicy;
use App\Models\PortfolioImage;
use App\Models\TermsCondition;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ClientHiredCompany;
use App\Models\ClientHiredListingService;
use App\Models\ClientRatingByGuard;
use App\Models\CompanyRating;
use App\Models\CompanyWishlist;
use App\Models\GuardCreditPoint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class GuardHireController extends Controller
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
        $getPackages = packages::all();
        view::share(get_defined_vars());
    }
    public function index()
    {
        // dd($request->all());

        $section1 = cms::where('page', '1')->where('section_name', 'section-one')->first();
        $section2 = cms::where('page', '1')->where('section_name', 'section-two')->first();
        $section3 = cms::where('page', '1')->where('section_name', 'section-three')->first();
        $section4 = cms::where('page', '1')->where('section_name', 'section-four')->first();
        $section5 = cms::where('page', '1')->where('section_name', 'section-five')->first();
        $section6 = cms::where('page', '1')->where('section_name', 'section-six')->first();
        $section7 = cms::where('page', '1')->where('section_name', 'section-seven')->first();
        $section8 = cms::where('page', '1')->where('section_name', 'section-eight')->first();
        $section9 = cms::where('page', '1')->where('section_name', 'section-nine')->first();
        $section10 = cms::where('page', '1')->where('section_name', 'section-howitworks-quotes')->first();
        //  dd($section10);
        $blogsection = Blog::latest()->take(3)->get();
        $dummuText = Config::where('id', '2')->first();
        $banners = testimonial::where('id', '1')->first();
        $getPackages = packages::all();
        // $getGuardType = GuardType::all();
        $getArmedSecurity = testimonial::find(15);
        $getGroupSecurity = testimonial::find(16);
        $getUnarmedSecurity = testimonial::find(17);
         $getClientJobs = ClientPostJob::where('status', '1')->with('client_postjob_details')->with('client_location','get_user_images','get_guardtype','get_client_tags')->take(4)->orderBy('id','desc')->get();
        // $getBrowseCompanies = GuardJob::where('status', '1')->with('guard_job_details')->with('get_guard_tags.guard_tags_details')->with('guard_ratings')->take(6)->orderBy('id','desc')->get();
         $getBrowseCompanies = User::where('status', '1')
        ->where('type', 2)->with('get_guardjobs','guard_location','guard_service','guard_ratings')->get();
        return view('frontend.index', get_defined_vars());

    }

    public function how_it_works()
    {
        // $banners = testimonial::where('id', '2')->first();
        $sectionhowitworks = cms::where('page', '2')->where('section_name', 'section-howitworks')->first();
        $names_of_faqs = cms::find(19);
        $general_faqs = FAQ::where('type',1)->get();
        $client_faqs = FAQ::where('type',2)->get();
        $guard_faqs = FAQ::where('type',3)->get();
        // $faqs = FAQ::all();
        $banners = testimonial::where('id', '2')->first();
        $bannersfaqs = testimonial::where('id', '14')->first();
        return view('frontend.how-it-works', get_defined_vars());

    }

    public function browse_services()
    {
        $sectionBrowseServices = cms::where('page', '3')->where('section_name', 'section-BrowseServices')->first();
        $banners = testimonial::where('id', '3')->first();
         $getBrowseServices = GuardJob::with('guard_job_details','brwose_listing_tags','hired_Listing_Service')->with('guard_service','guard_location')->with('guard_ratings')->latest()
        ->get();
        return view('frontend.browse-services', get_defined_vars());

        // if (Auth::check()) {
        //     return view('frontend.browse-services', get_defined_vars());
        // } else {
        //     $notification = array('message' => 'Please login first', 'alert-type' => 'error');
        //     return redirect()->back()->with($notification);
        // }
    }
    public function group_security($id)
    {

        $sectiongroup_security = cms::where('page', '9')->where('section_name', 'Group-security')->first();
        $banners = testimonial::where('id', '12')->first();
        $getGuardBrowseServices = GuardJob::where('id', $id)->with('guard_job_details')->with('guard_service')->first();
        $getGuardPortfolioImage = PortfolioImage::where('user_id', $getGuardBrowseServices->user_id)->get();

        // ClientHiredListingService::updateOrCreate(
        //     [
        //         'client_id' => Auth::id(),
        //         'guard_id' => $getGuardBrowseServices->user_id,
        //         'listing_id' => $id
        //     ],
        //     ['status' => 1]
        // );
        $clientHiredListingService = ClientHiredListingService::firstOrCreate([
            'client_id' => Auth::id(),
            'guard_id' => $getGuardBrowseServices->user_id,
            'listing_id' => $id
        ], ['status' => 1]);

        if ($clientHiredListingService->wasRecentlyCreated) {
            // New record was created, display the success message
            $notification = array('message' => 'Service hired successfully.', 'alert-type' => 'success');
            session()->flash('notification', $notification);
            return view('frontend.group-security', get_defined_vars());
        } else {
            return view('frontend.group-security', get_defined_vars());
        }

    }

    public function our_packages(){

        $sectionBrowseQuotes = cms::where('page', '1')->where('section_name', 'section-five')->first();
        $getPackages = packages::all();
        return view('frontend.our-packages', get_defined_vars());

    }
    public function browse_quotes()
    {

        $sectionBrowseQuotes = cms::where('page', '4')->where('section_name', 'section-BrowseQuotes')->first();
        $banners = testimonial::where('id', '6')->first();
         $getClientJobs = ClientPostJob::where('status', '1')->with('get_user_languages.user_Language_details','client_postjob_details','get_client_tags','client_location', 'get_user_images', 'get_guardtype')->with('guard_credit_pts')->get();
        $guard_total_credit_points = PaymentDetail::where('user_id', Auth::id())->sum('total_credit_points');
        $guard_total_listing_points = GuardJob::where('user_id', Auth::id())->sum('listing_points');
        $guard_total_new_message_points = GuardCreditPoint::where('guard_id', Auth::id())->sum('credit_points');
        $total_usedpoints = $guard_total_listing_points + $guard_total_new_message_points;
        $final_remain_points = $guard_total_credit_points - $total_usedpoints;
        // dd($final_remain_points);
        $getPackages = packages::all();

        return view('frontend.browse-quotes', get_defined_vars());

    }

    public function payment(Request $request)
    {

        // dd($request->id);
        session()->put('package_id', $request->id);
        if (session()->has('package_id')) {
            $package = packages::find($request->id);
            return response()->json([
                'status' => 200,
                'title' => $package->title,
                'amount' => $package->amount,
            ]);
        } else {
            return response()->json([
                'status' => 400
            ]);
        }
    }
    public function get_client_job_id(Request $request)
    {

        // dd($request->id);
        // $boughtuser = PaymentDetail::where('user_id', Auth::id())->where('client_job_id', $request->id)->first();
        // if($boughtuser){
        // }
        session()->put('client_job_id', $request->id);
        if (session()->has('client_job_id')) {
            return response()->json([
                'status' => 200,

            ]);
        } else {
            return response()->json([
                'status' => 400
            ]);
        }
    }
    public function confirm_user_credits(Request $request)
    {
        $creditsAvailable = PaymentDetail::where('user_id', Auth::id())->sum('total_credit_points');

        if ($creditsAvailable >= 5) {
            // User has more than or equal to 5 credits
            return response()->json(['credits' => $creditsAvailable], 200);
        } else {
            // User has insufficient credits
            return response()->json(['credits' => $creditsAvailable], 400);
        }
    }
    public function credit_client_job_details(Request $request)
    {

        // $creditsAvailable = PaymentDetail::where('user_id', Auth::id())->count('total_credit_points');
        //     if ($creditsAvailable >= 5) {
        $getClientJobs = ClientPostJob::where('id', $request->id)->first();
        // dd($getClientJobs);
        session()->put('client_job_id', $request->id);
        if (session()->has('client_job_id')) {
            $totalPoints = GuardCreditPoint::create([
                'guard_id' => Auth::id(),
                'credit_points' => 5,
                'client_id' => $getClientJobs->user_id,
                'client_job_id' => $request->id,
            ]);
            $id = $totalPoints->client_job_id;
            //        $notification = array('message' => 'You have Successfully connected!.' ,'alert-type' => 'error');
            // return redirect()->route('body.guard.event', $id)->with($notification);
            return response()->json([
                'status' => 200,
                'redirect' => route('body.guard.event', $id),
            ]);
        } else {
            return response()->json([
                'status' => 400
            ]);
        }
        // } else
        // {
        //     // return Redirect::back()->withErrors(['You need at least five credits to proceed.']);
        //     $notification = array('message' => 'You need at least five credits to proceed.' ,'alert-type' => 'error');
        //     return redirect()->back()->with($notification);
        // }
    }
    public function stripe_payment_page(Request $request, $slug)
    {
        $stripe_paymentPackage = packages::where('slug', $slug)->first();
        $package = packages::find($stripe_paymentPackage->id);
        session()->put('package_id', $package->id);

        // dd($package->id);
        return view('frontend.stripe-payments', get_defined_vars());
    }

    public function store_user_payment(Request $request)
    {
        // dd($request->all());
        // client_job_id
        $get_package = packages::find(session()->get('package_id'));
        $get_ClientPostJob = ClientPostJob::find(session()->get('client_job_id'));
        // dd($get_package);
        // dd(session()->get('checkout_response'));
        $tota_points = PaymentDetail::create([

            'user_id' => Auth::id(),
            'package_title' => $get_package->title,
            'package_amount' => $get_package->amount,
            'msg_points' => $get_package->deatails,
            'listing_points' => $get_package->mid_details,
            'total_credit_points' => $get_package->type,
            'package_type' => $get_package->type,
            'stripe_response' => session()->get('checkout_response'),
        ]);

        // dd($get_ClientPostJob);
        if($get_ClientPostJob != null){
            $tota_points = GuardCreditPoint::create([

                'guard_id' => Auth::id(),
                'credit_points' => $get_package->deatails,
                'client_id' => $get_ClientPostJob->user_id,
                'client_job_id' => $get_ClientPostJob->id,
            ]);
        }

        // $user = User::find(Auth::id());
        // $user->total_credit_points +=  $tota_points->credit_points;
        // $user->save();
        // session()->forget('package_id');

        session()->forget('checkout_response');
        session()->forget('client_job_id');

        $id = $tota_points->client_job_id;
        if($get_ClientPostJob){

            $notification = array('message' => 'You have Successfully connected!.', 'alert-type' => 'success');
            return redirect()->route('body.guard.event', $id)->with($notification);
        }else{
            $notification = array('message' => 'You have Successfully bought package!.', 'alert-type' => 'success');
            return redirect()->route('guard.dashboard')->with($notification);
        }

        // return response()->json([
        //     'status' => 200,
        //     'redirect' => route('body.guard.event', $id),
        // ]);
    }

    public function body_guard_event($id)
    {
        $sectionbodyguardEvent = cms::where('page', '7')->where('section_name', 'bodyguard')->first();
        $banners = testimonial::where('id', '11')->first();
        $getclientQuote = ClientPostJob::where('status', '1')->where('id', $id)->with('client_postjob_details')->with('get_guardtype')->first();
        $getclientimage = ImageGallery::where('client_job_id', $getclientQuote->id)->get();
        //  return $getclientimage[0]['image'];
        return view('frontend.body-guard-event', get_defined_vars());

    }

    public function pay_amount(Request $request)
    {
        $package = packages::find(session()->get('package_id'));
        return view('frontend.payment', get_defined_vars());
    }

    public function update_guard_payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $packageSubs = PaymentDetail::where('user_id', Auth::id())->orderBy('id', 'desc')->first();
        if ($packageSubs) {
            if (empty($response)) {
                $response = $provider->cancelSubscription(json_decode($packageSubs->paypal_response)->subscriptionID, 'Update the vendor plan');
            }
            $get_package = packages::find(session()->get('package_id'));
            PaymentDetail::create([
                'user_id' => Auth::id(),
                'package_title' => $get_package->title,
                'package_amount' => $get_package->amount,
                'paypal_response' => json_encode($request->all()),
            ]);
        } else {
            $get_package = packages::find(session()->get('package_id'));
            PaymentDetail::updateOrCreate(
                [
                    'user_id'   => Auth::id(),

                ],
                [
                    'user_id' => Auth::id(),
                    'package_title' => $get_package->title,
                    'package_amount' => $get_package->amount,
                    'paypal_response' => json_encode($request->all()),
                ],
            );
        }
        session()->forget('package_id');
        return response()->json([
            'status' => 200
        ]);
    }

    public function browse_companies()
    {

        $sectionBrowseCompanies = cms::where('page', '5')->where('section_name', 'section-BrowseCompanies')->first();
        $banners = testimonial::where('id', '7')->first();
        // return $getGuardRating = Rating::avg('ratings')->get();
        // return $getBrowseCompanies = GuardJob::where('status', '1')->with('guard_job_details')->with('get_guard_tags.guard_tags_details')->with('guard_ratings')->get();

         $getBrowseCompanies = User::where('status', '1')
        ->where('type', 2)->with('get_guardjobs','guard_location','guard_service','get_guard_tags.guard_tags_details','guard_ratings')->get();

        // $averageRatings = [];
        // foreach ($getBrowseCompanies as $user) {
        //     $averageRating = $user->getAverageRating();
        //     $averageRatings[] = $averageRating;
        // }
        // dd($averageRatings);
        // return $averageRating = $getBrowseCompanies->getAverageRating();
        return view('frontend.browse-companies', get_defined_vars());

    }
    public function company($id)
    {
        $banners = testimonial::where('id', '10')->first();
        $sectioncompany = cms::where('page', '8')->where('section_name', 'company')->first();
        $getGuardcompany = User::where('status', '1')->where('id', $id)->with('get_guard_tags.guard_tags_details','get_guardjobs','guard_location')->with('guard_service')->first();
        $getGuardPortfolioImage = PortfolioImage::where('user_id', $id)->get();
        $guardCompanyRating = CompanyRating::where('guard_id', $id)->with('get_rated_client_name','get_guard_name')->get();

        $clientHiredCompany = ClientHiredCompany::firstOrCreate(
            [
                'client_id' => Auth::id(),
                'company_id' => $id],
            ['status' => 1]
        );
        if ($clientHiredCompany->wasRecentlyCreated) {
            // New record was created, display the success message
            $notification = array('message' => 'Company hired successfully.', 'alert-type' => 'success');
            session()->flash('notification', $notification);
            return view('frontend.company',  get_defined_vars());
        } else {
            return view('frontend.company',  get_defined_vars());
        }

    }
    public function blogs()
    {

        $sectionBlogs = cms::where('page', '6')->where('section_name', 'section-blogs')->first();
        $blogsection = Blog::all();
        $banners = testimonial::where('id', '8')->first();

        return view('frontend.blogs', get_defined_vars());
    }
    public function inner_blog($slug)
    {
        $blogdetails = Blog::where('slug', $slug)->first();
        $banners = testimonial::where('id', '13')->first();

        return view('frontend.inner-blog', get_defined_vars());
    }
    public function terms_conditions()
    {
        $terms = TermsCondition::first();
        return view('frontend.terms-conditions', get_defined_vars());
    }
    public function privacy_policy()
    {
        $privacy = PrivacyPolicy::first();

        return view('frontend.privacy-policy', get_defined_vars());
    }
    public function frontend_signin()
    {

        return view('frontend.sign-in', get_defined_vars());
    }

    public function frontend_signup()
    {
        $getlocation = location::all();
        return view('frontend.sign-up', get_defined_vars());
    }
    public function forgetPassword()
    {
        return view('frontend.forget-password');
    }
    public function getPassword($token)
    {
        return view('frontend.update_password', ['token' => $token]);
    }
    public function forgetPasswordProcess(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'required|email|exists:users',
        ]);
        $user_check = User::where('email', $request->email)->first();
        if ($user_check->status == 0) {
            $notification = array('message' => 'Your Account is not active! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {

            $token = Str::random(64);
            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );
            $data = [
                'name' => $user_check->name,
                'email' => $request->email
            ];

            $emailToSend = $request->email;

            Mail::send(
                'website.forgetemail.reset',
                ['token' => $token, 'data' => $data],
                function ($message) use ($emailToSend) {
                    $message
                        ->to($emailToSend)->subject('Reset Password');
                    $message->from('fredaston49@gmail.com', 'Guard Hire');
                }
            );
        }
        $notification = array('message' => 'We have emailed you password reset link! ', 'alert-type' => 'success');
        return redirect()->route('forget-password')->with($notification);
    }
    public function updateforgetpassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();
        if (!$updatePassword)
            return back()->with('token', 'Invalid token!');
        User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password),
                'show_password' => $request->password
            ]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        $notification = array('message' => 'Password Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }
    public function guard_dashboard()
    {

        // dd('guard_dashboard');
        $getTags = Tag::all();
        $guardJobs = GuardJob::where('user_id', Auth::id())->with('get_guardtype')->with('guard_location')->with('guard_service')->latest()->get();
        //  $getGuardTags = Tag::where('user_id', Auth::id())->first();
        $guardJobsRating = Rating::where('guard_id', Auth::id())->with('ratings')->with('get_rated_client_name')->get();
        $guardCompanyRating = CompanyRating::where('guard_id', Auth::id())->with('get_rated_client_name')->get();
        $getlocation = location::all();

        // dd($guardPaymentDetail);
        $userLanguage = UserLanguage::where('user_id', Auth::id())->with('user_Language_details')->get();
        $userTag = UserTag::where('user_id', Auth::id())->with('guard_tags_details')->get();
        $userPortfolioImage = PortfolioImage::where('user_id', Auth::id())->get();
        $getClientInformation = ClientPostJob::with('client_postjob_details', 'guard_credit_pts')->get();
        //   $getClientInformation = GuardCreditPoint::where('guard_id', Auth::id())->get();
        $guard_total_credit_points = PaymentDetail::where('user_id', Auth::id())->sum('total_credit_points');
        // dd($getClientJobs);

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

        return view('frontend.guard_dashboard.guard-dashboard', get_defined_vars());
    }
    public function client_dashboard()
    {

        // dd('guard_dashboard');
        $getTags = Tag::all();
        $getlocation = location::all();
        //    $getClientHiredListingService->listing_id
        $getGuardType = GuardType::all();
        $userTag = UserTag::where('user_id', Auth::id())->with('guard_tags_details')->get();
        $userLanguage = UserLanguage::where('user_id', Auth::id())->with('user_Language_details')->get();
        //  $hireGuardiInfo = GuardJob::with('get_guardtype','guard_location','guard_service','guard_job_details','hired_Listing_Service')->latest()->get();

         $clientRating = ClientRatingByGuard::where('client_id', Auth::id())->with('get_rated_client_name')->get();

        $getClientHiredListingService = ClientHiredListingService::where('client_id', Auth::id())->get();
        $listingIds = $getClientHiredListingService->pluck('listing_id');
        // ==== This to Get Guard All posted link details which has hired by client

         $hireGuardiInfo = GuardJob::with('get_guardtype', 'guard_location', 'guard_service', 'guard_job_details', 'hired_Listing_Service')
            ->whereHas('hired_Listing_Service', function ($query) use ($listingIds) {
                $query->whereIn('listing_id', $listingIds);
            })
            ->where('status', 1)
            ->get();

        // ==== This to Get all Companies

         $hireCopmaniesInfo = ClientHiredCompany::where('client_id', Auth::id())->with('guard_job_details.guard_location')
        ->latest()
        ->get();

        $clientJobs = ClientPostJob::where('user_id', Auth::id())->with('get_guardtype')->with('client_location')->with('client_service')->latest()->get();
        // $clientJobs = ClientPostJob::where('user_id', Auth::id())->with('client_location')->get();

        //   $clientwishlists = Wishlist::where('user_id', auth()->user()->id)->with('guard_job_details','guard_job')->get();

         $clientwishlists = Wishlist::whereStatus(1)->where('user_id',Auth::id())
          ->with('guard_job_details', 'guard_job')
          ->get();
           $companyWishlists = CompanyWishlist::whereStatus(1)->where('user_id',Auth::id())
          ->with('guard_job_details')
          ->get();
            //   dd($clientwishlists);
          // return $clientwishlists->job_id;
        return view('frontend.client_dashboard.client-dashboard', get_defined_vars());

    }
    public function user_subcription(Request $request)
    {

        session()->put('email', $request->email);
        $this->validate($request, [
            'email' => "required|email|unique:subcriptions",
        ]);
        $cms = new Subcription();
        $cms->email = $request->email;
        $cms->save();
        // $token = sha1(uniqid(time(), true));
        // $emailToSend = $request->email;
        // Mail::send('website.subscriptionmail.subscription',[
        //     'data' => route('user_subcription', ['token' => $token])
        // ], function ($messages) use ($emailToSend) {
        //     $messages->to($emailToSend);
        //     $messages->replyTo('no-reply@designprosmy.com', 'Designprosmy');
        //     $messages->subject('Subscription');
        // });
        $notification = array('message' => 'Your have subscribed, Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function contact_process(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'message' => "required|max:255",
            'contact' => "required|max:255",
            'email' => "required",
            // 'email' => "required|email|inquiries:users",
            'name' => "required|max:255",
            // 'type' => "required",
        ]);
        // dd($request->all());

        $cms = new Inquiry();
        $cms->name = $request->name;
        $cms->email = $request->email;
        $cms->contact = $request->contact;
        $cms->user_id = Auth::id();
        $cms->message = $request->message;
        $cms->save();
        $notification = array('message' => 'Your request submited Successfully ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
