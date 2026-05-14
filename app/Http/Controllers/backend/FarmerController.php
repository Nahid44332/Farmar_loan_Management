<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{

    // ADMIN FARMER LIST
    public function index()
{
    $farmers = Farmer::where('status','pending')
                ->latest()
                ->get();

    return view('backend.farmer.index',compact('farmers'));
}

public function approvedList()
{
    $farmers = Farmer::where('status','approved')
                ->latest()
                ->get();

    return view('backend.farmer.approve',compact('farmers'));
}
    // APPROVE
    public function approve($id)
{
    Farmer::findOrFail($id)->update([
        'status' => 'approved'
    ]);

    return redirect('/admin/farmers/approved')
           ->with('success','Farmer Approved Successfully');
}


    // REJECT
    public function reject($id)
    {

        Farmer::findOrFail($id)->update([

            'status' => 'rejected'

        ]);

        return back()->with('success','Farmer Rejected');

    }

}
