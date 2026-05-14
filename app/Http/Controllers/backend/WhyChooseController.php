<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{
    public function index()
    {
        $why_chooses = WhyChoose::latest()->get();
        return view('backend.why_choose.index', compact('why_chooses'));
    }

    public function store(Request $request)
    {
        // ভ্যালিডেশন: ডেসক্রিপশন এখন একটি অ্যারে হিসেবে আসবে
        $request->validate([
            'description' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = new WhyChoose();

        // গুরুত্বপূর্ণ অংশ: ডেসক্রিপশন অ্যারেটিকে JSON স্ট্রিং-এ রূপান্তর করে সেভ করা
        $data->description = json_encode($request->description);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/why'), $imageName);
            $data->image = 'backend/images/why/' . $imageName;
        }

        $data->save(); // এখন এটি সফলভাবে ডাটাবেজে সেভ হবে
        return back()->with('success', 'Information added successfully!');
    }
    public function update(Request $request, $id)
    {
        $data = WhyChoose::findOrFail($id);

        $request->validate([
            'description' => 'required|array',
        ]);

        // আপডেটের সময়ও json_encode ব্যবহার করুন
        $data->description = json_encode($request->description);

        if ($request->hasFile('image')) {
            if ($data->image && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('why'), $imageName);
            $data->image = 'why/' . $imageName;
        }

        $data->save();
        return back()->with('success', 'Information updated successfully!');
    }
    // কন্ট্রোলারে গিয়ে মেথডটি এভাবে লিখুন:


    public function delete($id)
    {
        $data = \App\Models\WhyChoose::findOrFail($id);

        // ইমেজ ডিলিট করার জন্য
        if ($data->image && \Illuminate\Support\Facades\File::exists(public_path($data->image))) {
            \Illuminate\Support\Facades\File::delete(public_path($data->image));
        }

        $data->delete();
        return back()->with('success', 'Data deleted successfully!');
    }
}
