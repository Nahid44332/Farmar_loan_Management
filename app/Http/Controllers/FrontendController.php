<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\CTA;
use App\Models\Farmer;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
   public function index()
   {
    return view('frontend.index');
   }

   public function aboutUs()
   {
    $teams = Team::latest()->get();
    $achievements = Achievement::all();
    $why_chooses = WhyChoose::all();
    $testimonials = Testimonial::latest()->get();
     $cta = CTA::first();
    return view('frontend.about', compact('teams',
     'achievements',
     'why_chooses',
     'testimonials',
     'cta'));
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
