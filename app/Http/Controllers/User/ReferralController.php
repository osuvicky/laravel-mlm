<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Network;
use App\Models\{User,Generation};
use Illuminate\Support\Facades\Auth;

class ReferralController extends Controller
{
    public function direct_group()
    {
        $members = User::where('sponsor_code',Auth::user()->id)->get();
        return view('user.referrals.directgroup',['members'=>$members]);
    }

    public function level_group()
    {
        $members = Generation::where('main_id',Auth::user()->id)->get();
        return view('user.referrals.levelgroup',['members'=>$members]);
    }

    public function binary_tree()
    {
        $members = User::tree()->get()->toTree();
        dd($members);
        //$members = User::where('sponsor_code',Auth::user()->id)->get();
        return view('user.referrals.tree',['members'=>$members]);
    }
}