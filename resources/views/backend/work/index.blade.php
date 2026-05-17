@extends('backend.master')

@section('content')
<div class="p-6 max-w-[1600px] mx-auto space-y-8 bg-[#f8fafc]">
    
    <div class="relative bg-white p-6 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-600"></div>
        <div>
            <h2 class="text-xl font-bold text-slate-800 tracking-tight">How We Do Work Section</h2>
            <p class="text-xs text-slate-400 mt-1">Manage the video overlay and context cover image for the homepage work block.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-3">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6">
            <form action="{{ route('work.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Section Title</label>
                            <input type="text" name="title" value="{{ $work->title }}" required
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">YouTube Video URL</label>
                            <input type="url" name="video_url" value="{{ $work->video_url }}" required placeholder="https://www.youtube.com/watch?v=..."
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Upload Section Cover Background</label>
                            <input type="file" name="image" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-500 text-sm">
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center border-2 border-dashed border-slate-200 rounded-2xl p-4 bg-slate-50/50">
                        <span class="text-xs font-bold text-slate-400 uppercase mb-2">Current Cover Image</span>
                        @if($work->image && file_exists(public_path($work->image)))
                            <img src="{{ asset($work->image) }}" class="w-full max-h-[220px] object-cover rounded-xl shadow-sm">
                        @else
                            <div class="w-full h-[220px] flex flex-col items-center justify-center bg-slate-100 rounded-xl text-slate-400">
                                <i class="fa-solid fa-video text-3xl mb-2"></i>
                                <span class="text-xs">No custom background image uploaded yet</span>
                            </div>
                        @endif
                    </div>

                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold py-3 px-6 rounded-xl transition duration-200 cursor-pointer">
                        <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Update Video Section
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection