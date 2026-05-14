<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index() {
        $achievements = Achievement::latest()->get();
        return view('backend.achievement.index', compact('achievements'));
    }

    public function store(Request $request) {
    // ডাটা ভ্যালিডেট করে একটি ভ্যারিয়েবলে রাখুন
    $validatedData = $request->validate([
        'count_number' => 'required',
        'title' => 'required'
    ]);

    // শুধু ভ্যালিড ডাটাগুলো (count_number এবং title) পাঠাবে, টোকেন বাদ যাবে
    Achievement::create($validatedData); 

    return back()->with('success', 'Achievement added!');
}

    public function update(Request $request, $id) {
        $item = Achievement::findOrFail($id);
        $item->update($request->all());
        return back()->with('success', 'Updated!');
    }

    public function destroy($id) {
        Achievement::findOrFail($id)->delete();
        return back();
    }
}
