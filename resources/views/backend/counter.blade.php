@extends('backend.master')

@section('content')
<div class="p-6 max-w-[1600px] mx-auto space-y-8 bg-[#f8fafc]">
    
    <div class="relative bg-white p-6 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 w-1.5 h-full bg-emerald-600"></div>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-slate-800 tracking-tight">Counter Section Management</h2>
                <p class="text-xs text-slate-400 mt-1">Manage the 4 dynamic achievement stat blocks shown on your homepage.</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-100 text-emerald-800 rounded-xl text-sm font-semibold flex items-center gap-3 shadow-sm">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('counter.update') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($counters as $counter)
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden p-5 space-y-4">
                    <div class="flex justify-between items-center border-b border-slate-50 pb-2">
                        <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider">Box #{{ $loop->iteration }}</span>
                        
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="counters[{{ $counter->id }}][is_active]" value="1" {{ $counter->is_active ? 'checked' : '' }} class="rounded text-emerald-600 focus:ring-emerald-500 w-4 h-4">
                            <span class="text-xs font-medium text-slate-500">Highlight Active</span>
                        </label>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Stat Number</label>
                        <input type="text" name="counters[{{ $counter->id }}][number]" value="{{ $counter->number }}" required
                            class="w-full px-3 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 font-semibold text-sm transition">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Title Line 1</label>
                        <input type="text" name="counters[{{ $counter->id }}][title_line_1]" value="{{ $counter->title_line_1 }}" required
                            class="w-full px-3 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Title Line 2</label>
                        <input type="text" name="counters[{{ $counter->id }}][title_line_2]" value="{{ $counter->title_line_2 }}" required
                            class="w-full px-3 py-2.5 bg-slate-50/50 border border-slate-200 rounded-xl focus:outline-none focus:border-emerald-500 focus:bg-white text-slate-700 text-sm transition">
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold py-3 px-8 rounded-xl transition duration-200 shadow-sm cursor-pointer">
                <i class="fa-solid fa-save mr-2"></i> Save All Counter Data
            </button>
        </div>
    </form>
</div>
@endsection