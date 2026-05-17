<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contactStore(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string|max:20',
            'message' => 'required|string',
        ], [
            'name.required'    => 'অনুগ্রহ করে আপনার নাম লিখুন।',
            'email.required'   => 'আপনার ইমেইল আইডি দেওয়া আবশ্যিক।',
            'email.email'      => 'সঠিক ইমেইল এড্রেস লিখুন।',
            'phone.required'   => 'যোগাযোগের জন্য ফোন নম্বর দিন।',
            'message.required' => 'আপনার মেসেজ বা বক্তব্যটি লিখুন।',
        ]);

        ContactMessage::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
        ]);

        return back()->with('success', 'আপনার মেসেজটি সফলভাবে আমাদের কাছে পৌঁছেছে। ধন্যবাদ!');
    }

    // 💻 BACKEND ADMIN METHODS

    public function markAsRead($id)
{
    $message = ContactMessage::findOrFail($id); // আপনার মডেলের নাম অনুযায়ী পরিবর্তন করে নিবেন
    if ($message->status == 'unread') {
        $message->update(['status' => 'read']);
    }

    return response()->json(['success' => true]);
}
    public function index()
    {
        // সব মেসেজ একসাথে দেখতে
        $messages = ContactMessage::latest()->get();
        return view('backend.contact.index', compact('messages'));
    }


    public function destroy($id)
    {
        $message = ContactController::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Message deleted successfully!');
    }
}
