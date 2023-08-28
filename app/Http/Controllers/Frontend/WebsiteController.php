<?php

namespace App\Http\Controllers\Frontend;

use App\Models\cms;
use App\Models\Blog;
use App\Models\User;
use App\Models\Config;
use App\Models\Rating;
use App\Models\Inquiry;
use App\Models\service;
use App\Models\wedding;
use App\Models\location;
use App\Models\packages;
use App\Models\BookVendor;
use App\Models\Sociallink;
use App\Models\AboutVendor;
use App\Models\Subcription;
use App\Models\testimonial;
use App\Models\UserService;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use App\Models\UserLocation;
use App\Models\VendorSocial;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;
use App\Models\PaymentDetail;
use App\Models\PrivacyPolicy;
use App\Models\VendorContact;
use App\Models\TermsCondition;
use Illuminate\Support\Carbon;
use App\Models\EventManagement;
use function PHPSTORM_META\type;
use App\Models\ContactManagement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\PasswordReset;




class WebsiteController extends Controller
{
    public function boot()
    {
        Paginator::useBootstrap();
    }
    public function __construct()
    {
        $facebook = Sociallink::where('type', '1')->get();
        $instagram = Sociallink::where('type', '2')->get();
        $twitter = Sociallink::where('type', '3')->get();
        $youtube = Sociallink::where('type', '4')->get();
        $copyright = Config::first();
        view::share(get_defined_vars());
    }

    public function index()
    {
        // return view('website.index', get_defined_vars());
        // dd($request->all());
        $banner = cms::where('page', '1')->first();
        $about = cms::where('page', '1')->where('section_name', 'AboutSection')->first();
        $plan = cms::where('page', '1')->where('section_name', 'Plan Your Wedding Section')->first();
        $vendors = cms::where('page', '1')->where('section_name', 'Attention All Vendors')->first();
        $meet_vendors = cms::where('page', '1')->where('section_name', 'Meet Our vendors')->first();
        $recent_blogs = Blog::latest()->take(4)->get();
        $getvendorsTestimonials = AboutVendor::with('get_about_vendordetails')->latest()->take(4)->get();
        return view('website.index', get_defined_vars());

    }



    public function wedding(Request $request)
    {
        $wedding_banner = cms::where('page', '2')->first();
        $search = $request->search;
        if ($search != '') {
            $getWeddinglist =   wedding::where('bride', 'LIKE', "%{$search}%")->Orwhere('groom', 'LIKE', "%{$search}%")->paginate(3);
        } else {
            $getWeddinglist = wedding::where('ceremony', '1')->latest()->paginate(3);
        }
        return view('website.wedding', get_defined_vars());
    }
    public function weddingDetails($slug)
    {

        $details = wedding::where('slug', $slug)->first();
        $getbookvendor = BookVendor::where('wedding_id', $details->id)->with('get_book_vendors.get_vednorbusinesscategory')->get();
        $getWeddingimages = ImageGallery::where('ceremony', '1')->where('wedding_id', $details->id)->first();
        return view('website.wedding_details', get_defined_vars());
    }

    public function engagement(Request $request)
    {

        $engagement_banner = cms::where('page', '3')->first();
        $search = $request->search;
        if ($search != '') {

            $engagementCeremony =   wedding::where('ceremony', '2')->where('date', 'LIKE', "%{$search}%")->paginate(3);;
        } else {
            $engagementCeremony = wedding::where('ceremony', '2')->latest()->paginate(3);
        }

        return view('website.engagement', get_defined_vars());
    }

    public function engagementDetails($slug)
    {

        $details = wedding::where('slug', $slug)->first();
        $engagement = ImageGallery::where('ceremony', '2')->where('wedding_id', $details->id)->first();
        return view('website.engagement_details', get_defined_vars());
    }

