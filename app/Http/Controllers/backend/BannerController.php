<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
public function index()
    {
        // লুপ দিয়ে নিশ্চিত করা হচ্ছে যেন ডাটাবেজে ফিক্সড ৩টি স্লাইড (ID 1, 2, 3) থাকে
        for ($i = 1; $i <= 3; $i++) {
            Banner::firstOrCreate(['id' => $i]);
        }

        $banners = Banner::orderBy('id', 'asc')->get();
        return view('backend.banner', compact('banners'));
    }

    /**
     * ব্যানার স্লাইড আপডেট করার মূল মেথড
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // ইনপুট ভ্যালিডেশন
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'read_more_url' => 'nullable|string',
            'contact_url' => 'nullable|string',
        ]);

        // ইমেজ আপলোড মেকানিজম
        if ($request->hasFile('image')) {
            
            // পূর্বের কোনো ফাইল ফোল্ডারে থাকলে তা রিমুভ করা
            if ($banner->image && file_exists(public_path('uploads/banners/' . $banner->image))) {
                @unlink(public_path('uploads/banners/' . $banner->image));
            }

            $image = $request->file('image');
            // প্রতি স্লাইডের জন্য ইউনিক নাম তৈরি (যেমন: banner-1-1715843452.jpg)
            $imageName = 'banner-' . $id . '-' . time() . '.' . $image->getClientOriginalExtension();
            
            // ডিরেক্টরি পাথ সেটআপ ও অটো ক্রিয়েশন (যদি ফোল্ডার না থাকে)
            $destinationPath = public_path('uploads/banners');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            
            // ফাইলটিকে নির্দিষ্ট ফোল্ডারে পাঠানো
            $image->move($destinationPath, $imageName);
            
            // ডাটাবেজ কলামে শুধুমাত্র ফাইলের নামটি অ্যাসাইন করা
            $banner->image = $imageName;
        }

        // বাকি টেক্সট ফিল্ডগুলো সরাসরি অবজেক্টে অ্যাসাইন করে অবজেক্ট ট্র্যাকিং সেভ
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->read_more_url = $request->read_more_url;
        $banner->contact_url = $request->contact_url;
        
        // ডাটাবেজে পরিবর্তনগুলো ফোর্স সেভ করা
        $banner->save();

        return redirect()->back()->with('success', 'Slide ' . $id . ' Updated Successfully!');
    }
}