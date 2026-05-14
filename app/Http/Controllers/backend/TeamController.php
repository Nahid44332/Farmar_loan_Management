<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
     public function index() {
        $teams = Team::latest()->get();
        return view('backend.team.index', compact('teams'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required', 'image' => 'required|image']);
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/teams'), $imageName);
        }
        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
        ]);
        return back()->with('success', 'Member added!');
    }

    public function update(Request $request, $id) {
        $member = Team::findOrFail($id);
        $imageName = $member->image;
        if ($request->hasFile('image')) {
            if ($member->image && file_exists(public_path('backend/images/teams/'.$member->image))) {
                unlink(public_path('backend/images/teams/'.$member->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/images/teams'), $imageName);
        }
        $member->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imageName,
        ]);
        return back()->with('success', 'Updated!');
    }

    public function destroy($id) {
        $member = Team::findOrFail($id);
        if ($member->image && file_exists(public_path('teams/'.$member->image))) {
            unlink(public_path('teams/'.$member->image));
        }
        $member->delete();
        return back();
    }
}
