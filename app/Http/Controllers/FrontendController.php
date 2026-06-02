<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Achievement;
use App\Models\Banner;
use App\Models\Counter;
use App\Models\CTA;
use App\Models\Farmer;
use App\Models\FooterSetting;
use App\Models\Installment;
use App\Models\Investor;
use App\Models\Seba;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class FrontendController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('id', 'asc')->get();
        $counters = Counter::all();
        $sections = AboutSection::all()->keyBy('section_key');
        $sebas = Seba::all();
        $footer = FooterSetting::first();
        $work = Work::first();
        $testimonials = Testimonial::latest()->get();


        return view('frontend.index', compact(
            'banners',
            'counters',
            'sections',
            'work',
            'sebas',
            'footer',
            'testimonials'
        ));
    }

    public function aboutUs()
    {
        $whoWeAre = AboutSection::where('section_key', 'who_we_are')->first();
        $mission = AboutSection::where('section_key', 'mission')->first();
        $futurePlan = AboutSection::where('section_key', 'future_plan')->first();
        $services = Service::latest()->get();
        $sebas = Seba::all();
        $teams = Team::latest()->get();
        $achievements = Achievement::all();
        $why_chooses = WhyChoose::all();
        $testimonials = Testimonial::latest()->get();
        $cta = CTA::first();
        return view('frontend.about', compact(
            'whoWeAre',
            'mission',
            'futurePlan',
            'services',
            'sebas',
            'teams',
            'achievements',
            'why_chooses',
            'testimonials',
            'cta'

        ));
    }

    public function farmer()
    {
        $farmers = Farmer::where('status', 'approved')
            ->latest()
            ->take(6)
            ->get();

        return view('frontend.farmer', compact('farmers'));
    }

    // FRONTEND REGISTER
    public function register(Request $request)
    {
        // ১. ভ্যালিডেশন চেক
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'nid'           => 'required|string',
            'loan_amount'   => 'required|numeric|min:0',
            'loan_duration' => 'required|integer|in:3,6,9,12', // ৩, ৬, ৯, ১২ মাস ভ্যালিডেশন
        ]);

        // ২. মাসিক কিস্তি ব্যাকএন্ডে ক্যালকুলেশন (৭% সুদে)
        $amount = floatval($request->loan_amount);
        $duration = intval($request->loan_duration);
        $interestRate = 0.07; // ৭% সুদ

        $totalPayable = $amount + ($amount * $interestRate);
        $monthlyInstallment = $totalPayable / $duration;

        // ৩. নতুন Farmer অবজেক্ট তৈরি করে ডাটা অ্যাসাইন
        $farmer = new \App\Models\Farmer(); // আপনার মডেলের সঠিক পাথ দিন
        $farmer->name = $request->name;
        $farmer->phone = $request->phone;
        $farmer->nid = $request->nid;
        $farmer->land_amount = $request->land_amount;
        $farmer->loan_amount = $amount;

        // 🎯 এই দুটি লাইন ডাটাবেজে ডাটা পাঠাবে:
        $farmer->loan_duration = $duration;
        $farmer->monthly_installment = $monthlyInstallment;

        $farmer->category = $request->category;
        $farmer->address = $request->address;
        $farmer->password = bcrypt($request->password);
        $farmer->status = 'pending';

        // ইমেজ আপলোডের লজিক
        if ($request->hasFile('farmer_image')) {
            $file = $request->file('farmer_image');
            $filename = 'farmer_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('backend/images/farmer'), $filename);
            $farmer->image = $filename;
        }

        $farmer->save();

        $totalInstallments = $duration;

        for ($i = 1; $i <= $totalInstallments; $i++) {
            Installment::create([
                'farmer_id'      => $farmer->id,
                'installment_no' => $i,
                'amount'         => $monthlyInstallment,
                'due_date'       => now()->addMonths($i)->format('Y-m-d'),
                'status'         => 'unpaid',
            ]);
        }

        return back()->with('success', 'Registration and Loan Application Submitted!');
    }


    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:4',
        ]);


        // আপনার কন্ট্রোলারের লগইন মেথডে গিয়ে দেখুন:
        if (Auth::guard('farmer')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('farmer.dashboard');
        }


        return back()->withErrors(['phone' => 'ফোন নম্বর অথবা পাসওয়ার্ড মেলেনি!']);
    }

    public function Loan($id)
    {
        $maize = Service::with(['benefits', 'faqs'])->find($id);
        return view('frontend.maize-loan', compact('maize'));
    }
    public function riceLoan()
    {
        return view('frontend.rice-loan');
    }
    public function cowLoan()
    {
        return view('frontend.cow-loan');
    }
    public function invesment()
    {
        return view('frontend.invesment');
    }

    public function agent()
    {
        return view('frontend.agent');
    }

    public function agentLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required|min:4',
        ]);

        if (Auth::guard('agent')->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('agent.dashboard');
        }

        return back()->withErrors(['phone' => 'ফোন নম্বর অথবা পাসওয়ার্ড মেলেনি!']);
    }

    public function logoutAgent()
    {
        Auth::guard('agent')->logout();
        return redirect()->route('agent');
    }

    public function admin()
    {
        return view('frontend.admin');
    }
    public function bkash()
    {
        return view('frontend.bkash');
    }
    public function nagad()
    {
        return view('frontend.nagad');
    }
    public function rocket()
    {
        return view('frontend.roket');
    }
    public function bank()
    {
        return view('frontend.bank');
    }
    public function contactUs()
    {
        return view('frontend.contact');
    }
}
