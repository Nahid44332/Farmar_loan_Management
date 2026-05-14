<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Http\Request;

class CowController extends Controller
{
    public function cowAdmin($id)
   {
      $cowService = Service::findOrFail($id);
      $services = Service::all();
      return view('backend.cow.index', compact('cowService', 'services'));
   }

   public function cowUpdate(Request $request, $id)
   {
      $request->validate([
         'name'  => 'required',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
      ]);

      try {
         $service = Service::findOrFail($id);
         $service->name     = $request->name;
         $service->desc_one = $request->desc_one;
         $service->desc_two = $request->desc_two;

         if ($request->hasFile('image')) {
            if ($service->image && file_exists(public_path($service->image))) {
               unlink(public_path($service->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('backend/images/service');
            $image->move($path, $imageName);

            $service->image = 'backend/images/service/' . $imageName;
         }

         $service->save();
         return redirect()->back()->with('success', 'মামা, গরুর খামার ঋণ ডাটা একদম আপডেট হয়ে গেছে! 🐄🔥');
      } catch (\Exception $e) {
         return redirect()->back()->with('error', 'ঝামেলা হইছে: ' . $e->getMessage());
      }
   }

   public function benefitSave(Request $request, $service_id)
   {
      if ($request->has('title')) {
         foreach ($request->title as $key => $title) {
            if (!empty($title)) {
               Benefit::create([
                  'service_id'  => $service_id,
                  'icon'        => $request->icon[$key] ?? 'fa fa-check',
                  'title'       => $title,
                  'description' => $request->description[$key] ?? '',
               ]);
            }
         }
      }
      return back()->with('success', 'মামা, নতুন বেনিফিটগুলো সফলভাবে অ্যাড হয়েছে!');
   }

   public function benefitCard($id)
   {
      $cowService = Service::findOrFail($id);
      $services = Service::all();
      $benefits = Benefit::where('service_id', $id)->get();
      return view('backend.cow.benefit', compact('cowService', 'benefits', 'services'));
   }

   public function benefitUpdate(Request $request, $id)
   {
      $request->validate([
         'icon'        => 'required|string',
         'title'       => 'required|string|max:255',
         'description' => 'nullable|string',
      ]);

      try {
         $benefit = Benefit::findOrFail($id);
         $benefit->update([
            'icon'        => $request->icon,
            'title'       => $request->title,
            'description' => $request->description,
         ]);
         return back()->with('success', 'মামা, বেনিফিট আইটেমটি সফলভাবে আপডেট হয়েছে! 😎');
      } catch (\Exception $e) {
         return back()->with('error', 'ওহ মামা! কিছু একটা সমস্যা হয়েছে।');
      }
   }

   public function benefitDelete($id)
   {
      try {
         $benefit = Benefit::findOrFail($id);
         $benefit->delete();
         return back()->with('success', 'মামা, বেনিফিট সফলভাবে ডিলিট হয়েছে! 🗑️');
      } catch (\Exception $e) {
         return back()->with('error', 'মামা, ডিলিট করতে সমস্যা হয়েছে।');
      }
   }

   public function cowFaq($id)
   {
      $faqs = Faq::where('service_id', $id)->get();
      $services = Service::all();
      $currentService = Service::findOrFail($id);
      return view('backend.cow.faq', compact('faqs', 'services', 'currentService'));
   }

   public function store(Request $request)
   {
      $request->validate([
         'service_id' => 'required',
         'question'   => 'required|array',
         'answer'     => 'required|array',
      ]);

      try {
         foreach ($request->question as $key => $val) {
            if (!empty($request->question[$key]) && !empty($request->answer[$key])) {
               Faq::create([
                  'service_id' => $request->service_id,
                  'question'   => $request->question[$key],
                  'answer'     => $request->answer[$key],
               ]);
            }
         }
         return back()->with('success', 'মামা, সবগুলো FAQ সফলভাবে অ্যাড হয়েছে! ✅');
      } catch (\Exception $e) {
         return back()->with('error', 'মামা, কিছু একটা ঝামেলা হয়েছে: ' . $e->getMessage());
      }
   }

   public function update(Request $request, $id)
   {
      $request->validate([
         'question' => 'required|string|max:255',
         'answer'   => 'required|string',
      ]);

      try {
         $faq = Faq::findOrFail($id);
         $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
         ]);
         return back()->with('success', 'মামা, FAQ সফলভাবে আপডেট হয়েছে! 🚀');
      } catch (\Exception $e) {
         return back()->with('error', 'মামা, আপডেট করতে সমস্যা হয়েছে।');
      }
   }

   public function delete($id)
   {
      try {
         $faq = Faq::findOrFail($id);
         $faq->delete();
         return back()->with('success', 'মামা, FAQ ডিলিট হয়ে গেছে! 🗑️');
      } catch (\Exception $e) {
         return back()->with('error', 'মামা, ডিলিট করতে সমস্যা হয়েছে।');
      }
   }
}
