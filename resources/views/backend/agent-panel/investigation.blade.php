@extends('backend.agent-panel.master')

@section('content')
<div class="p-6 space-y-6">
    
    <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-xl font-black text-gray-800 tracking-tight flex items-center gap-2">
                <span class="p-2 rounded-lg bg-emerald-50 text-emerald-600 text-lg">🕵️‍♂️</span> 
                মাঠ তদন্ত ও রিপোর্ট প্যানেল
            </h1>
            <p class="text-xs text-gray-400 mt-1">আপনার অধীনে থাকা কৃষকদের খামার বা জমি সশরীরে যাচাই করে ডিজিটাল রিপোর্ট জমা দিন।</p>
        </div>
        <div class="flex gap-3">
            <div class="bg-amber-50 border border-amber-100 px-4 py-2 rounded-xl text-center">
                <span class="block text-xl font-bold text-amber-600">{{ $pending_farmers->count() }}</span>
                <span class="text-[10px] uppercase font-bold text-amber-500 tracking-wider">তদন্ত বাকি</span>
            </div>
            <div class="bg-emerald-50 border border-emerald-100 px-4 py-2 rounded-xl text-center">
                <span class="block text-xl font-bold text-emerald-600">{{ $investigations->count() }}</span>
                <span class="text-[10px] uppercase font-bold text-emerald-500 tracking-wider">তদন্ত সম্পন্ন</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <div class="xl:col-span-1 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-gray-50 mb-4">
                <h3 class="text-xs font-black text-gray-700 uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span> অপেক্ষমাণ তালিকা
                </h3>
            </div>
            
            <div class="space-y-3 overflow-y-auto max-h-[550px] pr-2">
                @forelse($pending_farmers as $farmer)
                    <div class="p-4 border border-gray-100 rounded-xl hover:border-emerald-500 hover:bg-emerald-50/10 transition group relative">
                        <div class="flex justify-between items-start gap-2">
                            <div class="space-y-1">
                                <h4 class="font-bold text-gray-800 text-sm group-hover:text-emerald-700 transition">{{ $farmer->name }}</h4>
                                <p class="text-xs text-gray-500 font-medium flex items-center gap-1">
                                    <i class="fa fa-phone text-gray-400 text-[10px]"></i> {{ $farmer->phone }}
                                </p>
                                <p class="text-[11px] text-gray-400 flex items-center gap-1">
                                    <i class="fa fa-map-marker-alt text-gray-300"></i> {{ $farmer->district ?? 'গাজীপুর, ঢাকা' }}
                                </p>
                            </div>
                            
                            <button type="button" 
                                    onclick="openInvestigationModal('{{ $farmer->id }}', '{{ $farmer->name }}')" 
                                    class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-3 py-2 rounded-xl font-bold transition shadow-sm hover:shadow flex items-center gap-1 border-0 cursor-pointer">
                                <i class="fa fa-edit"></i> তদন্ত করুন
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <span class="text-3xl">🎉</span>
                        <p class="text-xs text-gray-400 italic mt-2">নতুন কোনো কৃষক তদন্তের জন্য বাকি নেই!</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="xl:col-span-2 bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-gray-50 mb-4">
                <h3 class="text-xs font-black text-gray-700 uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span> জমাকৃত রিপোর্টের ইতিহাস
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs whitespace-nowrap">
                    <thead class="bg-gray-50 text-gray-500 font-bold border-b border-gray-100 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3.5 rounded-l-xl">কৃষকের তথ্য</th>
                            <th class="px-4 py-3.5">যাচাইকৃত জমি</th>
                            <th class="px-4 py-3.5 text-center">ফসলের অবস্থা</th>
                            <th class="px-4 py-3.5 text-center">চূড়ান্ত সিদ্ধান্ত</th>
                            <th class="px-4 py-3.5">জমাদানের তারিখ</th>
                            <th class="px-4 py-3.5 text-center rounded-r-xl">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($investigations as $row)
                            <tr class="hover:bg-gray-50/50 transition">
                                <td class="px-4 py-3.5">
                                    <div class="font-bold text-gray-800 text-sm">{{ $row->farmer->name }}</div>
                                    <div class="text-gray-400 text-[11px] mt-0.5"><i class="fa fa-phone"></i> {{ $row->farmer->phone }}</div>
                                </td>
                                <td class="px-4 py-3.5 font-bold text-gray-700">
                                    <i class="fa fa-layer-group text-gray-400 mr-1"></i> {{ $row->land_verified_amount }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <span class="px-2.5 py-1 rounded-full font-bold text-[10px] inline-block
                                        {{ $row->crop_or_sector_status == 'ভালো' ? 'bg-emerald-50 text-emerald-600' : ($row->crop_or_sector_status == 'মাঝারি' ? 'bg-amber-50 text-amber-600' : 'bg-red-50 text-red-600') }}">
                                        ● {{ $row->crop_or_sector_status }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    @if($row->recommendation == 'recommended')
                                        <span class="text-emerald-600 font-black text-[11px] bg-emerald-50/60 px-2 py-1 rounded-lg"><i class="fa fa-check-circle"></i> লোন সুপারিশকৃত</span>
                                    @else
                                        <span class="text-red-500 font-black text-[11px] bg-red-50/60 px-2 py-1 rounded-lg"><i class="fa fa-times-circle"></i> লোন ঝুঁকিপূর্ণ</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5 text-gray-500 font-medium">
                                    {{ $row->created_at->format('d M, Y') }}
                                </td>
                                <td class="px-4 py-3.5 text-center">
                                    <button type="button" 
                                            onclick="viewReportDetails('{{ $row->land_verified_amount }}',
                                            '{{ $row->crop_or_sector_status }}',
                                            '{{ $row->agent_comments }}',
                                            '{{ asset('backend/images/investigations/' . $row->investigation_image) }}',
                                            '{{ $row->recommendation }}')" 
                                            class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-2 rounded-lg text-xs font-bold transition border-0 cursor-pointer" 
                                            title="View Full Report">
                                        <i class="fa fa-file-text"></i> দেখুন
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12 text-gray-400 italic">এখনো কোনো তদন্ত রিপোর্ট সাবমিট করা হয়নি।</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div id="investigationModal" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-xl overflow-hidden transform transition-all">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-base font-black text-gray-800">📝 মাঠ তদন্ত ফরম: <span id="modalFarmerName" class="text-emerald-600"></span></h3>
            <button type="button" onclick="closeInvModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light border-0 bg-transparent cursor-pointer">&times;</button>
        </div>
        
        <form action="{{ route('investigation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="farmer_id" id="modalFarmerId">
            
            <div class="p-6 space-y-4 max-h-[450px] overflow-y-auto text-left">
                <div>
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-wider">যাচাইকৃত জমির পরিমাণ <span class="text-red-500">*</span></label>
                    <input type="text" name="land_verified_amount" class="w-full p-3 border border-gray-200 rounded-xl text-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 outline-none transition" placeholder="উদা: ৫০ শতাংশ বা ২ বিঘা" required>
                </div>

                <div>
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-wider">প্রকল্প/ফসলের বর্তমান অবস্থা <span class="text-red-500">*</span></label>
                    <select name="crop_or_sector_status" class="w-full p-3 border border-gray-200 rounded-xl text-sm focus:border-emerald-500 outline-none transition" required>
                        <option value="ভালো">ভালো (Good)</option>
                        <option value="মাঝারি">মাঝারি (Average)</option>
                        <option value="ঝুঁকিপূর্ণ">ঝুঁকিপূর্ণ (Risky)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-wider">মাঠ/খামারের ছবি আপলোড <span class="text-red-500">*</span></label>
                    <input type="file" name="investigation_image" class="w-full p-2 border border-gray-200 rounded-xl text-sm focus:border-emerald-500 outline-none" accept="image/*" required>
                </div>

                <div>
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-wider">তদন্ত কর্মকর্তার নিজস্ব মন্তব্য <span class="text-red-500">*</span></label>
                    <textarea name="agent_comments" rows="3" class="w-full p-3 border border-gray-200 rounded-xl text-sm focus:border-emerald-500 outline-none transition" placeholder="জমির মালিকানা এবং ফসলের বাস্তব অবস্থা কেমন দেখলেন বিস্তারিত লিখুন..." required></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 text-xs font-black mb-2 uppercase tracking-wider">লোনের জন্য আপনার চূড়ান্ত সুপারিশ <span class="text-red-500">*</span></label>
                    <div class="flex gap-6 p-1">
                        <label class="flex items-center gap-2 font-bold text-emerald-600 text-sm cursor-pointer">
                            <input type="radio" name="recommendation" value="recommended" class="accent-emerald-600" checked> অনুমোদন করা যায়
                        </label>
                        <label class="flex items-center gap-2 font-bold text-red-500 text-sm cursor-pointer">
                            <input type="radio" name="recommendation" value="not_recommended" class="accent-red-500"> ঝুঁকিপূর্ণ (অনুমোদন ঠিক হবে না)
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="p-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-2">
                <button type="button" onclick="closeInvModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2.5 rounded-xl text-xs font-bold transition border-0 cursor-pointer">বন্ধ করুন</button>
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2.5 rounded-xl text-xs font-bold transition border-0 cursor-pointer shadow-sm">রিপোর্ট সাবমিট করুন</button>
            </div>
        </form>
    </div>
</div>

<div id="viewReportModal" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-2xl max-w-lg w-full shadow-xl overflow-hidden transform transition-all">
        <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
            <h3 class="text-md font-black text-gray-800">📋 জমাকৃত তদন্ত রিপোর্টের বিবরণ</h3>
            <button type="button" onclick="closeViewModal()" class="text-gray-400 hover:text-gray-600 text-2xl font-light border-0 bg-transparent cursor-pointer">&times;</button>
        </div>
        
        <div class="p-6 space-y-4 max-h-[450px] overflow-y-auto text-left text-sm">
            <div class="w-full h-44 rounded-xl overflow-hidden bg-gray-100 border border-gray-200">
                <img id="viewImage" src="" alt="Investigation Image" class="w-full h-full object-cover">
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="block text-[11px] text-gray-400 font-bold uppercase">যাচাইকৃত জমি</span>
                    <span id="viewLand" class="text-gray-800 font-bold text-sm"></span>
                </div>
                <div class="bg-gray-50 p-3 rounded-xl">
                    <span class="block text-[11px] text-gray-400 font-bold uppercase">ফসলের অবস্থা</span>
                    <span id="viewStatus" class="font-bold text-sm"></span>
                </div>
            </div>

            <div class="bg-gray-50 p-3 rounded-xl">
                <span class="block text-[11px] text-gray-400 font-bold uppercase mb-1">এজেন্টের মন্তব্য</span>
                <p id="viewComments" class="text-gray-700 text-xs leading-relaxed font-medium"></p>
            </div>

            <div class="p-3 rounded-xl flex items-center justify-between" id="viewRecBox">
                <span class="text-xs font-bold uppercase text-gray-500">এজেন্টের চূড়ান্ত সুপারিশ:</span>
                <span id="viewRecommendation" class="font-black text-xs px-3 py-1 rounded-lg"></span>
            </div>
        </div>
        
        <div class="p-4 bg-gray-50 border-t border-gray-100 text-right">
            <button type="button" onclick="closeViewModal()" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2.5 rounded-xl text-xs font-bold transition border-0 cursor-pointer">বন্ধ করুন</button>
        </div>
    </div>
</div>

<script>
    // তদন্ত ফরম মডাল কন্ট্রোল
    function openInvestigationModal(id, name) {
        document.getElementById('modalFarmerId').value = id;
        document.getElementById('modalFarmerName').innerText = name;
        document.getElementById('investigationModal').classList.remove('hidden');
    }

    function closeInvModal() {
        document.getElementById('investigationModal').classList.add('hidden');
    }

    // রিপোর্ট ডাটা ভিউ মডাল কন্ট্রোল
    function viewReportDetails(land, status, comments, imageUrl, rec) {
        document.getElementById('viewLand').innerText = land;
        document.getElementById('viewStatus').innerText = '● ' + status;
        document.getElementById('viewComments').innerText = comments;
        document.getElementById('viewImage').src = imageUrl;

        // ফসলের স্ট্যাটাসের কালার সেট
        let statusEl = document.getElementById('viewStatus');
        statusEl.className = "font-bold text-sm " + (status === 'ভালো' ? 'text-emerald-600' : (status === 'মাঝারি' ? 'text-amber-500' : 'text-red-500'));

        // সুপারিশের কালার সেট
        let recEl = document.getElementById('viewRecommendation');
        let boxEl = document.getElementById('viewRecBox');
        if (rec === 'recommended') {
            recEl.innerText = "লোন অনুমোদন করা যায়";
            recEl.className = "font-black text-xs px-3 py-1 rounded-lg bg-emerald-100 text-emerald-700";
            boxEl.className = "p-3 rounded-xl flex items-center justify-between bg-emerald-50/40 border border-emerald-100";
        } else {
            recEl.innerText = "ঝুঁকিপূর্ণ (অনুমোদন ঠিক হবে না)";
            recEl.className = "font-black text-xs px-3 py-1 rounded-lg bg-red-100 text-red-700";
            boxEl.className = "p-3 rounded-xl flex items-center justify-between bg-red-50/40 border border-red-100";
        }

        document.getElementById('viewReportModal').classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    function closeViewModal() {
        document.getElementById('viewReportModal').classList.add('hidden');
    }
</script>
@endsection