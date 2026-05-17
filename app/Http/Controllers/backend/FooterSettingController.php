<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
     public function index()
    {
        $footer = FooterSetting::first();

        return view('backend.footer.index', compact('footer'));
    }

    // store or update
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
        ]);

        $footer = FooterSetting::first();

        if (!$footer) {
            $footer = new FooterSetting();
        }

        $footer->location = $request->location;
        $footer->phone = $request->phone;
        $footer->email = $request->email;

        $footer->facebook = $request->facebook;
        $footer->twitter = $request->twitter;
        $footer->linkedin = $request->linkedin;
        $footer->instagram = $request->instagram;

        $footer->about_text = $request->about_text;
        $footer->newsletter_text = $request->newsletter_text;

        $footer->save();

        return back()->with('success', 'Footer settings updated successfully!');
    }
}