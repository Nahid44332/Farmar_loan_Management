@extends('backend.master')

@section('content')
<div class="p-6 max-w-[1600px] mx-auto space-y-8 bg-[#f8fafc]">
    
    <div class="relative bg-white p-6 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-600"></div>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Banner Sliders Management</h2>
                <p class="text-xs text-slate-400 mt-1">Easily update content, links, and background imagery for the 3 homepage sliders.</p>
            </div>
            <div class="bg-emerald-50 text-emerald-700 text-xs font-semibold px-4 py-2 rounded-xl border border-emerald-100 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Live Active Section
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-3 shadow-sm">
            <div class="w-8 h-8 rounded-lg bg-emerald-600 text-white flex items-center justify-center shadow-md">
                <i class="fa-solid fa-check text-xs"></i>
            </div>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="space-y-8">
        @foreach($banners as $index => $banner)
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            
            <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-slate-800 text-white font-bold text-sm flex items-center justify-center">
                        {{ $index + 1 }}
                    </div>
                    <h3 class="text-sm font-bold text-slate-800">Hero Slider Configuration</h3>
                </div>
                <span class="bg-slate-100 text-slate-600 text-[11px] font-bold tracking-wider uppercase px-3 py-1.5 rounded-xl border border-slate-200">
                    Slide 0{{ $index + 1 }}
                </span>
            </div>

            <div class="p-6">
                <form action="{{ route('banner.section.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                        
                        <div class="lg:col-span-7 space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slider Catchy Title</label>
                                <input type="text" name="title" value="{{ $banner->title }}" required
                                    class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 font-medium transition duration-200 text-sm">
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Slider Description Context</label>
                                <textarea name="description" rows="4" required
                                    class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 transition duration-200 text-sm resize-none leading-relaxed">{{ $banner->description }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Read More Action URL</label>
                                    <input type="text" name="read_more_url" value="{{ $banner->read_more_url }}"
                                        class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-600 font-mono transition duration-200 text-xs">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Contact Us Action URL</label>
                                    <input type="text" name="contact_url" value="{{ $banner->contact_url }}"
                                        class="w-full px-4 py-3 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-600 font-mono transition duration-200 text-xs">
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-5 flex flex-col justify-between space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Active Current Image</label>
                                <div class="relative w-full h-44 bg-slate-50 rounded-xl overflow-hidden border border-slate-200 flex items-center justify-center">
                                    
                                    @if($banner->image && file_exists(public_path('uploads/banners/' . $banner->image)))
                                        <img src="{{ asset('uploads/banners/' . $banner->image) }}?v={{ time() }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition duration-200 flex items-center justify-center">
                                            <span class="text-white text-xs bg-black/60 px-3 py-1.5 rounded-lg backdrop-blur-sm">Currently Active</span>
                                        </div>
                                    @else
                                        <div class="text-center p-4">
                                            <div class="w-12 h-12 rounded-xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2 border border-slate-200">
                                                <i class="fa-regular fa-image text-lg"></i>
                                            </div>
                                            <span class="text-xs text-slate-400 font-semibold block">No Active Image Found</span>
                                        </div>
                                    @endif

                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Change Image Assets</label>
                                <input type="file" name="image" 
                                    class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100 file:cursor-pointer cursor-pointer bg-slate-50 border border-slate-200 p-1.5 rounded-xl focus:outline-none">
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end">
                        <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold py-3 px-6 rounded-xl transition duration-200 active:scale-95 transform cursor-pointer">
                            <i class="fa-solid fa-cloud-arrow-up mr-2 text-xs"></i> Update Slide Content
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div> 
@endsection