<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return view('admin.plans.index',compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function  store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'amount' => ['required','numeric'],
            'pv' => ['required','numeric'],
            'ref_percent' => ['required','numeric'],
            'gig_percent' => ['required','numeric'],
        ]);
        Plan::create($validated);

        return to_route('admin.plans.index')->with('success', 'Plan Created Succesfully');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit',compact('plan'));
    }

    public function  update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3'],
            'amount' => ['required'],
            'pv' => ['required'],
            'ref_percent' => ['required'],
            'gig_percent' => ['required'],
        ]);
        $plan->update($validated);

        return to_route('admin.plans.index')->with('success', 'Plan Updated Succesfully');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return back()->with('warning', 'Plan Deleted Succesfully');
    }

    public function allPlans()
    {
        $userData = Subscription::where('user_id', auth()->user()->id)->first();
        $plans = Plan::all();
        return view('user.plans.index',compact('plans','userData'));
    }

    public function nowpayments()
    {
        return view('user.plans.nowpayments');
    }

    public function subscribe()
    {
        return view('user.plans.subscribe');
    }
}
