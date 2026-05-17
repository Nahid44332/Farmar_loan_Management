<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Seba;
use Illuminate\Http\Request;

class SebaController extends Controller
{
    public function index()
    {
        
        $sebas = Seba::latest()->get();
        return view('backend.seba.index', compact('sebas'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // ফাইলের একটি ইউনিক নাম তৈরি করা
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            // সরাসরি public/sebas ফোল্ডারে ফাইলটি পাঠিয়ে দেওয়া (ফোল্ডার পাথও সেঞ্জ করা হলো)
            $image->move(public_path('sebas'), $imageName);
        }

        Seba::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // ডাটাবেজে শুধু নাম সেভ হবে
            'button_link' => $request->button_link,
        ]);

        return redirect()->route('seba.index')->with('success', 'Seba added successfully');
    }


    public function update(Request $request, $id)
    {
        $seba = Seba::findOrFail($id);
        $imageName = $seba->image;

        if ($request->hasFile('image')) {
            // নতুন ইমেজ আপলোড হলে আগের ইমেজটি ডিলিট করার লজিক
            if ($seba->image && file_exists(public_path('sebas/' . $seba->image))) {
                unlink(public_path('sebas/' . $seba->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('sebas'), $imageName);
        }

        $seba->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'button_link' => $request->button_link,
        ]);

        return redirect()->route('seba.index')->with('success', 'Updated successfully');
    }

    public function destroy($id)
    {
        $seba = Seba::findOrFail($id);
        
        // ডিলিট করার সময় যেন সার্ভার/পাবলিক ফোল্ডার থেকেও ইমেজটি ডিলিট হয়ে যায়
        if ($seba->image && file_exists(public_path('sebas/' . $seba->image))) {
            unlink(public_path('sebas/' . $seba->image));
        }

        $seba->delete();
        return back()->with('success', 'Deleted successfully');
    }
}