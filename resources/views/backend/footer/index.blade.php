@extends('backend.master')

@section('content')

<div class="p-6 max-w-[1600px] mx-auto space-y-8 bg-[#f8fafc]">
    
    <div class="relative bg-white p-6 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-600"></div>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Footer Settings</h2>
                <p class="text-xs text-slate-400 mt-1">Manage contact info, social links, and newsletter descriptions across the site footer.</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-3 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('footer.update') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                <div class="border-b border-slate-50 pb-3 mb-2">
                    <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-address-book"></i> Contact Information
                    </h3>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Location</label>
                    <input type="text" name="location" value="{{ $footer->location ?? '' }}" placeholder="Enter location"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ $footer->phone ?? '' }}" placeholder="Enter phone number"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Email</label>
                    <input type="email" name="email" value="{{ $footer->email ?? '' }}" placeholder="Enter email"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>
            </div>

            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-4">
                <div class="border-b border-slate-50 pb-3 mb-2">
                    <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider flex items-center gap-2">
                        <i class="fa-solid fa-share-nodes"></i> Social Links
                    </h3>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Facebook</label>
                    <input type="text" name="facebook" value="{{ $footer->facebook ?? '' }}" placeholder="Facebook URL"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Twitter</label>
                    <input type="text" name="twitter" value="{{ $footer->twitter ?? '' }}" placeholder="Twitter URL"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">LinkedIn</label>
                    <input type="text" name="linkedin" value="{{ $footer->linkedin ?? '' }}" placeholder="LinkedIn URL"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Instagram</label>
                    <input type="text" name="instagram" value="{{ $footer->instagram ?? '' }}" placeholder="Instagram URL"
                        class="w-full px-4 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>
            </div>

            <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-6 space-y-6">
                
                <div>
                    <div class="border-b border-slate-50 pb-2 mb-3">
                        <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-circle-info"></i> About Section
                        </h3>
                    </div>
                    <textarea name="about_text" rows="4" placeholder="Write about your company..."
                        class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition resize-none">{{ $footer->about_text ?? '' }}</textarea>
                </div>

                <div>
                    <div class="border-b border-slate-50 pb-2 mb-3">
                        <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider flex items-center gap-2">
                            <i class="fa-solid fa-paper-plane"></i> Newsletter Text
                        </h3>
                    </div>
                    <input type="text" name="newsletter_text" value="{{ $footer->newsletter_text ?? '' }}" placeholder="Newsletter message"
                        class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                </div>

            </div>

        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold py-3 px-8 rounded-xl transition duration-200 shadow-sm cursor-pointer">
                <i class="fa-solid fa-save mr-2"></i> Save Settings
            </button>
        </div>

    </form>

</div>

@endsection