    public function popularVendors(Request $request)
    {

        $vendors_banner = cms::where('page', '4')->first();
        $search = $request->search;
        if ($search != '') {
            $gevendor =   User::with(['get_vednorbusinesscategory' => function ($query) use ($search) {
                $query->where('service', 'like', '%' . $search . '%');
            }])->get();
        } else {

            $gevendor = User::where('type', 2)->with('get_vednorbusinesscategory')->get();
        }
        $getFeaturedVendors = PaymentDetail::where('package_title', 'vip listing')->with('get_top_vendors')->get();
        //  $checkallPopular = Rating::where('stars_rating', '>=', 3)->get();
          $getallPopular = Rating::where('stars_rating', '>=', 3)->where('status', 1)->with('get_popular_vendors.get_vednorbusinesscategory')->get();
        return view('website.popular_vendors', get_defined_vars());
    }

    public function vendorlist($slug)
    {
        $gevendorService = User::where('slug', $slug)->with('get_vednorbusinesscategory', 'get_user_rating')->get();
        return view('website.vendors', get_defined_vars());
    }
    public function vendorDetails(Request $request, $slug)
    {

        $gevendorslug = User::where('slug', $slug)->first();
        $vendorfacebook = VendorSocial::where('type', '1')->where('user_id', $gevendorslug->id)->get();
        $vendorinstagram = VendorSocial::where('type', '2')->where('user_id', $gevendorslug->id)->get();
        $vendortwitter = VendorSocial::where('type', '3')->where('user_id', $gevendorslug->id)->get();
        $vendoryoutube = VendorSocial::where('type', '4')->where('user_id', $gevendorslug->id)->get();
        $getvendorDetailsService = User::where('id', $gevendorslug->id)->with('get_vednorbusinesscategory', 'get_user_rating')->get();
        $getVendorimages = ImageGallery::where('user_id', $gevendorslug->id)->first();
           $getVendorlocations = UserLocation::where('user_id', $gevendorslug->id)->first();
        $getAboutVendors = AboutVendor::where('slug', $request->slug)->first();
        return view('website.vendor_details', get_defined_vars());
    }

    public function planners()
    {

        $pdf = cms::where('page', '9')->where('section_name', 'South Dakota Bride Wedding Guide')->first();
        $start = cms::where('page', '9')->where('section_name', 'getting started')->first();
        $finance = cms::where('page', '9')->where('section_name', 'discuss finances checklist')->first();
        $budget = cms::where('page', '9')->where('section_name', 'budget worksheets')->first();
        $fun_begins = cms::where('page', '9')->where('section_name', 'now the fun begins')->first();
        $reception = cms::where('page', '9')->where('section_name', 'recepition venues')->first();
        $ceremony = cms::where('page', '9')->where('section_name', 'ceremony details')->first();
        $reception_details = cms::where('page', '9')->where('section_name', 'recepition details')->first();
        $payment_records = cms::where('page', '9')->where('section_name', 'payment records')->first();
        $wedding_party = cms::where('page', '9')->where('section_name', 'wedding party and timeline')->first();
        $wedding_day = cms::where('page', '9')->where('section_name', 'wedding day checklist')->first();
        $check_list = cms::where('page', '9')->where('section_name', 'photo checklist')->first();
        $calenders = cms::where('page', '9')->where('section_name', '2022-23 calenders')->first();
        $timeline = cms::where('page', '9')->where('section_name', 'wedding timeline checklist')->first();
        $planner_guide = cms::where('page', '9')->where('section_name', 'South-Dakota-Brides planner guide')->first();
        return view('website.planner', get_defined_vars());
    }
    public function blog(Request $request)
    {

        $search = $request->search;
        if ($search != '') {
            $blogs =   Blog::where('groom', 'LIKE', "%{$search}%")->Orwhere('bride', 'LIKE', "%{$search}%")->get();
        } else {

            $blogs = Blog::get();
        }

        $blog_banner = cms::where('page', '7')->first();
        return view('website.blog', get_defined_vars());
    }
    public function blogDetails($slug)
    {
        $details = Blog::where('slug', $slug)->first();
        return view('website.blog_details', get_defined_vars());
    }
    public function events()
    {
        $events_banner = cms::where('page', '5')->first();
        $events = EventManagement::take(3)->get();
        return view('website.events', get_defined_vars());
    }
    public function eventDetails($slug)
    {
        $event_details = EventManagement::where('slug', $slug)->first();
        return view('website.event_details', get_defined_vars());
    }
    public function event_more()
    {
        $events_banner = cms::where('page', '5')->first();
        $event_details = EventManagement::all();
        return view('website.moreEvents', get_defined_vars());
    }

