<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\{Country,City,State}; // import model 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Network;
use Illuminate\Validation\Rules\Password;

use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegController extends Controller
{
    public function loadRegister()
    {
        $counteries = Country::get(['name','id']);
 
        return view('user.auth.register',compact('counteries'));
    }

    public function registered(Request $request)
    {
        $request->validate([
            'firstname' => 'required|min:2|max:25',
            'lastname' => 'required|min:2|max:25',
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^\S*$/u'],
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'country' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'password_confirmation' => 'required|same:password'            
        ]);

        $referralCode = Str::random(10);
        $token = Str::random(50);

        if(isset($request->referral_code)){

            $userData = User::where('referral_code',$request->referral_code)->get();

            if(count($userData) > 0){

                $user_id = User::insertGetId([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,      
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),                   
                    'mobile' => $request->mobile,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'city' => $request->city,
                    'referral_code' => $referralCode,
                    'remember_token' => $token
                ]);
                Network::insert([
                    'referral_code' => $request->referral_code,
                    'user_id' => $user_id,
                    'parent_user_id' => $userData[0]['id'],
                ]);

            }else{
                return back()->with('error','Please enter valid referral code!');
            }

        }else{
            $user_id = User::insertGetId([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,      
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),                   
                    'mobile' => $request->mobile,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'date_of_birth' => $request->date_of_birth,
                    'city' => $request->city,
                    'referral_code' => $referralCode,
                    'remember_token' => $token
            ]);
            Network::insert([
                'referral_code' => "business",
                'user_id' => $user_id,
                'parent_user_id' => "1",
            ]);
        }

        $domain = URL::to('/');
        $url = $domain.'/referral-register?ref='.$referralCode;

        $data['url'] = $url;
        $data['firstname'] = $request->firstname;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['title'] = 'Registered';

        Mail::send('emails.registerMail',['data' => $data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });

        //verification mail send
        $url = $domain.'/email-verification/'.$token;

        $data['url'] = $url;
        $data['firstname'] = $request->firstname;
        $data['email'] = $request->email;
        $data['title'] = 'Referral Verification Mail';

        Mail::send('emails.verifyMail',['data' => $data],function($message) use($data){
            $message->to($data['email'])->subject($data['title']);
        });

        return back()->with('success','Registration has been successful!');
    }
    
    public function loadReferralRegister(Request $request)
    {
        $counteries = Country::all();
        if(isset($request->ref)){
           $referral = $request->ref;
            $userData = User::where('referral_code',$referral)->get();

            if(count($userData) > 0){
                //return view('user.auth.referralRegister', compact('referral','counteries','userData'));
                return view('auth.referralRegister', compact('referral','counteries','userData'));

            }else{
                return view('404');
            }
        }else{
            return redirect('/');
        }
    }

    public function emailVerification($token)
    {
        $userData = User::where('remember_token',$token)->get();

        if(count($userData) > 0){
            if($userData[0]['is_verified'] == 1){
                return view('verified',['message'=>'Your mail is already verified!']);
            }

            User::where('id',$userData[0]['id'])->update([
                'is_verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);
            return view('verified',['message'=>'Your '.$userData[0]['email'].' mail verified successfully!']);

        }else{
            return view('verified',['message'=>'404 page not Found!']);
        }

    }

    public function loadLogin()
    {
        return view('user.auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $userData = User::where('email',$request->email)->first();
        if(!empty($userData)){
            if($userData->is_verified == 0){
                return back()->with('error','Please verify your mail!');
            }
        }

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){
            return redirect('/portal');
        }else{
            return back()->with('error','Username & Password is incorrect!');
        }
    }

    public function loadDashboard()
    {
        //$networkCount = Network::where('parent_user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->id)->count();
        $networkCount = Network::where('parent_user_id',Auth::user()->id)->count();
        $networkData = Network::with('user')->where('parent_user_id',Auth::user()->id)->get();
        return view('user.dashboard',compact(['networkCount','networkData']));
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
    
}