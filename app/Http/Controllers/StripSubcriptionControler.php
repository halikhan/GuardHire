<?php

namespace App\Http\Controllers;

use Exception;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\StripePackage;
use Laravel\Cashier\Subscription;
use Illuminate\Support\Facades\Auth;


class StripSubcriptionControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function checkout($slug)
    {


        $getplandetails = StripePackage::where('slug', $slug)->first();
        $plan = $getplandetails->plan_id;
        if (!$getplandetails) {
            return back()->withErrors([
                'error' => 'Unable to locate subscription',
            ]);
        }
        $subcriberuser = Auth::user();
        return view('stripePackages.subscriptionform', [
            'intent' => $subcriberuser->createSetupIntent(),
        ], get_defined_vars());
    }

    public function subcription(Request $request)
    {

        $subcriberuser = Auth::user();
        $subcriberuser->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;
        if ($paymentMethod != null) {
            $subcriberuser->addPaymentMethod($paymentMethod);
        }
        $plan = $request->plan_id;
        try {
            $subcriberuser->newSubscription(
                'default',
                $plan
            )->create($paymentMethod != null ? $paymentMethod : '');
        } catch (Exception $ex) {
            dd($ex->getMessage());
            $notification = array('message' => $ex->getMessage(), 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
        $request->session()->flash('alert-success', 'You have successfully subscribed!');
        return redirect()->route('show.subscription', $plan)->with('subscribe', 'You have Successfully Subscribed');

    }
    public function refund_subscription(request $request)
    {
        // dd($request->all());
        $getsubscription = Subscription::where('id', $request->subscriptionName)->where('user_id', Auth::user()->id)->first();
        $getsubscription->name;
        $stripe = new \Stripe\StripeClient('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');
        $package_value = $stripe->charges->all();
        $stripe->refunds->create(['charge' => $package_value->data[0]->id, 'amount' => $package_value->data[0]->amount]);
        Subscription::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id
            ],
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id,
                'status' => 4
            ]
        );

        return response('RefundPayments');
    }

    public function cancel_plan(Request $request)
    {
        // dd($request->all());
        $getsubscription = Subscription::where('id', $request->subscriptionName)->where('user_id', Auth::user()->id)->first();
        // dd($getsubscription->name);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP'
        );
        \Stripe\Stripe::setApiKey('sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP');

        // $subscription = Subscription::where('name', 'default')->where('user_id', auth()->id())->first();
        // $subscription->cancel();


        $user = User::where('id', Auth::id())->first();
        // $user->subscription('default')->cancel();
        $user->subscription($getsubscription->name)->cancelNow();
        Subscription::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id
            ],
            [
                'user_id' => Auth::user()->id,
                'stripe_id' => $getsubscription->stripe_id,
                'status' => 3
            ]
        );
        return response($user);
    }

    public function edit_plan($id)
    {
        session()->put('subscriptionsID', $id);
        //  $edit_data = Subscription::where('id', $id)->first();
        // $getsubscription->stripe_id;
        // dd($getsubscription->stripe_id);
        $getCMS = StripePackage::all();
        return view('stripePackages.plan', get_defined_vars());
    }

    public function update_plan(Request $request, $id)
    {
        // $getsubscription = Subscription::where('id', $id)->first();
        // $getsubscription->stripe_id;
        // // dd($getsubscription->stripe_id);

        // $stripe = new \Stripe\StripeClient(
        //     'sk_test_51KhLF7J5CNuTNvMYG43rQ5JIHfysm31ktZxesfAk5QoM7tNKwqjBsZdW7yiGyDHP0pv5xbCRX0oZymO1YzKlPSqa00k0tTHGiP'
        //   );
        //   $stripe->subscriptions->update(
        //     $getsubscription->stripe_id,
        //     ['metadata' => ['order_id' => '6735']]
        //   );
        // return response('response');

    }
}
