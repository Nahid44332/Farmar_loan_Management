<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\NagadPayment;
use Illuminate\Http\Request;

class NagatPaymentController extends Controller
{
   public function storePayment(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'address'        => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'amount'         => 'required|numeric|min:1',
            'transaction_id' => 'required|string|unique:nagad_payments,transaction_id',
        ], [
            'transaction_id.unique' => 'এই ট্রানজেকশন আইডিটি ইতিমধ্যে ব্যবহার করা হয়েছে!',
        ]);

        $payment = new NagadPayment();
        $payment->name           = $request->name;
        $payment->address        = $request->address;
        $payment->phone          = $request->phone;
        $payment->amount         = $request->amount;
        $payment->transaction_id = $request->transaction_id;
        $payment->status         = 'pending';
        $payment->save();

        return back()->with('success', 'আপনার নগদ পেমেন্ট রিকোয়েস্টটি জমা হয়েছে। অ্যাডমিন ভেরিফাই করে অ্যাপ্রuভ করবেন।');
    }

    // =========================================================================
    // 💻 BACKEND ADMIN METHODS (অ্যাডমিন ম্যানেজমেন্ট)
    // =========================================================================

  // অ্যাডমিন প্যানেল: পেন্ডিং নগদ পেমেন্ট রিকোয়েস্ট
public function pendingList()
{
    $requests = NagadPayment::where('status', 'pending')->latest()->get();

    // স্ল্যাশের বদলে ডট এবং বানানের ভুলটি ঠিক করে দেওয়া হলো
    return view('backend.payment.nagad.pending', compact('requests'));
}

// অ্যাডমিন প্যানেল: অ্যাপ্রুভড নগদ পেমেন্ট লিস্ট
public function approvedList()
{
    $payments = NagadPayment::where('status', 'approved')->latest()->get();

    return view('backend.payment.nagad.index', compact('payments'));
}

    // পেমেন্ট রিকোয়েস্ট অ্যাপ্রুভ করা
    public function approve($id)
    {
        $payment = NagadPayment::findOrFail($id);
        $payment->status = 'approved';
        $payment->save();

        return back()->with('success', 'Nagad Payment approved successfully!');
    }
}
