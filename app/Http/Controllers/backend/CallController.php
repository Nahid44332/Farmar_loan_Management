<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CTA;
use Illuminate\Http\Request;

class CallController extends Controller
{
     public function index()
    {
        $cta = CTA::first(); // আমরা শুধু প্রথম ডাটাটিই ব্যবহার করব
        return view('backend.cta.index', compact('cta'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'button_text' => 'required',
            'button_link' => 'required',
        ]);

        $cta = CTA::first() ?? new CTA(); // ডাটা না থাকলে নতুন তৈরি হবে
        $cta->title = $request->title;
        $cta->description = $request->description;
        $cta->button_text = $request->button_text;
        $cta->button_link = $request->button_link;
        $cta->save();

        return back()->with('success', 'CTA সফলভাবে আপডেট হয়েছে!');
    }
}
