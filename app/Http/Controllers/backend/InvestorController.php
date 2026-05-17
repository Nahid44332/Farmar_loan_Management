<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class InvestorController extends Controller
{
public function membershipRequests() 
    {
        $requests = Investor::where('status', 'pending')->latest()->get(); 
        return view('backend.investor.membership', compact('requests'));
    }

    // অ্যাডমিন প্যানেল: অ্যাপ্রুভড ইনভেস্টর লিস্ট
    public function agentList() 
    {
        $investors = Investor::where('status', 'approved')->latest()->get();
        return view('backend.investor.index', compact('investors'));
    }

    // ইনভেস্টর রিকোয়েস্ট অ্যাপ্রুভ করা
    public function approve($id) 
    {
        $investor = Investor::findOrFail($id); 
        $investor->status = 'approved';
        $investor->save();
        
        return back()->with('success', 'Investor approved successfully!');
    }

    // একটিভ ইনভেস্টরকে সাসপেন্ড করা (স্ট্যাটাস আবার পেন্ডিং করা)
    public function suspend($id) 
    {
        $investor = Investor::findOrFail($id);
        $investor->status = 'pending'; 
        $investor->save();
        
        return back()->with('success', 'Investor has been suspended successfully!');
    }
}