    public function signin()
    {
        return view('website.signin');
    }
    public function signup()
    {
        $services = Service::get();
        return view('website.signup', get_defined_vars());
    }
    public function clientSgnup(Request $request)
    {

        session()->put('email', $request->groom_email);
        session()->put('name', $request->groom_first_name);
        session()->put('type', $request->type);

        $this->validate($request, [

            'services' => "required",
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'groom_phone' => "required",
            'groom_email' => "required|email|unique:users",
            'groom_last_name' => "required|max:255",
            'groom_first_name' => "required|max:255",
            'bride_phone' => "required",
            'bride_email' =>  "required|email|unique:users",
            'bride_last_name' => "required|max:255",
            'bride_first_name' => "required",
            'city' => "required",
            'date' => "required",

        ]);

        $client  = new User();
        $client->type = $request->type;
        $client->status = 1;
        $client->date = $request->date;
        $client->city = $request->city;
        $client->bride_first_name =  $request->bride_first_name;
        $client->bride_last_name =  $request->bride_last_name;
        $client->bride_email =  $request->bride_email;
        $client->bride_phone =  $request->bride_phone;
        $client->groom_first_name =  $request->groom_first_name;
        $client->groom_last_name =  $request->groom_last_name;
        $client->name = $request['groom_first_name'] . ' ' . $request['groom_last_name'];
        $random = Str::random(4);
        $client->slug = Str::slug($request->groom_first_name . '-' . $random);
        $client->groom_email =  $request->groom_email;
        $client->email = $request->groom_email;
        $client->groom_phone =  $request->groom_phone;
        $client->password = Hash::make($request->password);
        $client->show_password = $request->password;
        $client->save();
        $client_service = new UserService();
        $client_service->user_id = $client->id;
        $client_service->services = json_encode($request->services);
        $client_service->save();
        $client_sub = new Subcription();
        if ($request->subscribe == 1) {
            $client_sub->email = $request->groom_email;
        }
        $client_sub->save();
        $data = [
            'name' => $client->name,
        ];
        $emailToSend = $request->groom_email;
        Mail::send('website.register.vendor_register', ['data' => $data], function ($message) use ($emailToSend) {
            $message
                ->to($emailToSend)->subject('Sign up');
            $message->from('iamjamesalbertt@gmail.com', 'South Dakota Bride');
        });

        $notification = array('message' => ' Signup Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function aboutus()
    {

        $about_section = cms::where('page', '6')->where('section_name', 'Welcome to South-Dakota-Bride')->first();
        $about = cms::where('page', '6')->where('section_name', 'Welcome South Dakota Birde')->first();
        $banner = cms::where('page', '6')->where('section_name', 'Banner Section')->first();
        return view('website.about_us', get_defined_vars());
    }
    public function register()
    {

        $getServiceNames = service::all();
        $getLocationNames = location::all();
        $getTestimonials = testimonial::all();
        return view('website.register', get_defined_vars());
    }

    public function termsConditions()
    {
        $terms = TermsCondition::first();
        return view('website.terms_conditions', get_defined_vars());
    }
    public function privacyPolicy()
    {
        $privacy = PrivacyPolicy::first();
        return view('website.privacy_policy', get_defined_vars());
    }
    public function contact()
    {

        $banner = cms::where('page', '8')->where('section_name', 'Contact us Banner Section')->first();
        $contact_details = ContactManagement::first();
        return view('website.contact_us', get_defined_vars());
    }
    public function contactprocess(Request $request)
    {

        $this->validate($request, [
            'message' => "required",
            'phone_number' => "required|max:255",
            'email' => "required",
            'name' => "required|max:255",
        ]);

        $contact = new Inquiry();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->slug = Str::slug(Str::limit($request->message, 20));
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
        ];
        $contact->save();
        $emailToSend = 'iamjamesalbertt@gmail.com';
        Mail::send('website.contactmail.contact', ['data' => $data], function ($messages) use ($emailToSend) {
            $messages->to($emailToSend);
            $messages->subject('Contact Details');
        });
        $useremail = $request->email;
        Mail::send('website.usercontact.contact_mail', ['data' => $data], function ($messages) use ($useremail) {
            $messages->to($useremail);
            $messages->subject('Contact');
        });
        $notification = array('message' => 'Thank you for contacting us! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function forgetPassword()
    {
        return view('website.forget_password');
    }
    public function packages()
    {

        $getPackages = packages::all();
        return view('website.packages', get_defined_vars());
    }
    public function payment(Request $request)
    {

        // dd($request->all());
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
    public function pay_amount(Request $request)
    {
        $package = packages::find(session()->get('package_id'));
        return view('website.payment', get_defined_vars());
    }

    public function userlogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6'
        ]);

        // $getbrideEmail = User::where('bride_email', $request->email)->first();
        $getbridestatus = User::where('email', $request->email)->first();
        // if ($getbrideEmail) {
        //     $notification = array('message' => 'Please enter your mail & password', 'alert-type' => 'error');
        //     return redirect()->back()->with($notification);
        // }
        $credentials = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,

        ]);

