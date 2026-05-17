<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function index()
    {
        // ডাটাবেজে রেকর্ড না থাকলে ডিফল্ট ডাটা দিয়ে তৈরি করে নিবে
        $work = Work::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'How We do work',
                'image' => null,
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ]
        );

        return view('backend.work.index', compact('work'));
    }

    public function update(Request $request)
    {
        $work = Work::findOrFail(1);

        $request->validate([
            'title'     => 'required|string|max:255',
            'video_url' => 'required|string',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp,avif'
        ]);

        $work->title = $request->title;
        
        // ইউটিউব লিংক যেন পপআপ মডালে পারফেক্টলি সাপোর্ট করে, সেজন্য এমবেড (embed) কনভার্ট লজিক
        $url = $request->video_url;
        if (str_contains($url, 'watch?v=')) {
            $url = str_replace('watch?v=', 'embed/', $url);
            $url = explode('&', $url)[0];
        } elseif (str_contains($url, 'youtu.be/')) {
            $url = str_replace('youtu.be/', 'youtube.com/embed/', $url);
        }
        $work->video_url = $url;

        // ইমেজ আপলোড হ্যান্ডেলিং
        if ($request->hasFile('image')) {
            if ($work->image && file_exists(public_path($work->image))) {
                @unlink(public_path($work->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/works'), $imageName);
            $work->image = 'uploads/works/' . $imageName;
        }

        $work->save();

        return redirect()->back()->with('success', 'Work Video Section Updated Successfully!');
    }
}
