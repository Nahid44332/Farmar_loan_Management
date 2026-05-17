<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('backend.testimonial.index', compact('testimonials'));
    }

    // ডাটা সেভ করার জন্য
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ইমেজ ভ্যালিডেশন
        ]);

        $data = new Testimonial();
        $data->comment = $request->comment;
        $data->name = $request->name;
        $data->designation = $request->designation;

        // ইমেজ আপলোড প্রসেস
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $imageName);
            $data->image = 'uploads/testimonials/' . $imageName;
        }

        $data->save();

        return back()->with('success', 'মতামত সফলভাবে যুক্ত হয়েছে!');
    }

    // ডাটা আপডেট করার জন্য
    public function update(Request $request, $id)
    {
        $data = Testimonial::findOrFail($id);

        $request->validate([
            'comment' => 'required',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // ইমেজ ভ্যালিডেশন
        ]);

        $data->comment = $request->comment;
        $data->name = $request->name;
        $data->designation = $request->designation;

        // ইমেজ আপডেট প্রসেস
        if ($request->hasFile('image')) {
            // যদি আগের কোনো ইমেজ থেকে থাকে, তবে সেটি স্টোরেজ থেকে ডিলিট করে দেওয়া হবে
            if ($data->image && File::exists(public_path($data->image))) {
                File::delete(public_path($data->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/testimonials'), $imageName);
            $data->image = 'uploads/testimonials/' . $imageName;
        }

        $data->save();

        return back()->with('success', 'মতামত সফলভাবে আপডেট হয়েছে!');
    }

    // ডাটা ডিলিট করার জন্য
    public function destroy($id)
    {
        $data = Testimonial::findOrFail($id);
        
        // ডিলিট করার সময় ফোল্ডার থেকেও ইমেজটি ডিলিট করে দেওয়া হবে
        if ($data->image && File::exists(public_path($data->image))) {
            File::delete(public_path($data->image));
        }

        $data->delete();

        return back()->with('success', 'মতামত মুছে ফেলা হয়েছে!');
    }
}