        if ($credentials && Auth::user()->status == 1) {

            if (Auth::user()->type == 2) {

                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('vendor-dashboard')->with($notification);
            } elseif (Auth::user()->type == 3) {

                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('user-dashboard')->with($notification);
            } elseif (Auth::check() && Auth::user()->type == 1) {

                $notification = array('message' => 'You have login Successfully ', 'alert-type' => 'success');
                return redirect('dashboard/index')->with($notification);
            }
        }else{

            $notification = array('message' => 'Your email or password does not match', 'alert-type' => 'error');
            return back()->with($notification);
        }
        if (!$getbridestatus) {

            $notification = array('message' => 'Your email or password does not match', 'alert-type' => 'error');
            return back()->with($notification);
        } elseif ($getbridestatus->status == 0) {

            $notification = array('message' => 'Your are not Approved by Admin', 'alert-type' => 'info');
            return back()->with($notification);
        }
    }

    public function userIndex()
    {

        $edit_data = User::where('id',Auth::id())->first();
        $getserveices = service::all();
        $getuserserveices = UserService::where('user_id',$edit_data->id)->first();
        $dataServiceid = json_decode($getuserserveices->services );
        return view('user-dashboard.profile.userProfile', get_defined_vars());
    }

    public function vendorIndex()
    {
        $getVednorprofile = User::where('id', Auth::id())->with('get_vednorbusinesscategory')->first();
        $getVendorlocations = UserLocation::where('user_id', Auth::id())->first();
        return view('user-dashboard.vendorProfile.profile', get_defined_vars());
    }


    public function userlogout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function changepassword()
    {
        return view('user-dashboard.change_password');
    }
    public function updatepassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        ]);
        $password = User::where('id', Auth::id())->first();
        $password->password = Hash::make($request->password);
        $password->save();
        $notification = array('message' => 'Password Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function editprofile()
    {

        $edit_data = User::where('id',Auth::id())->first();
        $getserveices = service::all();
        $getuserserveices = UserService::where('user_id',$edit_data->id)->first();
        $dataServiceid = json_decode($getuserserveices->services );
        return view('user-dashboard.profile.edit',get_defined_vars());
    }
    public function editVendorProfile()
    {
        $getLocationNames = location::all();
        $getVendorlocations = UserLocation::where('user_id', Auth::id())->first();
        return view('user-dashboard.vendorProfile.edit', get_defined_vars());

    }


    public function profileupdate(Request $request)
    {

        // dd($request->all());

        $this->validate($request, [
            'groom_first_name' => "required",
            'groom_last_name' => "required",
            'city' => "required",
            'bride_first_name' => "required",
            'bride_last_name' => "required",
            'bride_email' =>  "required",
            'bride_phone' => "required",
            'groom_phone' => "required",
            'image' => "mimes:jpg,jpeg,png,gif|max:1024",
        ]);

        $profile = User::where('id', Auth::id())->first();
        $profile->groom_first_name = $request->groom_first_name;
        $profile->groom_last_name = $request->groom_last_name;
        $profile->groom_email = $request->groom_email;
        $profile->email = $request->groom_email;
        $profile->groom_phone = $request->groom_phone;
        $profile->bride_phone = $request->bride_phone;
        $profile->bride_first_name = $request->bride_first_name;
        $profile->bride_last_name = $request->bride_last_name;
        $profile->bride_email = $request->bride_email;
        $profile->city = $request->city;
        $profile->date = $request->date;
        if(!$request->file("image")){
            // dd('old image here');
            // $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            $profile->profile_image_path = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            // dd($cms->profile_image_path);

        }else{
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
              $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $profile->image = $imageName;
            }
            $profile->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$imageName;
        }
        $profile->save();

        UserService::updateOrCreate(
            [
                'user_id'   => $profile->id,
             ],
            [
            'user_id' => $profile->id,
            'services' => json_encode($request->services),
             ]);
        $notification = array('message' => 'Profile Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function VendorProfileUpdate(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'name' => "required",
            'last_name' => "required",
            'company' =>  "required",
            'contact' => "required",
            'image' => "mimes:jpg,jpeg,png,gif|max:1024",
        ]);
        $userLocations = $request->locations;
        // dd($userLocations);
        $profile = User::where('id', Auth::id())->first();
        $profile->name = $request->name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->contact = $request->contact;
        $profile->company = $request->company;
        if(!$request->file("image")){
            // dd('old image here');
            // $cms->image = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            $profile->profile_image_path = env('APP_URL').'/'.'storage/uploads/No-image.jpg';
            // dd($cms->profile_image_path);

        }
        // elseif(!$profile->){
        //     $cms->image = $request->old_image;
        //     $cms->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$request->old_image;
        // }
        else{
            // dd('image here');
            if ($image = $request->file("image")) {
                $imageName = $image->getClientOriginalName();
              $image =  $image->move(public_path('storage/uploads/cms/'), $imageName);
                $profile->image = $imageName;
            }
            $profile->profile_image_path = env('APP_URL').'/'.'storage/uploads/cms/'.$imageName;
        }
        $profile->save();

        UserLocation::updateOrCreate(
            [
                'user_id'   => Auth::user()->id,
            ],
            [
                'user_id'   => Auth::user()->id,
                'locations'   => json_encode($userLocations),
            ],
        );
        // $getVendorlocations = UserLocation::where('user_id', $gevendorslug->id)->first();

        $notification = array('message' => 'Profile Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function vendor_gallery(Request $request)
    {

        $getvendorimages = ImageGallery::where('user_id', Auth::user()->id)->first();
        return view('user-dashboard.vendorProfile.gallery', get_defined_vars());
    }
    public function vendor_galleryUpdate(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'wedding_image' => "required",
        ]);
        $fileofimages =  ImageGallery::where('user_id',Auth::user()->id)->first();
        if($fileofimages){
            $oldweddingimageslist = json_decode($fileofimages->image);
            $images = [];
            if($request->hasfile('wedding_image'))
             {
                foreach($request->file('wedding_image') as $file)
                {
                    $images[] = $file;
                }
            }
            //   dd(count($oldweddingimageslist));
              $totalimages = count($oldweddingimageslist) + count($images);
            //   dd($totalimages);
                if($totalimages > 10)
                {
                    // dd('here');
                    $notification = array('message' =>'You can upload only 10 images' , 'alert-type'=>'error' );
                    return redirect()->back()->with($notification);
                }
        }


        // $file=  ImageGallery::where('user_id',Auth::user()->id)->first();
        //  $file->user_id = Auth::user()->id;
        //   $data = json_decode($file->image);

        //  if(empty($request->file('wedding_image'))){

        //      // dd(json_decode($request->old_wedding_image));

        //      $file->image = $request->old_wedding_image;

        //  }
        //  else {
        //      // return $data;
        //      // $data = [];
        //      foreach($request->file('wedding_image') as $image)
        //      {
        //          $name=$image->getClientOriginalName();
        //          $image->move(public_path('storage/uploads/cms/'), $name);
        //          $data[] = $name;
        //      }
        //      $file->image = json_encode($data);
        //  }
        //  $file->save();


        $images = json_decode($fileofimages->image);
        if ($request->hasfile('wedding_image')) {
            foreach ($request->file('wedding_image') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->move(public_path('storage/uploads/cms/'), $name);
                $images[] = $name;
            }
        }

        // dd($images);

        ImageGallery::updateOrCreate(
            [
                'user_id'   => Auth::user()->id,

            ],
            [
                'user_id'   => Auth::user()->id,
                'image'   => json_encode($images),
            ],
        );
        $notification = array('message' => 'Profile Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
    public function about_vendor()
    {

        $getAboutVednorprofile = AboutVendor::where('user_id', Auth::id())->first();
        $getvendorabout =  AboutVendor::where('user_id', Auth::id())->first();
        return view('user-dashboard.vendorProfile.about', get_defined_vars());
    }
    public function contact_vendor()
    {

        $getVendorContact = VendorContact::where('vendor_id', Auth::id())->latest()->paginate(8);
        return view('user-dashboard.vendorProfile.contact', get_defined_vars());
    }
    public function contactDelete($id)
    {
        $vendor = VendorContact::find($id);
        $vendor->delete();
        return back();
    }
    public function vendor_social()
    {



        $count = VendorSocial::where('user_id', '=', Auth::id())->count();
        $getVendorSociallinks = VendorSocial::where('user_id', Auth::id())->get();

        return view('user-dashboard.vendorProfile.social', get_defined_vars());
    }

    public function social_create(Request $request)
    {


        return view('user-dashboard.vendorProfile.social_create', get_defined_vars());
    }
    public function social_store(Request $request)
    {

        $this->validate($request, [
            'type' => "required|max:255",
            'social_media' => "required|max:255",

        ]);

        $count = VendorSocial::where('user_id', '=', Auth::id())->count();
        $check_social = VendorSocial::where('user_id', Auth::id())->first();

        if (!empty($check_social) && $check_social->type == $request->type) {
            $notification = array('message' => 'Your Social type is already exists!', 'alert-type' => 'info');
            return redirect()->back()->with($notification);
        }
        if ($count == 4) {
            $notification = array('message' => 'Your record is already exists! ', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {

            $cms = new VendorSocial();
            $cms->user_id = Auth::id();
            $cms->type = $request->type;
            $cms->slug = Str::slug($request->social_media, "-");
            $cms->social_media = $request->social_media;
            $cms->save();
            $notification = array('message' => 'Your data updated Successfully ', 'alert-type' => 'success');
            return redirect()->route('vendor_social')->with($notification);
        }
    }

    public function vendor_social_edit($slug)
    {
        $edit_data = VendorSocial::where('slug', $slug)->first();
        return view('user-dashboard.vendorProfile.social_edit', get_defined_vars());
    }
    public function social_update(Request $request, $id)
    {

        $this->validate($request, [
            'social_media' => "required|max:255",
        ]);
        $cms = VendorSocial::findOrFail($id);
        $cms->user_id = Auth::id();
        $cms->type = $request->type;
        $cms->slug = Str::slug($request->social_media, "-");
        $cms->social_media = $request->social_media;
        $cms->save();
        $notification = array('message' => 'Your data updated Successfully ', 'alert-type' => 'success');
        return redirect()->route('vendor_social')->with($notification);
    }

    public function vendor_reviews(Request $request)
    {
        $getVendorRating = Rating::where('vendor_id', Auth::id())->latest()->paginate(8);
        return view('user-dashboard.vendorProfile.review', get_defined_vars());
    }
    public function packageUpdate(Request $request)
    {
        $vednorpackages = packages::all();
        return view('user-dashboard.vendorProfile.vednorPackages', get_defined_vars());
    }

    public function vendor_payment(Request $request)
    {
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

    public function pay_payment(Request $request)
    {

        $package = packages::find(session()->get('package_id'));
        return view('user-dashboard.vendorProfile.vednorPayment', get_defined_vars());
    }

    public function about_vendor_profile(Request $request, $id)
    {

        $this->validate($request, [
            // 'stoplight' => "required",
            'aboutvendor' => "required",
            'reviews' =>  "required",
        ]);

        AboutVendor::updateOrCreate(
            [
                'user_id'   => Auth::user()->id,

            ],
            [
                'user_id'   => Auth::user()->id,
                'slug' => Str::slug(Auth::user()->name, '-'),
                'aboutvendor'   => $request->aboutvendor,
                // 'stoplight'       => $request->stoplight,
                'reviews'       => $request->reviews,
                // 'image'       => !empty($request->file("image")) ? $imageName = $request->image->getClientOriginalName() : '',
                'image2'       => !empty($request->file("image2")) ? $imageName = $request->image2->getClientOriginalName() : '',

            ],
        );
        !empty($request->file("image")) ? $request->image->move(public_path('storage/uploads/cms/'), $imageName) : '';
        !empty($request->file("image2")) ? $request->image2->move(public_path('storage/uploads/cms/'), $imageName) : '';
        $notification = array('message' => 'Vendor Info Updated Successfully! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
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
    public function getPassword($token)
    {
        return view('website.update_password', ['token' => $token]);
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

        $user = User::where('email', $request->email)
            ->update([
                'password' => Hash::make($request->password),
                'show_password' => $request->password
            ]);
        DB::table('password_resets')->where(['email' => $request->email])->delete();
        $notification = array('message' => 'Password Updatd Successfully! ', 'alert-type' => 'success');
        return redirect()->route('home')->with($notification);
    }

    public function vendorContactprocess(Request $request, $id)
    {

        $this->validate($request, [
            'message' => "required",
            'phone_number' => "required|max:255",
            'email' => "required",
            'name' => "required|max:255",
        ]);

        $contact = new VendorContact();
        $contact->vendor_id = $request->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
        ];

        $contact->save();
        $vendorEmail = User::where('id', $request->id)->first();
        $emailToSend = $vendorEmail->email;
        Mail::send('website.contactmail.contact', ['data' => $data], function ($messages) use ($emailToSend) {
            $messages->to($emailToSend);
            $messages->subject('Contact Details');
        });

        $useremail = $request->email;
        Mail::send('website.usercontact.contact_mail', ['data' => $data], function ($messages) use ($useremail) {
            $messages->to($useremail);
            $messages->subject('Contact');
        });
        $notification = array('message' => 'Thank you for contacting us! ', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // new work
    public function deletevendorimg(Request $request){
        // return $request->all();
        $image = $request->img;
        $del = ImageGallery::find($request->wedding_id);
        $images = json_decode($del->image);

        $newArr = array_filter($images, function($val) use($image) {

            return $val !== $image;

        });
        // dd(gettype($newArr));
        $array = [];
        foreach($newArr as $item){
            array_push($array, $item);
        }
        // return $array;
        $del->image = $array;
        $del->save();


        if($del ){
            return response()->json([
            'status' => 200,
            'msg' => 'Image Deleted Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'msg' => 'Something went wrong',
                ]);
        }

    }

    // new work
}
