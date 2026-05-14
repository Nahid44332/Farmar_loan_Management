<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

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
        ]);

        $data = new Testimonial();
        $data->comment = $request->comment;
        $data->name = $request->name;
        $data->designation = $request->designation;
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
        ]);

        $data->comment = $request->comment;
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->save(); // এখানে $data->update() ও ব্যবহার করা যায়

        return back()->with('success', 'মতামত সফলভাবে আপডেট হয়েছে!');
    }

    // ডাটা ডিলিট করার জন্য
    public function destroy($id)
    {
        $data = Testimonial::findOrFail($id);
        $data->delete();

        return back()->with('success', 'মতামত মুছে ফেলা হয়েছে!');
    }
}
