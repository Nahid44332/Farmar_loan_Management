<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BkashPayment;
use Illuminate\Http\Request;

class BkashPaymentController extends Controller
{
    public function storePayment(Request $request)
    {
        // ১. ভ্যালিডেশন
        $request->validate([
            'name'           => 'required|string|max:255',
            'address'        => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'amount'         => 'required|numeric|min:1',
            'transaction_id' => 'required|string|unique:bkash_payments,transaction_id',
        ], [
            'transaction_id.unique' => 'এই ট্রানজেকশন আইডিটি ইতিমধ্যে ব্যবহার করা হয়েছে!',
        ]);

        // ২. ডেটা সেভ করা
        $payment = new BkashPayment();
        $payment->name           = $request->name;
        $payment->address        = $request->address;
        $payment->phone          = $request->phone;
        $payment->amount         = $request->amount;
        $payment->transaction_id = $request->transaction_id;
        $payment->status         = 'pending'; // শুরুতে পেন্ডিং থাকবে
        $payment->save();

        return back()->with('success', 'আপনার পেমেন্ট রিকোয়েস্টটি জমা হয়েছে। অ্যাডমিন ভেরিফাই করে অ্যাপ্রুভ করবেন।');
    }

    // =========================================================================
    // 💻 BACKEND ADMIN METHODS (অ্যাডমিন ম্যানেজমেন্ট)
    // =========================================================================

    // অ্যাডমিন প্যানেল: পেন্ডিং পেমেন্ট রিকোয়েস্ট লিস্ট
    public function pendingList()
    {
        $requests = BkashPayment::where('status', 'pending')->latest()->get();
        return view('backend.payment.bkash.panding', compact('requests')); 
    }

    // অ্যাডমিন প্যানেল: অ্যাপ্রুভড পেমেন্ট লিস্ট
    public function approvedList()
    {
        $payments = BkashPayment::where('status', 'approved')->latest()->get();
        return view('backend.payment.bkash.index', compact('payments'));
    }

    // পেমেন্ট রিকোয়েস্ট অ্যাপ্রুভ করা
    public function approve($id)
    {
        $payment = BkashPayment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return back()->with('success', 'Payment approved successfully!');
    }
}
