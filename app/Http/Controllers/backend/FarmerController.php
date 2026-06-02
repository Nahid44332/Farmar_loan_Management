<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use App\Models\FieldInvestigation;
use App\Models\Installment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FarmerController extends Controller
{

    // ADMIN FARMER LIST
    public function index()
    {
        $farmers = Farmer::where('status', 'pending')
            ->latest()
            ->get();

        return view('backend.farmer.index', compact('farmers'));
    }

    public function approvedList()
    {
        $farmers = Farmer::where('status', 'approved')
            ->latest()
            ->get();

        return view('backend.farmer.approve', compact('farmers'));
    }
    // APPROVE
    public function approve($id)
    {
        Farmer::findOrFail($id)->update([
            'status' => 'approved'
        ]);

        return redirect('/admin/farmers/approved')
            ->with('success', 'Farmer Approved Successfully');
    }


    // REJECT
    public function reject($id)
    {

        Farmer::findOrFail($id)->update([

            'status' => 'rejected'

        ]);

        return back()->with('success', 'Farmer Rejected');
    }

    public function pendingPayments()
    {
        // ট্রানজেকশনের সাথে চাষী (farmer) এবং কিস্তির (installment) ডাটা রিলেশনসহ নিয়ে আসা
        $pendingPayments = Transaction::with(['farmer', 'installment'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.farmer.payments.pending', compact('pendingPayments'));
    }

    public function approvePayment($id)
    {

        $transaction = Transaction::findOrFail($id);


        $transaction->update([
            'status' => 'approved'
        ]);

        $installment = Installment::find($transaction->installment_id);

        if ($installment) {
            $installment->update([
                'status' => 'paid'
            ]);
        }

        return redirect()->back()->with('success', 'পেমেন্টটি সফলভাবে এপ্রুভ করা হয়েছে এবং কিস্তি পরিশোধিত হয়েছে!');
    }

    public function FieldVerification(Request $request)
    {
        $query = FieldInvestigation::with(['farmer', 'agent']);

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->whereHas('agent', function ($agentQuery) use ($search) {
                    $agentQuery->where('name', 'like', "%{$search}%");
                })
                    ->orWhereHas('farmer', function ($farmerQuery) use ($search) {
                        $farmerQuery->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('recommendation')) {
            $query->where('recommendation', $request->recommendation);
        }
        $investigations = $query->latest()->get();

        return view('backend.farmer.Field-Verification', compact('investigations'));
    }
}
