<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashbord()
    {
        // ১. নিরাপত্তা চেক: যদি কোনো ইউজার লগইন ছাড়া সরাসরি এই ইউআরএল-এ আসে, তবে তাকে লগইন পেজে পাঠিয়ে দেবে
        if (!Auth::check()) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Please login first.']);
        }

        // ২. ড্যাশবোর্ডের কার্ডে দেখানোর জন্য ডেটা কাউন্ট করা
        $pendingInvestors  = Investor::where('status', 'pending')->count();
        $approvedInvestors = Investor::where('status', 'approved')->count();
        
        // আপনার প্রোজেক্টে যদি অন্যান্য টেবিল থাকে (যেমন: Farmers বা Loans), সেগুলোর কাউন্টও এখানে এভাবে নিতে পারেন:
        // $totalFarmers = User::where('role', 'farmer')->count(); 

        // ৩. compact() এর মাধ্যমে ডেটাগুলো ব্লেড ভিউতে পাঠানো হলো
        return view('backend.dashboard', compact('pendingInvestors', 'approvedInvestors'));
    }
}