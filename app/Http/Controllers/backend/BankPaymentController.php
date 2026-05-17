<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\BankPayment;
use Illuminate\Http\Request;

class BankPaymentController extends Controller
{
    // 🌐 FRONTEND METHOD: পেমেন্ট রিকোয়েস্ট ডাটাবেজে সেভ করা
    public function storePayment(Request $request)
    {
        $request->validate([
            'bank_name'      => 'required|string',
            'name'           => 'required|string|max:255',
            'address'        => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'amount'         => 'required|numeric|min:1',
            'transaction_id' => 'required|string|unique:bank_payments,transaction_id',
        ], [
            'transaction_id.unique' => 'এই ট্রানজেকশন আইডি/অ্যাকাউন্ট নম্বরটি ইতিমধ্যে ব্যবহার করা হয়েছে!',
        ]);

        $payment = new BankPayment();
        $payment->bank_name      = $request->bank_name; // কোন ব্যাংক থেকে এসেছে
        $payment->name           = $request->name;
        $payment->address        = $request->address;
        $payment->phone          = $request->phone;
        $payment->amount         = $request->amount;
        $payment->transaction_id = $request->transaction_id;
        $payment->status         = 'pending';
        $payment->save();

        return back()->with('success', $request->bank_name . ' পেমেন্ট রিকোয়েস্টটি সফলভাবে জমা হয়েছে।');
    }

    // 💻 BACKEND ADMIN METHODS
    public function pendingList()
    {
        $requests = BankPayment::where('status', 'pending')->latest()->get();
        return view('backend.payment.bank.pending', compact('requests')); 
    }

    public function approvedList()
    {
        $payments = BankPayment::where('status', 'approved')->latest()->get();
        return view('backend.payment.bank.index', compact('payments'));
    }

    public function approve($id)
    {
        $payment = BankPayment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return back()->with('success', 'Bank Payment approved successfully!');
    }
}
