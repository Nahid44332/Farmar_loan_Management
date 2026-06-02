@extends('backend.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .modal-body { white-space: normal !important; }
        .style-comment { white-space: pre-line !important; }
    </style>

    <div class="p-6 space-y-6 bg-gray-50/50 min-h-screen">

        <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-xl font-black text-gray-800 tracking-tight flex items-center gap-2">
                    <span class="p-2 rounded-xl bg-emerald-50 text-emerald-600 text-lg">📊</span>
                    ফিল্ড ভেরিফিকেশন REPORTসমূহ
                </h1>
                <p class="text-xs text-gray-400 mt-1">মাঠ পর্যায়ের এজেন্টদের পাঠানো কৃষকদের খামার ও জমির বাস্তব তদন্ত রিপোর্টসমূহ এখান থেকে ম্যানেজ করুন।</p>
            </div>
            <div class="flex items-center gap-2 bg-gray-50 p-2 rounded-xl border border-gray-100">
                <span class="text-xs font-bold text-gray-500 px-2">মোট রিপোর্ট:</span>
                <span class="bg-emerald-500 text-white text-xs font-black px-2.5 py-1 rounded-lg shadow-sm shadow-emerald-500/20">
                    {{ $investigations->count() }} টি
                </span>
            </div>
        </div>

        <form action="{{ url()->current() }}" method="GET" class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm flex flex-wrap items-center justify-between gap-4">
            
            <div class="relative w-full sm:w-72">
                <i class="fa fa-search absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="কৃষক বা এজেন্টের নাম খুঁজুন..."
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-gray-200 bg-gray-50/50 focus:bg-white focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500/20 outline-none transition font-medium">
            </div>
            
            <div class="flex items-center gap-2 w-full sm:w-auto justify-between sm:justify-end">
                <select name="recommendation" onchange="this.form.submit()" class="text-xs font-bold text-gray-600 bg-gray-50 border border-gray-200 rounded-xl px-3 py-2 outline-none focus:border-emerald-500 transition">
                    <option value="">সব সুপারিশ</option>
                    <option value="recommended" {{ request('recommendation') == 'recommended' ? 'selected' : '' }}>অনুমোদনযোগ্য</option>
                    <option value="not_recommended" {{ request('recommendation') == 'not_recommended' ? 'selected' : '' }}>ঝুঁকিপূর্ণ</option>
                </select>

                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                    খুঁজুন
                </button>
                
                @if(request('search') || request('recommendation'))
                    <a href="{{ url()->current() }}" class="text-xs font-bold text-red-500 hover:text-red-700 no-underline ml-2">
                        ❌ ক্লিয়ার
                    </a>
                @endif
            </div>
        </form>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead class="bg-gray-50/70 text-gray-500 font-bold border-b border-gray-100 uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">তদন্তকারী এজেন্ট</th>
                            <th class="px-6 py-4">কৃষকের তথ্য</th>
                            <th class="px-6 py-4">যাচাইকৃত জমি</th>
                            <th class="px-6 py-4 text-center">ফসলের অবস্থা</th>
                            <th class="px-6 py-4 text-center">চূড়ান্ত সুপারিশ</th>
                            <th class="px-6 py-4">তারিখ ও সময়</th>
                            <th class="px-6 py-4 text-center">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 font-medium text-gray-700">
                        @forelse($investigations as $row)
                            <tr class="hover:bg-gray-50/40 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 font-black flex items-center justify-center text-xs shadow-inner">
                                            {{ substr($row->agent->name ?? 'A', 0, 1) }}
                                        </div>
                                        <div>
                                            <div class="font-black text-gray-800">{{ $row->agent->name ?? 'N/A' }}</div>
                                            <div class="text-gray-400 text-[10px] mt-0.5">ID: #{{ $row->agent_id }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="font-black text-gray-800 text-sm">{{ $row->farmer->name ?? 'N/A' }}</div>
                                    <div class="text-gray-400 text-[11px] mt-0.5 flex items-center gap-1">
                                        <i class="fa fa-phone text-[10px]"></i> {{ $row->farmer->phone ?? 'N/A' }}
                                    </div>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1.5 text-gray-800 font-bold">
                                        <span class="p-1.5 rounded-lg bg-gray-100 text-gray-500 text-[10px]">📐</span>
                                        {{ $row->land_verified_amount }}
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($row->crop_or_sector_status == 'ভালো')
                                        <span class="px-2.5 py-1 rounded-xl font-black text-[10px] bg-emerald-50 text-emerald-600 border border-emerald-100/50 inline-block">
                                            ● ভালো
                                        </span>
                                    @elseif($row->crop_or_sector_status == 'মাঝারি')
                                        <span class="px-2.5 py-1 rounded-xl font-black text-[10px] bg-amber-50 text-amber-600 border border-amber-100/50 inline-block">
                                            ● মাঝারি
                                        </span>
                                    @else
                                        <span class="px-2.5 py-1 rounded-xl font-black text-[10px] bg-red-50 text-red-600 border border-red-100/50 inline-block">
                                            ● খারাপ
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-center">
                                    @if ($row->recommendation == 'recommended')
                                        <span class="text-emerald-700 font-black text-[11px] bg-emerald-100/60 px-3 py-1.5 rounded-xl inline-flex items-center gap-1">
                                            <i class="fa fa-circle-check text-xs"></i> অনুমোদনযোগ্য
                                        </span>
                                    @else
                                        <span class="text-red-600 font-black text-[11px] bg-red-100/60 px-3 py-1.5 rounded-xl inline-flex items-center gap-1">
                                            <i class="fa fa-circle-xmark text-xs"></i> ঝুঁকিপূর্ণ
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    <div class="font-bold">{{ $row->created_at->format('d M, Y') }}</div>
                                    <div class="text-[10px] text-gray-400 mt-0.5">{{ $row->created_at->format('h:i A') }}</div>
                                </td>

                                <td class="px-6 py-4 text-center">
                                    <button type="button" data-bs-toggle="modal"
                                        data-bs-target="#reportModal{{ $row->id }}"
                                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-3.5 py-2 rounded-xl text-xs font-black transition shadow-sm hover:shadow-md shadow-emerald-600/10 inline-flex items-center gap-1 no-underline focus:outline-none">
                                        <i class="fa fa-eye text-xs"></i> বিস্তারিত দেখুন
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="reportModal{{ $row->id }}" tabindex="-1" aria-labelledby="reportModalLabel{{ $row->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content rounded-4 border-0 shadow-lg">
                                        
                                        <div class="modal-header bg-light border-bottom-0 p-4 sticky-top rounded-top-4">
                                            <div>
                                                <h5 class="modal-title font-black text-dark flex items-center gap-2 text-base" id="reportModalLabel{{ $row->id }}">
                                                    📋 তদন্ত রিপোর্টের বিস্তারিত বিবরণ
                                                </h5>
                                                <small class="text-muted text-[10px] d-block mt-1">রিপোর্ট আইডি: #{{ $row->id }}</small>
                                            </div>
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body p-4 text-start">
                                            <div class="container-fluid p-0">
                                                
                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <div class="bg-light p-3 rounded-3 border">
                                                            <span class="text-muted font-bold text-[10px] d-block mb-1 uppercase">🧑‍🌾 কৃষক</span>
                                                            <div class="font-black text-dark text-sm">{{ $row->farmer->name ?? 'N/A' }}</div>
                                                            <div class="text-muted text-xs mt-1">
                                                                <i class="fa fa-phone me-1 text-secondary"></i>{{ $row->farmer->phone ?? 'N/A' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 border border-primary border-opacity-10">
                                                            <span class="text-primary font-bold text-[10px] d-block mb-1 uppercase">🕵️‍♂️调查কারী এজেন্ট</span>
                                                            <div class="font-black text-primary text-sm">{{ $row->agent->name ?? 'N/A' }}</div>
                                                            <div class="text-primary text-xs mt-1">এজেন্ট আইডি: #{{ $row->agent_id }}</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-6">
                                                        <div class="border p-3 rounded-3">
                                                            <span class="text-muted font-bold text-[10px] d-block mb-1 uppercase">যাচাইকৃত জমির পরিমাণ</span>
                                                            <span class="text-dark font-black text-xs d-flex align-items-center gap-1">
                                                                📐 {{ $row->land_verified_amount }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="border p-3 rounded-3">
                                                            <span class="text-muted font-bold text-[10px] d-block mb-1 uppercase">פסলের বর্তমান অবস্থা</span>
                                                            @if($row->crop_or_sector_status == 'ভালো')
                                                                <span class="text-emerald-600 font-black text-xs">● ভালো</span>
                                                            @elseif($row->crop_or_sector_status == 'মাঝারি')
                                                                <span class="text-amber-500 font-black text-xs">● মাঝারি</span>
                                                            @else
                                                                <span class="text-red-500 font-black text-xs">● খারাপ</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row g-3 mb-4">
                                                    <div class="col-md-8">
                                                        <div class="border p-3 rounded-3">
                                                            <span class="text-muted font-bold text-[10px] d-block mb-2 uppercase">📸 মাঠের ছবি</span>
                                                            <img src="/backend/images/investigations/{{ $row->investigation_image }}" 
                                                                 class="w-100 img-fluid rounded-3 border bg-light object-cover" 
                                                                 style="height: 160px; object-fit: cover;"
                                                                 onerror="this.src='https://placehold.co/600x400?text=No+Image+Uploaded'">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="p-4 rounded-3 h-100 d-flex flex-column justify-content-center align-items-center text-center border @if($row->recommendation == 'recommended') bg-success bg-opacity-10 border-success border-opacity-20 @else bg-danger bg-opacity-10 border-danger border-opacity-20 @endif">
                                                            <span class="text-muted font-bold text-[9px] uppercase mb-2 d-block">চূড়ান্ত সুপারিশ</span>
                                                            @if($row->recommendation == 'recommended')
                                                                <span class="text-success font-black text-xs bg-white px-3 py-1.5 rounded-3 border shadow-sm">অনুমোদনযোগ্য</span>
                                                            @else
                                                                <span class="text-danger font-black text-xs bg-white px-3 py-1.5 rounded-3 border shadow-sm">ঝুঁকিপূর্ণ</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <span class="text-muted font-bold text-[10px] d-block mb-1 uppercase">📝 এজেন্টের মন্তব্য</span>
                                                    <div class="bg-light p-3 rounded-3 border text-xs text-secondary style-comment">
                                                        {{ $row->agent_comments ?? 'কোনো মন্তব্য নেই।' }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal-footer bg-light border-top-0 p-3 rounded-bottom-4">
                                            <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold transition focus:outline-none border-0" data-bs-dismiss="modal">বন্ধ করুন</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-16 text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <span class="text-3xl">📁</span>
                                        <p class="italic font-bold text-sm text-gray-400">কোনো তথ্য খুঁজে পাওয়া যায়নি।</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection