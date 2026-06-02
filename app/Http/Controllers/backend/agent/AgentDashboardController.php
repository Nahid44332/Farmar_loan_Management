<?php

namespace App\Http\Controllers\backend\agent;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\FieldInvestigation;
use Illuminate\Http\Request;

class AgentDashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.agent-panel.dashboard');
    }

    public function investigationPage()
    {
        $agent_id = auth()->user()->id;

        $pending_farmers = Farmer::where('agent_id', $agent_id)
            ->whereDoesntHave('investigations')
            ->get();

        $investigations = FieldInvestigation::where('agent_id', $agent_id)
            ->with('farmer')
            ->latest()
            ->get();

        return view('backend.agent-panel.investigation', compact('pending_farmers', 'investigations'));
    }

    public function storeInvestigation(Request $request)
    {
        // ১. ফর্ম ডাটা ভ্যালিডেশন
        $request->validate([
            'farmer_id' => 'required|exists:farmers,id',
            'land_verified_amount' => 'required|string',
            'crop_or_sector_status' => 'required|string',
            'agent_comments' => 'required|string',
            'investigation_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'recommendation' => 'required|in:recommended,not_recommended',
        ]);

        $investigation = new FieldInvestigation();

        $investigation->agent_id = auth()->guard('agent')->user()->id; // লগইন থাকা এজেন্টের আইডি
        $investigation->farmer_id = $request->farmer_id;
        $investigation->land_verified_amount = $request->land_verified_amount;
        $investigation->crop_or_sector_status = $request->crop_or_sector_status;
        $investigation->agent_comments = $request->agent_comments;
        $investigation->recommendation = $request->recommendation;

        // 📸 ৩. মাঠের ছবি আপলোড হ্যান্ডেল করা (সবার নিচে রাখা হলো)
        $imageName = null;
        if ($request->hasFile('investigation_image')) {
            $imageName = 'investigation_' . time() . '.' . $request->investigation_image->extension();
            $request->investigation_image->move(public_path('backend/images/investigations'), $imageName);
        }

        // অবজেক্টে ইমেজের নাম অ্যাসাইন করা
        $investigation->investigation_image = $imageName;

        // ৪. ডাটাবেজে ফাইনালি সেভ করা
        $investigation->save();
        return redirect()->back()->with('success', 'মাঠ তদন্ত রিপোর্ট সফলভাবে করা হয়েছে!');
    }
}
