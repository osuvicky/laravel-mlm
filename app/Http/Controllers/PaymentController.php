<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

Use Carbon\Carbon;
class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $userData = Subscription::where('user_id', auth()->user()->id)->first();
        if(!empty($userData)){
            if($userData->is_active == 1){
                return back()->with('error','You already have a Plan!');
            }
        }

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function register_subscription()
    {
        $paymentDetails = Paystack::getPaymentData();
        
        $demail = $paymentDetails['data']['customer']['email'];
        $damount = ($paymentDetails['data']['amount'])/100;
        $duser = User::where('email',$demail)->first();
        $dsubscription = Plan::where('amount',$damount)->first();
        $subscription = Subscription::updateOrCreate([
            'user_id' => $duser->id,
        ],[
            'plan_id' => $dsubscription->id,
            'is_active' => "1",
            'expiry_date' => Carbon::now()->addMonths('12')
        ]);
        
        return to_route('dashboard')->with('success', 'Subscription Succesful');
      
        //dd($subscription);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function verify_nowpayments(Request $request)
    {
        $plan = Plan::all();
        $price = 567;
        $pv = 33;
        //request array
        $request = [
            "price_amount" => $price,
            "price_currency"=>  "usd",
            "order_id"=>  $pv,
            "order_description"=>  "Apple Macbook",
            "ipn_callback_url"=>  "https://nowpayments.io",
            "success_url"=>  "https://nowpayments.io",
            "cancel_url"=>  "https://nowpayments.io"
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.nowpayments.io/v1/invoice',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode($request),
            CURLOPT_HTTPHEADER => array(
            'x-api-key: JXKY82W-GQC43T8-H8BDYWJ-RK4CMMV',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response);
        $paymentUrl = $data->invoice_url;
        return redirect()->to($paymentUrl)->send();
        

    }
}