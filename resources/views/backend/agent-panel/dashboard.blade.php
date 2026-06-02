@extends('backend.agent-panel.master')
@section('content')
    <div class="container-fluid py-6 px-6 bg-slate-50/50 min-h-screen">
    
    <!-- হেডার বা স্বাগতম সেকশন -->
    <div class="d-flex justify-content-between align-items-center mb-6">
        <div>
            <h3 class="text-2xl font-black text-slate-800 m-0">স্বাগতম, {{ auth()->guard('agent')->user()->name }} মামা! 👋</h3>
            <p class="text-slate-500 text-sm mt-1">আজকের মাঠ পর্যায়ের কাজের আপডেট এবং বিবরণ নিচে দেওয়া হলো।</p>
        </div>
        <div class="text-sm bg-emerald-50 text-emerald-800 px-4 py-2 rounded-xl border border-emerald-100 font-semibold shadow-sm">
            <i class="fa-regular fa-calendar-check mr-1"></i> {{ date('d M, Y') }}
        </div>
    </div>

    <!-- ৪টি মূল কাজের রিকোয়ারমেন্ট অনুযায়ী সামারি কার্ডস (Statistics Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        
        <!-- ১. মোট অ্যাসাইন হওয়া কাজ (Field Verification) -->
        <div class="card border-0 shadow-sm rounded-2xl bg-white transition-all duration-300 hover:-translate-y-1">
            <div class="card-body p-5 d-flex align-items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 d-flex justify-content-center align-items-center text-xl">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                <div>
                    <span class="text-slate-400 block text-xs font-bold uppercase tracking-wider">মোট তদন্তের দায়িত্ব</span>
                    <h3 class="text-2xl font-black text-slate-800 mt-1 mb-0">{{ $total_tasks ?? 0 }}টি</h3>
                </div>
            </div>
        </div>

        <!-- ২. পেন্ডিং রিপোর্ট (Report Submission Pending) -->
        <div class="card border-0 shadow-sm rounded-2xl bg-white transition-all duration-300 hover:-translate-y-1">
            <div class="card-body p-5 d-flex align-items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 d-flex justify-content-center align-items-center text-xl">
                    <i class="fa-solid fa-hourglass-half"></i>
                </div>
                <div>
                    <span class="text-slate-400 block text-xs font-bold uppercase tracking-wider">পেন্ডিং রিপোর্ট</span>
                    <h3 class="text-2xl font-black text-slate-800 mt-1 mb-0">{{ $pending_tasks ?? 0 }}টি</h3>
                </div>
            </div>
        </div>

        <!-- ৩. একটিভ কৃষক মনিটরিং (Farmer Monitoring) -->
        <div class="card border-0 shadow-sm rounded-2xl bg-white transition-all duration-300 hover:-translate-y-1">
            <div class="card-body p-5 d-flex align-items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 d-flex justify-content-center align-items-center text-xl">
                    <i class="fa-solid fa-users-viewfinder"></i>
                </div>
                <div>
                    <span class="text-slate-400 block text-xs font-bold uppercase tracking-wider">চলতি মনিটরিং</span>
                    <h3 class="text-2xl font-black text-slate-800 mt-1 mb-0">{{ $completed_tasks ?? 0 }}জন</h3>
                </div>
            </div>
        </div>

        <!-- ৪. লোন তদারকি (Loan Supervision / Overdue) -->
        <div class="card border-0 shadow-sm rounded-2xl bg-white transition-all duration-300 hover:-translate-y-1">
            <div class="card-body p-5 d-flex align-items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-rose-600 d-flex justify-content-center align-items-center text-xl">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
                <div>
                    <span class="text-slate-400 block text-xs font-bold uppercase tracking-wider">বকেয়া কিস্তি তদারকি</span>
                    <h3 class="text-2xl font-black text-slate-800 mt-1 mb-0">০টি</h3>
                </div>
            </div>
        </div>

    </div>

    <!-- কুইক অ্যাকশন এবং কারেন্ট টাস্ক লিস্ট এরিয়া -->
    <div class="row g-6">
        
        <!-- বাম পাশের সেকশন: সাম্প্রতিক কাজের নোটিশ বা লিস্ট -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-2xl bg-white h-100">
                <div class="card-body p-6">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h5 class="text-lg font-bold text-slate-800 m-0">🌾 সাম্প্রতিক অ্যাসাইন হওয়া লোনসমূহ</h5>
                            <p class="text-slate-400 text-xs mt-0.5">দ্রুত ভেরিফিকেশন শেষ করে রিপোর্ট জমা দিন</p>
                        </div>
                        <a href="#" class="btn btn-sm text-xs font-bold text-emerald-600 hover:text-emerald-700 bg-emerald-50 hover:bg-emerald-100 px-3 py-2 rounded-xl border-0 no-underline transition-all">
                            সবগুলো দেখুন <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>

                    <!-- ছোট একটি তালিকা টেস্ট করার জন্য -->
                    <div class="table-responsive border border-slate-100 rounded-xl">
                        <table class="table table-hover align-middle mb-0 text-sm">
                            <thead class="bg-slate-50 text-slate-600 border-b border-slate-100">
                                <tr>
                                    <th class="p-4 font-semibold text-start">চাষীর তথ্য</th>
                                    <th class="p-4 font-semibold text-start">টাকার পরিমাণ</th>
                                    <th class="p-4 font-semibold text-center">অবস্থা</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-800">আব্দুর রহমান</div>
                                        <div class="text-slate-400 text-xs"><i class="fa fa-location-dot mr-1"></i> সিলেট সদর</div>
                                    </td>
                                    <td class="p-4 font-bold text-slate-700">৫০,০০০ টাকা</td>
                                    <td class="p-4 text-center">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">পেন্ডিং ফিল্ড যাচাই</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-800">মো: রফিকুল ইসলাম</div>
                                        <div class="text-slate-400 text-xs"><i class="fa fa-location-dot mr-1"></i> কোম্পানীগঞ্জ</div>
                                    </td>
                                    <td class="p-4 font-bold text-slate-700">৮০,০০০ টাকা</td>
                                    <td class="p-4 text-center">
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">ভেরিফাইড</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- ডান পাশের সেকশন: এজেন্ট কুইক লিংক/টার্গেট গাইড -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-2xl bg-white h-100">
                <div class="card-body p-6">
                    <h5 class="text-lg font-bold text-slate-800 mb-4">⚡ কুইক টাস্ক প্যানেল</h5>
                    
                    <div class="space-y-4">
                        <!-- কুইক লিংক ১ -->
                        <a href="#" class="d-flex align-items-center gap-3 p-3 rounded-xl border border-slate-100 text-slate-700 hover:bg-slate-50 hover:text-slate-900 transition-all no-underline">
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 d-flex justify-content-center align-items-center text-lg">
                                <i class="fa-solid fa-file-signature"></i>
                            </div>
                            <div>
                                <span class="font-bold block text-sm">নতুন রিপোর্ট জমা দিন</span>
                                <span class="text-slate-400 text-xs">ফিল্ড ভেরিফিকেশন ফর্ম</span>
                            </div>
                        </a>

                        <!-- কুইক লিংক ২ -->
                        <a href="/agent/farmer-monitoring" class="d-flex align-items-center gap-3 p-3 rounded-xl border border-slate-100 text-slate-700 hover:bg-slate-50 hover:text-slate-900 transition-all no-underline">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 d-flex justify-content-center align-items-center text-lg">
                                <i class="fa-solid fa-eye"></i>
                            </div>
                            <div>
                                <span class="font-bold block text-sm">কৃষক মনিটরিং ডায়েরি</span>
                                <span class="text-slate-400 text-xs">ফসল ও খামারের আপডেট রাখুন</span>
                            </div>
                        </a>

                        <!-- কুইক লিংক ৩ -->
                        <a href="/agent/loan-supervision" class="d-flex align-items-center gap-3 p-3 rounded-xl border border-slate-100 text-slate-700 hover:bg-slate-50 hover:text-slate-900 transition-all no-underline">
                            <div class="w-10 h-10 rounded-lg bg-purple-50 text-purple-600 d-flex justify-content-center align-items-center text-lg">
                                <i class="fa-solid fa-handshake-angle"></i>
                            </div>
                            <div>
                                <span class="font-bold block text-sm">কিস্তি কালেকশন ট্র্যাকার</span>
                                <span class="text-slate-400 text-xs">ঋণ সুপারভিশন ও বকেয়া আদায়</span>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<!-- গ্রিড ও কালার ইউটিলিটির জন্য ছোট কাস্টম টেইলউইন্ড বা বুটস্ট্র্যাপ হেল্পার কোড -->
<style>
    .grid { display: grid; }
    .space-y-4 > * + * { margin-top: 1rem; }
    @media (min-width: 768px) { .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
    @media (min-width: 1024px) { .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); } }
    .gap-6 { gap: 1.5rem; }
    .bg-slate-50\/50 { background-color: rgba(248, 250, 252, 0.5); }
    .rounded-2xl { border-radius: 1rem; }
</style>
@endsection