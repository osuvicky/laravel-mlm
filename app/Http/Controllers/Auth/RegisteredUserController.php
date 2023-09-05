<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{User,Generation};
use App\Models\Network;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function loadReferralRegister(Request $request)
    {
        if(isset($request->ref)){
           $referral = $request->ref;
            $userData = User::where('referral_code',$referral)->get();

            if(count($userData) > 0){
                //return view('user.auth.referralRegister', compact('referral','counteries','userData'));
                return view('auth.referralRegister', compact('referral','userData'));

            }else{
                return view('404');
            }
        }else{
            return redirect('/');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $referralCode = Str::random(10);
        $userData = User::where('referral_code',$request->referral_code)->get();
        $sponsor_details = User::where(['referral_code'=>$request->referral_code, 'status'=>1])->first();

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'referral_code' => $referralCode,
            'sponsor_code' => $sponsor_details->id,
            'password' => Hash::make($request->password),
        ]);
        Network::insert([
            'referral_code' => $request->referral_code,
            'user_id' => $user->id,
            'parent_user_id' => $userData[0]['id'],
        ]);

        $user_id = $user->id;
        $sponsor_id = $sponsor_details->id;

            //First Level
            User::where(['id'=>$sponsor_id,'status'=>1])->increment('direct_group',1);
            User::where(['id'=>$sponsor_id,'status'=>1])->increment('total_group',1);
            $level = new Generation();
            $level->main_id = $sponsor_id;
            $level->member_id = $user_id;
            $level->gen_type = 1;
            $level->save();

            //Generation
            $i = 2;
            $generation = $this->generation_loop($sponsor_id,$user_id,$i);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function generation_loop($sponsor_id,$user_id,$i)
    {
        $user_details_check = User::where(['id' => $sponsor_id,'status'=>1])->exists();
        if($user_details_check){
            $sponsor_details = User::where(['id'=>$sponsor_id,'status'=>1])->first();
            if($sponsor_details->sponsor_code !=''){
            $sponsor_sponsor_id = $sponsor_details->sponsor_code;
            User::where(['id'=>$sponsor_sponsor_id,'status'=>1])->increment('total_group',1);
            $level = new Generation();
            $level->main_id = $sponsor_sponsor_id;
            $level->member_id = $user_id;
            $level->gen_type = $i;
            $level->save();
            $i = $i+1;
            if($i<=7){
                return $this->generation_loop($sponsor_sponsor_id,$user_id,$i);
            }
        }
    }

    }
}
