<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StripePackage;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Auth;


class StripPackageManagementControler extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('return');
        $getStripePackage = StripePackage::all();
        return view('stripePackages.index', get_defined_vars());

    }
    public function showsubscription()
    {
         $getsubscription = Subscription::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        //  extract($getsubscription[0]['items']);StripeStatus
        //  dd(extract($getsubscription[0]['items']));
        return view('stripePackages.showsubscriptions', get_defined_vars());
    }

    public function plans()
    {
         $getCMS = StripePackage::all();
        return view('stripePackages.plan', get_defined_vars());

    }

    public function cancel_subscription(request $request)
    {
        $getsubscription = Subscription::where('id', $request->subscriptioname)->first();
        // dd($getsubscription);
        $subcriptionName = $getsubscription->name;
        if ($subcriptionName) {
            $user = Auth::user();
            $user->subscription($subcriptionName)->cancel();
        }
        Subscription::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id
            ],
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id,
                'status' => 1
            ]
        );
        return response('data');


    }
    public function resume_subscription(request $request)
    {
        $getsubscription = Subscription::where('id', $request->subscriptioname)->where('user_id', Auth::user()->id)->first();
        // dd($getsubscription->stripe_id);

        $subcriptionName = $getsubscription->name;
        if ($subcriptionName) {
            $user = Auth::user();
            $user->subscription($subcriptionName)->resume();
        }
        Subscription::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id
            ],
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id,
                'status' => 2
            ]
        );
        return response('resumesubs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd('stripe');
        return view('stripePackages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->intervalCount);
        $this->validate($request, [
            'name' => "required|max:255",
            'price' => "required|max:255",
            'intervalCount' => "required|max:255",
            'billing_Period' => "required|max:255",

        ]);
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $amount = ($request->price * 100);
        // dd($amount);
        try {
            $plan_id = \Stripe\Plan::create(
                array(
                    "amount" =>  $amount,
                    "interval_count" => $request->intervalCount,
                    "interval" => $request->billing_Period,
                    "product" => array(
                        "name" => $request->name
                    ),
                    "currency" => "usd",
                )
            );

        // dd($plan_id);

        } catch (Exception $ex) {

            return  $notification = array('message' => $ex->getMessage(), 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }

        $cms = new StripePackage();
        $cms->name = $request->name;
        $cms->slug = Str::slug($request->name . Str::random(4), '-');
        $cms->price = $request->price;
        $cms->interval_count = $request->intervalCount;
        $cms->billing_payment = $request->billing_Period;
        $cms->currency = 'usd';
        $cms->plan_id = $plan_id->id;
        $cms->save();
        $notification = array('message' => 'Your plan has been created Successfully ', 'alert-type' => 'success');
        return redirect()->route('stripePackages')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function paypal_form(Request $request)
    {
        $user = Auth::user();
        return view(
            'Package.stripeform',
            [
                'intent' => $user->createSetupIntent(),
            ],
            get_defined_vars()
        );
    }

    public function singlestripe(Request $request)
    {
        $user = Auth::user();
        return view(
            'Package.singlestripe',
            [
                'intent' => $user->createSetupIntent(),
            ],
            get_defined_vars()
        );
    }


    public function stripe_payment(Request $request)
    {

        $useramount = (round($request->amount));
        $paymentMethod = $request->payment_method;
        $user = Auth::user();
        $user->createOrGetStripeCustomer();
        $paymentMethodid = $user->addPaymentMethod($paymentMethod);
        $user->charge(
            $useramount,
            $paymentMethodid->id
        );
        return redirect()->route('plans.list');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         $edit_data = StripePackage::where('slug', $slug)->first();
        return view('stripePackages.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plan_id)
    {

        // dd($request->all());
        $this->validate($request, [
                'name' => "required|max:255",
                'price' => "required|max:255",
                'intervalCount' => "required|max:255",
                'billing_Period' => "required|max:255",
        ]);

        $amount = intval($request->price * 100);
        // $interval_count = intval($request->intervalCount);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $planUpdate = \Stripe\Plan::retrieve($plan_id);
        $planUpdate->nickname = $request->name;
        $planUpdate->amount = $request->price * 100; 
        // $planUpdate->interval_count = $request->intervalCount;
        // $planUpdate->interval = $request->billing_Period;
        $planUpdate->metadata->name = $request->name;
        $planUpdate->metadata->amount_decimal = $request->price;
        $planUpdate->metadata->interval_count = $request->intervalCount;
        $planUpdate->metadata->interval = $request->billing_Period;
        $planUpdate->metadata->currency = "usd";

        $planUpdate->save();

    //  return  $planUpdate->product;
    // $planUpdate = json_decode('{
    //     "id": "' . $plan_id . '",
    //     "object": "plan",
    //     "active": true,
    //     "aggregate_usage": null,
    //     "amount": "' . $amount . '",
    //     "amount_decimal": "' . $request->price . '",
    //     "billing_scheme": "per_unit",
    //     "created": 1683224279,
    //     "currency": "usd",
    //     "interval": "day",
    //     "interval_count": "' . $request->intervalCount . '",
    //     "livemode": false,
    //     "metadata": {
    //     "amount_decimal": "' . $request->price . '",
    //     "currency": "usd",
    //     "interval": "month",
    //     "interval_count": "' . $request->intervalCount . '",
    //     "name": "' . $request->name . '"
    //     },
    //     "nickname": "' . $request->name . '",
    //     "product": "prod_NpmHstQXjbMM7J",
    //     "tiers_mode": null,
    //     "transform_usage": null,
    //     "trial_period_days": null,
    //     "usage_type": "licensed"
    // }', true);
  
    $cms = StripePackage::where('plan_id', $plan_id)->firstOrFail();
    $cms->name = $request->name;
    $cms->slug = $request->slug;
    $cms->price = $request->price;
    $cms->interval_count = $request->intervalCount;
    $cms->billing_payment = $request->billing_Period;
    $cms->save();

    $notification = array('message' => 'Your plan has been updated Successfully ', 'alert-type' => 'success');
    return redirect()->route('stripePackages')->with($notification);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($plan_id)
    {
        // dd($plan_id);
          $stripe = new \Stripe\StripeClient('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');
        $plan_id = $plan_id;
        $stripe->plans->delete($plan_id);

        $cms = StripePackage::where('plan_id', $plan_id)->first();
        $cms->delete();
        return redirect()->route('stripePackages');
    }
}
