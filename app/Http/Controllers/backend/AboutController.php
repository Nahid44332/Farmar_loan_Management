<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Backend View
     */
    public function index()
    {
        $sections = AboutSection::all()->keyBy('section_key');

        return view('backend.about.index', compact('sections'));
    }

    /**
     * Update Section
     */
    public function update(Request $request, $key)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp,avif'
        ]);

        // find or create
        $section = AboutSection::firstOrNew([
            'section_key' => $key
        ]);

        // assign data
        $section->title = $request->title;
        $section->description = $request->description;

        // image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('/backend/images/about'), $imageName);

            $section->image = '/backend/images/about/' . $imageName;
        }

        // save
        $section->save();

        return back()->with('success', 'Section Updated Successfully');
    }
}
