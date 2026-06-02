@extends('backend.farmer-panel.master')
@section('content')
    <div class="p-6 bg-slate-50 min-h-screen">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-black text-slate-800 flex items-center gap-2">
                👋 স্বাগতম, {{ Auth::guard('farmer')->user()->name ?? 'চাষী' }} মামা!
            </h1>
            <p class="text-sm text-slate-500 mt-1">আপনার খামার, লোন এবং পেমেন্টের সর্বশেষ আপডেট এখানে দেখুন।</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs bg-emerald-500/10 text-emerald-600 font-bold px-3 py-1.5 rounded-full border border-emerald-500/20">
                <i class="fa-solid fa-circle text-[8px] mr-1 animate-pulse"></i> আইডি: #FMR-{{ Auth::guard('farmer')->user()->id ?? '00' }}
            </span>
            <span class="text-xs bg-blue-50/80 text-blue-600 font-bold px-3 py-1.5 rounded-full border border-blue-200">
                আজকের তারিখ: {{ date('d M, Y') }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between group hover:border-emerald-500 transition-all duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">মোট অনুমোদিত ঋণ</p>
                <h3 class="text-2xl font-black text-slate-800 mt-2">৳{{ number_format(Auth::guard('farmer')->user()->loan_amount ?? 0) }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">
                <i class="fa-solid fa-scale-balanced text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between group hover:border-emerald-500 transition-all duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">পরিশোধিত ঋণ</p>
                <h3 class="text-2xl font-black text-emerald-600 mt-2">৳{{ number_format(Auth::guard('farmer')->user()->paid_amount ?? 0) }}</h3>
            </div>
            <div class="w-12 h-12 bg-emerald-50 text-emerald-500 rounded-xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                <i class="fa-solid fa-circle-check text-xl"></i>
            </div>
        </div>

        @php
            $loan = Auth::guard('farmer')->user()->loan_amount ?? 0;
            $paid = Auth::guard('farmer')->user()->paid_amount ?? 0;
            $due = $loan - $paid;
        @endphp
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between group hover:border-emerald-500 transition-all duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">বকেয়া ঋণ</p>
                <h3 class="text-2xl font-black text-rose-600 mt-2">৳{{ number_format($due) }}</h3>
            </div>
            <div class="w-12 h-12 bg-rose-50 text-rose-500 rounded-xl flex items-center justify-center group-hover:bg-rose-500 group-hover:text-white transition-all duration-300">
                <i class="fa-solid fa-clock-rotate-left text-xl"></i>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center justify-between group hover:border-emerald-500 transition-all duration-300">
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">মোট জমির পরিমাণ</p>
                <h3 class="text-2xl font-black text-amber-600 mt-2">{{ Auth::guard('farmer')->user()->land_amount ?? 0 }} শতাংশ</h3>
            </div>
            <div class="w-12 h-12 bg-amber-50 text-amber-500 rounded-xl flex items-center justify-center group-hover:bg-amber-500 group-hover:text-white transition-all duration-300">
                <i class="fa-solid fa-wheat-awn text-xl"></i>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col justify-between">
            <div>
                <h3 class="text-lg font-bold text-slate-800 mb-4 pb-2 border-b border-slate-100">
                    <i class="fa-solid fa-user-gear mr-1 text-emerald-600"></i> চাষী প্রোফাইল
                </h3>
                
                <div class="text-center my-6">
                    @if(Auth::guard('farmer')->user()->image)
                        <img src="{{ asset('backend/images/farmer/'.Auth::guard('farmer')->user()->image) }}" alt="Farmer Photo" class="w-24 h-24 rounded-2xl mx-auto object-cover border-4 border-emerald-500/10 shadow-md">
                    @else
                        <div class="w-24 h-24 rounded-2xl bg-slate-100 mx-auto flex items-center justify-center border border-slate-200">
                            <i class="fa-solid fa-user text-3xl text-slate-400"></i>
                        </div>
                    @endif
                    <h4 class="text-lg font-black text-slate-800 mt-3">{{ Auth::guard('farmer')->user()->name }}</h4>
                    <span class="text-xs bg-slate-100 px-2.5 py-1 rounded-md text-slate-500 font-medium inline-block mt-1">
                        {{ Auth::guard('farmer')->user()->category ?? 'সাধারণ চাষী' }}
                    </span>
                </div>

                <div class="space-y-3.5 text-sm my-6 border-t border-slate-50 pt-4">
                    <div class="flex justify-between text-slate-600">
                        <span class="font-medium text-slate-400">মোবাইল নম্বর:</span>
                        <span class="font-bold text-slate-800">{{ Auth::guard('farmer')->user()->phone }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span class="font-medium text-slate-400">এনআইডি (NID):</span>
                        <span class="font-bold text-slate-800">{{ Auth::guard('farmer')->user()->nid ?? 'দেওয়া হয়নি' }}</span>
                    </div>
                    <div class="flex justify-between text-slate-600">
                        <span class="font-medium text-slate-400">ঠিকানা:</span>
                        <span class="font-bold text-slate-800 text-right max-w-[150px] truncate">{{ Auth::guard('farmer')->user()->address ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <a href="/farmer/profile" class="block text-center bg-[#064e3b] hover:bg-emerald-700 text-white font-bold text-sm py-3 rounded-xl transition shadow-md shadow-emerald-900/10 no-underline !no-underline">
                প্রোফাইল আপডেট করুন <i class="fa-solid fa-arrow-right text-xs ml-1"></i>
            </a>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 lg:col-span-2">
            <div class="flex justify-between items-center mb-4 pb-2 border-b border-slate-100">
                <h3 class="text-lg font-bold text-slate-800">
                    <i class="fa-solid fa-list-check mr-1 text-emerald-600"></i> সাম্প্রতিক লোনের আবেদনসমূহ
                </h3>
                <a href="/farmer/loan/apply" class="text-xs bg-emerald-500 hover:bg-emerald-600 text-white font-bold px-3 py-2 rounded-xl transition no-underline !no-underline shadow-sm">
                    নতুন আবেদন +
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 text-slate-400 text-[11px] uppercase tracking-wider font-bold">
                            <th class="p-3">আইডি</th>
                            <th class="p-3">লোনের ধরণ</th>
                            <th class="p-3">পরিমাণ</th>
                            <th class="p-3">তারিখ</th>
                            <th class="p-3 text-center">অবস্থা (Status)</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-slate-600 divide-y divide-slate-100">
                        {{-- লারাভেল কন্ট্রোলার থেকে লুপ দিয়ে এখানে ডেটা বসাবেন, নিচে স্যাম্পল দেওয়া হলো --}}
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="p-3 font-bold text-slate-800">#LN-901</td>
                            <td class="p-3 flex items-center gap-2">
                                <i class="fa-solid fa-seedling text-emerald-500"></i> ভুট্টা চাষ ঋণ
                            </td>
                            <td class="p-3 font-black text-slate-800">৳৩০,০০০</td>
                            <td class="p-3 text-xs text-slate-400">১৮ মে, ২০২৬</td>
                            <td class="p-3 text-center">
                                <span class="px-2.5 py-1 bg-amber-50 text-amber-600 border border-amber-200/60 rounded-full text-[11px] font-bold">
                                    Pending
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="p-3 font-bold text-slate-800">#LN-784</td>
                            <td class="p-3 flex items-center gap-2">
                                <i class="fa-solid fa-cow text-amber-600"></i> গবাদি পশু পালন
                            </td>
                            <td class="p-3 font-black text-slate-800">৳১,৫০,০০০</td>
                            <td class="p-3 text-xs text-slate-400">০২ এপ্রিল, ২০২৬</td>
                            <td class="p-3 text-center">
                                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 border border-emerald-200/60 rounded-full text-[11px] font-bold">
                                    Approved
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- 
            <div class="text-center py-8 text-slate-400 text-sm">
                <i class="fa-solid fa-folder-open text-3xl mb-2 opacity-50"></i>
                <p>এখনো কোনো ঋণের আবেদন করা হয়নি।</p>
            </div> 
            --}}
        </div>

    </div>
</div>
@endsection