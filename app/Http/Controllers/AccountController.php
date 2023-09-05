<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function deposit()
    {
        $plans = Plan::all();
        return view('user.transactions.deposit',compact('plans'));
    }    
}
