<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Farmer;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    // ফ্রন্টএন্ড থেকে এজেন্ট রেজিস্ট্রেশন
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:agents,phone',
            'district' => 'required',
            'password' => 'required|min:6',
            'nid_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->phone = $request->phone;
        $agent->district = $request->district;
        $agent->experience = $request->experience;
        $agent->password = bcrypt($request->password);
        $agent->status = 'pending';

        // NID ফাইল আপলোড লজিক
        if ($request->hasFile('nid_proof')) {
            $file = $request->file('nid_proof');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/images/agent/'), $filename);
            $agent->nid_proof = $filename;
        }

        $agent->save();

        return back()->with('success', 'Your application has been submitted and is pending approval.');
    }


    public function membershipRequests()
    {
        $requests = Agent::where('status', 'pending')->latest()->get(); // latest() দিলে নতুন রিকোয়েস্ট আগে দেখাবে
        return view('backend.agent.membership', compact('requests'));
    }


    public function agentList()
    {
        $agents = Agent::where('status', 'approved')->with('farmers')->latest()->get();
        $all_farmers = Farmer::whereNull('agent_id')->orWhere('agent_id', 0)->get();
        $services = \App\Models\Service::all();
        return view('backend.agent.index', compact('agents', 'services', 'all_farmers'));
    }


    public function approve($id)
    {
        $agent = Agent::findOrFail($id); // find() এর বদলে findOrFail() ব্যবহার করা নিরাপদ
        $agent->status = 'approved';
        $agent->save();

        return back()->with('success', 'Agent approved successfully!');
    }

    // এজেন্টের সম্পূর্ণ প্রোফাইল বা ডিটেইলস দেখা


    // একটিভ এজেন্টকে সাসপেন্ড/পেন্ডিং বা রিজেক্ট করা
    public function suspend($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->status = 'pending'; // অথবা আপনার লজিক অনুযায়ী 'suspended'/'rejected'
        $agent->save();

        return back()->with('success', 'Agent has been suspended successfully!');
    }

    public function assignFarmer(Request $request)
    {
        // ১. ডাটা ভ্যালিডেশন
        $request->validate([
            'agent_id' => 'required|exists:agents,id',
            'farmer_id' => 'required|exists:farmers,id',
        ]);

        $farmer = Farmer::findOrFail($request->farmer_id);

        $farmer->update([
            'agent_id' => $request->agent_id
        ]);

        // ৪. সাকসেস মেসেজ সহ আগের পেজে ব্যাক করা
        return redirect()->back()->with('success', 'কৃষক সফলভাবে এই এজেন্টের আন্ডারে অ্যাসাইন হয়েছে!');
    }
}
