<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\RocketPayment;
use Illuminate\Http\Request;

class RocketPaymentController extends Controller
{
   public function storePayment(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'address'        => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'amount'         => 'required|numeric|min:1',
            'transaction_id' => 'required|string|unique:rocket_payments,transaction_id',
        ], [
            'transaction_id.unique' => 'এই ট্রানজেকশন আইডিটি ইতিমধ্যে ব্যবহার করা হয়েছে!',
        ]);

        $payment = new RocketPayment();
        $payment->name           = $request->name;
        $payment->address        = $request->address;
        $payment->phone          = $request->phone;
        $payment->amount         = $request->amount;
        $payment->transaction_id = $request->transaction_id;
        $payment->status         = 'pending';
        $payment->save();

        return back()->with('success', 'আপনার রকেট পেমেন্ট রিকোয়েস্টটি সফলভাবে জমা হয়েছে।');
    }

    // 💻 BACKEND ADMIN METHODS
    public function pendingList()
    {
        $requests = RocketPayment::where('status', 'pending')->latest()->get();
        // উইন্ডোজের পাথ ম্যাচিং ঠিক রাখার জন্য ডট বা ব্যাকস্ল্যাশ খেয়াল রাখবেন
        return view('backend.payment.rocket.pending', compact('requests')); 
    }

    public function approvedList()
    {
        $payments = RocketPayment::where('status', 'approved')->latest()->get();
        return view('backend.payment.rocket.index', compact('payments'));
    }

    public function approve($id)
    {
        $payment = RocketPayment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return back()->with('success', 'Rocket Payment approved successfully!');
    }
}
