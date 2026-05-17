<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
  // ফ্রন্টএন্ড থেকে এজেন্ট রেজিস্ট্রেশন
    public function register(Request $request) {
        // ভ্যালিডেশন
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:agents,phone', 
            'district' => 'required',
            'password' => 'required|min:6',
            'nid_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $agent = new Agent(); // <--- সরাসরি Agent লিখলেই এখন কাজ করবে
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
            $file->move(public_path('uploads/agents'), $filename);
            $agent->nid_proof = $filename;
        }

        $agent->save();

        return back()->with('success', 'Your application has been submitted and is pending approval.');
    } // <--- এই ব্র্যাকেটটি এখানে নিখুঁতভাবে শেষ হয়েছে

    // অ্যাডমিন প্যানেল: পেন্ডিং রিকোয়েস্ট
    public function membershipRequests() {
        $requests = Agent::where('status', 'pending')->latest()->get(); // latest() দিলে নতুন রিকোয়েস্ট আগে দেখাবে
        return view('backend.agent.membership', compact('requests'));
    }

    // অ্যাডমিন প্যানেল: অ্যাপ্রুভড এজেন্ট লিস্ট
    public function agentList() {
        $agents = Agent::where('status', 'approved')->latest()->get();
        return view('backend.agent.index', compact('agents'));
    }

    // এজেন্ট অ্যাপ্রুভ করা
    public function approve($id) {
        $agent = Agent::findOrFail($id); // find() এর বদলে findOrFail() ব্যবহার করা নিরাপদ
        $agent->status = 'approved';
        $agent->save();
        
        return back()->with('success', 'Agent approved successfully!');
    }

    // এজেন্টের সম্পূর্ণ প্রোফাইল বা ডিটেইলস দেখা


// একটিভ এজেন্টকে সাসপেন্ড/পেন্ডিং বা রিজেক্ট করা
public function suspend($id) {
    $agent = Agent::findOrFail($id);
    $agent->status = 'pending'; // অথবা আপনার লজিক অনুযায়ী 'suspended'/'rejected'
    $agent->save();
    
    return back()->with('success', 'Agent has been suspended successfully!');
}
}