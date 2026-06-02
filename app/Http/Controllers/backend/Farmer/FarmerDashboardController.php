<?php

namespace App\Http\Controllers\Backend\Farmer; // ফোল্ডার স্ট্রাকচার অনুযায়ী ক্যাপিটাল করা হলো

use App\Http\Controllers\Controller;
use App\Models\Installment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; // 👈 সঠিক ফাইল ফেসাদ ইমপোর্ট করা হলো

class FarmerDashboardController extends Controller
{
    /**
     * ড্যাশবোর্ড ভিউ করা
     */
    public function index()
    {
        // লগইন করা ফার্মারের ডেটা পেতে: Auth::guard('farmer')->user()
        $farmer = Auth::guard('farmer')->user();

        return view('backend.farmer-panel.dashboard', compact('farmer'));
    }

    /**
     * প্রোফাইল পেজ ভিউ করা
     */
    public function profile()
    {
        return view('backend.farmer-panel.profile.profile');
    }

    /**
     * ১. প্রোফাইল তথ্য আপডেট (NID, মোবাইল, জমি ইত্যাদি)
     */
    public function updateProfile(Request $request)
    {
        $farmer = Auth::guard('farmer')->user();

        // ভ্যালিডেশন চেক
        $request->validate([
            'name'        => 'required|string|max:255',
            'phone'       => 'required|string|max:15|unique:farmers,phone,' . $farmer->id,
            'nid'         => 'nullable|string|max:20',
            'land_amount' => 'required|numeric|min:0',
            'address'     => 'required|string',
        ], [
            'name.required'        => 'পূর্ণ নাম দেওয়া আবশ্যিক।',
            'phone.required'       => 'মোবাইল নম্বর দেওয়া আবশ্যিক।',
            'phone.unique'         => 'এই মোবাইল নম্বরটি ইতিমধ্যে ব্যবহার করা হয়েছে।',
            'land_amount.required' => 'জমির পরিমাণ দেওয়া আবশ্যিক।',
            'address.required'     => 'গ্রাম বা পূর্ণ ঠিকানা দেওয়া আবশ্যিক।',
        ]);

        // ডাটা আপডেট
        $farmer->update([
            'name'        => $request->name,
            'phone'       => $request->phone,
            'nid'         => $request->nid,
            'land_amount' => $request->land_amount,
            'address'     => $request->address,
        ]);

        return redirect()->back()->with('success', 'প্রোফাইল তথ্য সফলভাবে আপডেট করা হয়েছে!');
    }

    /**
     * ২. সিকিউরিটি - পাসওয়ার্ড পরিবর্তন এবং অটো লগআউট
     */
    public function updatePassword(Request $request)
    {
        // ১. ভ্যালিডেশন চেক
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|string|min:6|confirmed',
        ], [
            'current_password.required' => 'বর্তমান পাসওয়ার্ডটি দিন।',
            'new_password.required'     => 'নতুন পাসওয়ার্ডটি দিন।',
            'new_password.min'          => 'নতুন পাসওয়ার্ড কমপক্ষে ৬ অক্ষরের হতে হবে।',
            'new_password.confirmed'    => 'নতুন পাসওয়ার্ড এবং নিশ্চিতকরণ পাসওয়ার্ড মেলেনি।',
        ]);

        $farmer = Auth::guard('farmer')->user();

        // ২. পুরাতন পাসওয়ার্ড সঠিক না হলে ব্যাক করা (সরাসরি ওই ইনপুটের নিচে ইরর দেখানোর জন্য)
        if (!Hash::check($request->current_password, $farmer->password)) {
            return redirect()->back()
                ->withInput() // ইনপুট ভ্যালু ধরে রাখার জন্য
                ->withErrors(['current_password' => 'আপনার পুরাতন পাসওয়ার্ডটি সঠিক নয়।']);
        }

        // ৩. নতুন পাসওয়ার্ড সেভ করা
        $farmer->update([
            'password' => Hash::make($request->new_password)
        ]);

        // ৪. পাসওয়ার্ড চেঞ্জ হলে সরাসরি লগআউট করে দেওয়া
        Auth::guard('farmer')->logout();

        // ৫. সেশন ইনভ্যালিডেট ও টোকেন রিজেনারেট করা (সিকিউরিটির জন্য)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // ৬. মেসেজসহ লগইন পেজে পাঠিয়ে দেওয়া (এখানে আপনার ফারমার লগইন রাউটের নাম দিন)
        return redirect()->route('farmer.login')->with('success', 'পাসওয়ার্ড সফলভাবে পরিবর্তন হয়েছে। অনুগ্রহ করে নতুন পাসওয়ার্ড দিয়ে আবার লগইন করুন।');
    }

    /**
     * ৩. প্রোফাইল ইমেজ বা ছবি পরিবর্তন
     */
    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'image.required' => 'একটি ছবি নির্বাচন করুন।',
            'image.image'    => 'ফাইলটি অবশ্যই একটি ছবি হতে হবে।',
            'image.max'      => 'ছবি সাইজ ২ এমবি (2MB) এর বেশি হতে পারবে না।',
        ]);

        $farmer = Auth::guard('farmer')->user();

        if ($request->hasFile('image')) {
            // আগের ছবি থাকলে তা পাবলিক ফোল্ডার থেকে ডিলিট করা
            if ($farmer->image) {
                $oldImagePath = public_path('backend/images/farmer/' . $farmer->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // নতুন ছবি আপলোড ও নাম জেনারেট করা
            $image = $request->file('image');
            $imageName = 'farmer_' . time() . '.' . $image->getClientOriginalExtension();

            // ছবি নির্দিষ্ট ফোল্ডারে সেভ করা
            $image->move(public_path('backend/images/farmer'), $imageName);

            // ডাটাবেজে ছবির নাম আপডেট
            $farmer->update([
                'image' => $imageName
            ]);
        }

        return redirect()->back()->with('success', 'প্রোফাইল ছবি সফলভাবে পরিবর্তন করা হয়েছে!');
    }

    public function farmerLoan()
    {
        $farmer = Auth::guard('farmer')->user();
        return view('backend.farmer-panel.loan.loan', compact('farmer'));
    }

    public function farmerPaymennts()
    {
        $farmerId = auth()->guard('farmer')->id() ?? auth()->id();

        $installments = Installment::where('farmer_id', $farmerId)
            ->orderBy('installment_no', 'asc')
            ->get();
        return view('backend.farmer-panel.farmer-payment.payment', compact('installments'));
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'installment_id' => 'required|exists:installments,id',
            'payment_method' => 'required|string|in:bkash,nagad,rocket,bank',
            'transaction_id' => 'required|string|unique:transactions,transaction_id',
            'amount'         => 'required|numeric|min:1',
        ]);

        $farmerId = auth()->guard('farmer')->id() ?? auth()->id();

        Transaction::create([
            'farmer_id'      => $farmerId,
            'installment_id' => $request->installment_id,
            'transaction_id' => $request->transaction_id,
            'payment_method' => $request->payment_method,
            'amount'         => $request->amount,
            'status'         => 'pending',
        ]);

        return back()->with('success', 'আপনার পেমেন্টের তথ্যটি জমা হয়েছে। এডমিন যাচাই করে এপ্রুভ করবেন!');
    }
}
