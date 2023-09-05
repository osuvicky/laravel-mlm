<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Country,City,State}; // import model 
use App\Models\Biodata;
use App\Models\User;
use App\Models\Network;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $userData = Biodata::where('user_id',Auth::user()->id)->get();

        if(count($userData) == 0){
            return redirect('biodata');
        }
        //$networkCount = Network::where('parent_user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->id)->count();
        $networkCount = Network::where('parent_user_id',Auth::user()->id)->count();
        $networkData = Network::with('user')->where('parent_user_id',Auth::user()->id)->get();
        return view('user.dashboard',compact(['networkCount','networkData']));
    }

    public function biodata()
    {
        $userData = Biodata::where('user_id',Auth::user()->id)->get();

        if(count($userData) > 0){
            return redirect('dashboard');
        }
        $counteries = Country::get(['name','id']);
        return view('user.biodata',compact('counteries'));
    }
    
    public function  biodataRegister(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => ['required', 'min:3'],
            'lastname' => ['required', 'min:3'],
            'mobile' => ['required','numeric'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
            'address' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
        ]);
        $formFields['user_id'] = auth()->id();
        Biodata::create($formFields);

        return to_route('dashboard')->with('success', 'Profile Submitted Succesfully');
    }
}
