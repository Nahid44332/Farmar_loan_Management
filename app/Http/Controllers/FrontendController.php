<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use App\Models\Achievement;
use App\Models\Banner;
use App\Models\Counter;
use App\Models\CTA;
use App\Models\Farmer;
use App\Models\FooterSetting;
use App\Models\Investor;
use App\Models\Seba;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class FrontendController extends Controller
{
   public function index()
   {
    $banners = Banner::orderBy('id','asc')->get();
   $counters = Counter::all();
   $sections = AboutSection::all()->keyBy('section_key');
           $sebas = Seba::all();
 $footer = FooterSetting::first();
 $work = Work::first();
 $testimonials = Testimonial::latest()->get();


    return view('frontend.index', compact('banners', 'counters','sections', 'work',
            'sebas','footer','testimonials'));
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
         $farmers = Farmer::where('status','approved')
                    ->latest()
                    ->take(6)
                    ->get();

        return view('frontend.farmer', compact('farmers'));
   }

       // FRONTEND REGISTER
    public function register(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'phone' => 'required|unique:farmers',
            'nid' => 'required|unique:farmers',
            'loan_amount' => 'required',
            'category' => 'required',
            'address' => 'required',
            'password' => 'required|min:4',

        ]);

        $imageName = null;

        if($request->hasFile('farmer_image')){

            $image = $request->file('farmer_image');

            $imageName = time().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('backend/images/farmer'), $imageName);
        }

        Farmer::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'nid' => $request->nid,
            'land_amount' => $request->land_amount,
            'loan_amount' => $request->loan_amount,
            'category' => $request->category,
            'image' => $imageName,
            'address' => $request->address,
            'password' => Hash::make($request->password),

            // DEFAULT PENDING
            'status' => 'pending',

        ]);

        return back()->with('success','Application Submitted Successfully');
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

    public function registered(Request $request) 
    {
        // ১. ভ্যালিডেশন
        $request->validate([
            'first_name'       => 'required|string|max:255',
            'last_name'        => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:investors,email',
            'phone'            => 'required|string|max:20',
            'investment_range' => 'required|string',
            'nid_front'        => 'required|image|mimes:jpeg,png,jpg|max:2048', // সর্বোচ্চ ২ মেগাবাইট
            'nid_back'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password'         => 'required|string|min:6',
        ]);

        // ২. নতুন ইনভেস্টর অবজেক্ট তৈরি
        $investor = new Investor();
        $investor->first_name       = $request->first_name;
        $investor->last_name        = $request->last_name;
        $investor->email            = $request->email;
        $investor->phone            = $request->phone;
        $investor->investment_range = $request->investment_range;
        $investor->password         = Hash::make($request->password); // পাসওয়ার্ড হ্যাশ করা
        $investor->status           = 'pending'; // ডিফল্ট স্ট্যাটাস পেন্ডিং থাকবে


        $uploadPath = public_path('uploads/investors');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        if ($request->hasFile('nid_front')) {
            $file = $request->file('nid_front');
            $filename = 'nid_front_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $investor->nid_front = $filename;
        }


        if ($request->hasFile('nid_back')) {
            $file = $request->file('nid_back');
            $filename = 'nid_back_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadPath, $filename);
            $investor->nid_back = $filename;
        }

        $investor->save();


        return back()->with('success', 'Your investor application has been submitted and is pending approval.');
    }
   public function agent()
   {
    return view('frontend.agent');
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
