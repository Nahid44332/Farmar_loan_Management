@extends('backend.farmer-panel.master')
@section('content')
    <div class="p-4 md:p-6 bg-slate-50 min-h-screen" x-data="{ editModal: false, passwordModal: {{ $errors->has('current_password') || $errors->has('new_password') ? 'true' : 'false' }} }">

        <div class="mb-6">
            <h1 class="text-2xl font-black text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-user text-emerald-600"></i> আমার প্রোফাইল
            </h1>
            <p class="text-xs text-slate-500 mt-1">আপনার ব্যক্তিগত তথ্য এবং খামারের বিবরণ এখানে দেখুন।</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 text-center">
                    <form action="/farmer/profile/update-image" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="relative w-32 h-32 mx-auto mb-4 group">
                            @if (Auth::guard('farmer')->user()->image)
                                <img src="{{ asset('backend/images/farmer/' . Auth::guard('farmer')->user()->image) }}"
                                    alt="Farmer Photo"
                                    class="w-full h-full rounded-2xl object-cover border-4 border-emerald-500/10 shadow-md">
                            @else
                                <div
                                    class="w-full h-full rounded-2xl bg-slate-100 flex items-center justify-center border border-slate-200">
                                    <i class="fa-solid fa-user text-4xl text-slate-400"></i>
                                </div>
                            @endif

                            <label for="farmer_image"
                                class="absolute inset-0 bg-black/40 rounded-2xl flex items-center justify-center text-white text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer">
                                <i class="fa-solid fa-camera text-base mr-1"></i> পরিবর্তন
                            </label>
                            <input type="file" id="farmer_image" name="image" class="hidden"
                                onchange="this.form.submit()">
                        </div>
                    </form>

                    <h3 class="text-xl font-black text-slate-800">{{ Auth::guard('farmer')->user()->name ?? 'চাষী মামা' }}
                    </h3>
                    <span
                        class="text-xs bg-emerald-50 text-emerald-600 font-bold px-3 py-1 rounded-full border border-emerald-200/50 inline-block mt-1">
                        {{ Auth::guard('farmer')->user()->category ?? 'সাধারণ চাষী' }}
                    </span>

                    <div class="grid grid-cols-2 gap-3 mt-6 pt-6 border-t border-slate-100 text-left">
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                            <span class="text-[10px] font-bold text-slate-400 uppercase">মেম্বার আইডি</span>
                            <p class="text-sm font-black text-slate-700 mt-0.5">
                                #FMR-{{ Auth::guard('farmer')->user()->id ?? '00' }}</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                            <span class="text-[10px] font-bold text-slate-400 uppercase">অ্যাকাউন্ট স্ট্যাটাস</span>
                            @if (auth()->guard('farmer')->check() && auth()->guard('farmer')->user()->status == 'approved')
                                <p class="text-sm font-black text-emerald-600 mt-0.5 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-check text-xs"></i> একটিভ
                                </p>
                            @else
                                <p class="text-sm font-black text-amber-500 mt-0.5 flex items-center gap-1">
                                    <i class="fa-solid fa-clock text-xs"></i> পেন্ডিং
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-[#064e3b] to-emerald-950 p-6 rounded-2xl shadow-xl text-white">
                    <h4 class="text-sm font-bold text-emerald-300 uppercase tracking-wider">ঋণ ও খামারের সংক্ষেপ</h4>
                    <div class="mt-4 space-y-4">
                        <div class="flex justify-between items-center pb-3 border-b border-white/10">
                            <span class="text-sm text-emerald-100/80">মোট জমি:</span>
                            <span class="font-black text-base">{{ Auth::guard('farmer')->user()->land_amount ?? 0 }}
                                শতাংশ</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-emerald-100/80">মোট ঋণপ্রাপ্তি:</span>
                            <span
                                class="font-black text-base">৳{{ number_format(Auth::guard('farmer')->user()->loan_amount ?? 0) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                <div
                    class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-slate-100 h-full flex flex-col justify-between">
                    <div>
                        <h3
                            class="text-lg font-bold text-slate-800 mb-6 pb-2 border-b border-slate-100 flex items-center gap-2">
                            <i class="fa-solid fa-id-card text-emerald-600"></i> প্রোফাইল তথ্য
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100">
                                <span class="text-xs font-bold text-slate-400 block">পূর্ণ নাম</span>
                                <span
                                    class="text-sm font-bold text-slate-800 mt-1 block">{{ Auth::guard('farmer')->user()->name }}</span>
                            </div>

                            <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100">
                                <span class="text-xs font-bold text-slate-400 block">মোবাইল নম্বর</span>
                                <span
                                    class="text-sm font-bold text-slate-800 mt-1 block">{{ Auth::guard('farmer')->user()->phone }}</span>
                            </div>

                            <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100">
                                <span class="text-xs font-bold text-slate-400 block">জাতীয় পরিচয়পত্র নম্বর (NID)</span>
                                <span
                                    class="text-sm font-bold text-slate-800 mt-1 block">{{ Auth::guard('farmer')->user()->nid ?? 'দেওয়া হয়নি' }}</span>
                            </div>

                            <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100">
                                <span class="text-xs font-bold text-slate-400 block">জমির পরিমাণ</span>
                                <span
                                    class="text-sm font-bold text-slate-800 mt-1 block">{{ Auth::guard('farmer')->user()->land_amount ?? 0 }}
                                    শতাংশ</span>
                            </div>

                            <div class="bg-slate-50/60 p-4 rounded-xl border border-slate-100 md:col-span-2">
                                <span class="text-xs font-bold text-slate-400 block">গ্রাম / পূর্ণ ঠিকানা</span>
                                <span
                                    class="text-sm font-bold text-slate-800 mt-1 block leading-relaxed">{{ Auth::guard('farmer')->user()->address ?? 'দেওয়া হয়নি' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 mt-8 pt-6 border-t border-slate-100">
                        <button @click="editModal = true"
                            class="flex-1 bg-[#064e3b] hover:bg-emerald-800 text-white font-bold text-sm px-5 py-3.5 rounded-xl transition shadow-md shadow-emerald-900/10 flex items-center justify-center gap-2 focus:outline-none">
                            <i class="fa-solid fa-pen-to-square"></i> ইডিট প্রোফাইল
                        </button>
                        <button @click="passwordModal = true"
                            class="flex-1 bg-slate-800 hover:bg-slate-900 text-white font-bold text-sm px-5 py-3.5 rounded-xl transition shadow-md flex items-center justify-center gap-2 focus:outline-none">
                            <i class="fa-solid fa-key"></i> চেন্জ পাসওয়ার্ড
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <div x-show="editModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto" x-cloak>
            <div x-show="editModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="editModal = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

            <div x-show="editModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                class="relative bg-white rounded-2xl shadow-2xl max-w-2xl w-full p-6 md:p-8 z-10 border border-slate-100">
                <div class="flex justify-between items-center mb-6 pb-3 border-b border-slate-100">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-user-pen text-emerald-600"></i> প্রোফাইল তথ্য আপডেট করুন
                    </h3>
                    <button @click="editModal = false" class="text-slate-400 hover:text-slate-600 focus:outline-none"><i
                            class="fa-solid fa-xmark text-xl"></i></button>
                </div>

                <form action="/farmer/profile/update" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">পূর্ণ নাম <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ Auth::guard('farmer')->user()->name }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">মোবাইল নম্বর <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="phone" value="{{ Auth::guard('farmer')->user()->phone }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">জাতীয় পরিচয়পত্র নম্বর
                                (NID)</label>
                            <input type="text" name="nid" value="{{ Auth::guard('farmer')->user()->nid }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">জমির পরিমাণ (শতাংশ) <span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="land_amount"
                                value="{{ Auth::guard('farmer')->user()->land_amount }}"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">গ্রাম / পূর্ণ ঠিকানা <span
                                    class="text-red-500">*</span></label>
                            <textarea name="address" rows="3"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>{{ Auth::guard('farmer')->user()->address }}</textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3 border-t border-slate-100 pt-4">
                        <button type="button" @click="editModal = false"
                            class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-sm px-5 py-2.5 rounded-xl transition">বাতিল</button>
                        <button type="submit"
                            class="bg-[#064e3b] hover:bg-emerald-800 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-md shadow-emerald-900/10">সংরক্ষণ
                            করুন</button>
                    </div>
                </form>
            </div>
        </div>

        <div x-show="passwordModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
            x-cloak>
            <div x-show="passwordModal" @click="passwordModal = false"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

            <div x-show="passwordModal"
                class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 z-10 border border-slate-100">
                <div class="flex justify-between items-center mb-6 pb-3 border-b border-slate-100">
                    <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-lock text-emerald-600"></i> নিরাপত্তা ও পাসওয়ার্ড
                    </h3>
                    <button @click="passwordModal = false"
                        class="text-slate-400 hover:text-slate-600 focus:outline-none"><i
                            class="fa-solid fa-xmark text-xl"></i></button>
                </div>

                <form action="/farmer/profile/update-password" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">বর্তমান পাসওয়ার্ড</label>
                            <input type="password" name="current_password"
                                class="w-full bg-slate-50 border @error('current_password') border-red-500 bg-red-50/30 @else border-slate-200 @enderror rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>

                            @error('current_password')
                                <span class="text-xs text-red-600 font-bold mt-1 block flex items-center gap-1">
                                    <i class="fa-solid fa-circle-exclamation text-[10px]"></i> {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">নতুন পাসওয়ার্ড</label>
                            <input type="password" name="new_password"
                                class="w-full bg-slate-50 border @error('new_password') border-red-500 @else border-slate-200 @enderror rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>
                            @error('new_password')
                                <span class="text-xs text-red-600 font-bold mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 mb-1.5">নতুন পাসওয়ার্ড নিশ্চিত
                                করুন</label>
                            <input type="password" name="new_password_confirmation"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none"
                                required>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3 border-t border-slate-100 pt-4">
                        <button type="button" @click="passwordModal = false"
                            class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-sm px-5 py-2.5 rounded-xl transition">বাতিল</button>
                        <button type="submit"
                            class="bg-slate-800 hover:bg-slate-900 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-md">পরিবর্তন
                            করুন</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endsection
