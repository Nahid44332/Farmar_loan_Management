@extends('backend.farmer-panel.master')
@section('content')
<div class="p-4 md:p-6 bg-slate-50 min-h-screen" x-data="{ loanModal: false }">

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-black text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-hand-holding-dollar text-emerald-600"></i> লোন ব্যবস্থাপনা
            </h1>
            <p class="text-xs text-slate-500 mt-1">আপনার লোনের আবেদন এবং বর্তমান অবস্থা এখান থেকে ট্র্যাক করুন।</p>
        </div>
        
        @if(!$farmer->loan_amount || $farmer->status == 'rejected')
        <button @click="loanModal = true" class="bg-[#064e3b] hover:bg-emerald-800 text-white font-bold text-sm px-5 py-3 rounded-xl transition shadow-md flex items-center gap-2 focus:outline-none">
            <i class="fa-solid fa-plus"></i> নতুন লোনের আবেদন
        </button>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-8">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 bg-slate-100 text-slate-600 rounded-xl flex items-center justify-center text-xl">
                <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-400 block uppercase">আবেদনকৃত লোন</span>
                <span class="text-xl font-black text-slate-800 mt-0.5 block">৳{{ number_format($farmer->loan_amount ?? 0) }}</span>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl flex items-center justify-center text-xl 
                {{ $farmer->status == 'approved' ? 'bg-emerald-50 text-emerald-600' : ($farmer->status == 'pending' ? 'bg-amber-50 text-amber-600' : 'bg-red-50 text-red-600') }}">
                <i class="fa-solid {{ $farmer->status == 'approved' ? 'fa-circle-check' : ($farmer->status == 'pending' ? 'fa-clock' : 'fa-circle-xmark') }}"></i>
            </div>
            <div>
                <span class="text-xs font-bold text-slate-400 block uppercase">লোন স্ট্যাটাস</span>
                <span class="text-lg font-black mt-0.5 block 
                    {{ $farmer->status == 'approved' ? 'text-emerald-600' : ($farmer->status == 'pending' ? 'text-amber-600' : 'text-red-600') }}">
                    @if($farmer->status == 'approved') অনুমোদিত 
                    @elseif($farmer->status == 'pending') পেন্ডিং (যাচাই চলছে)
                    @elseif($farmer->status == 'rejected') বাতিলকৃত
                    @else কোনো আবেদন নেই 
                    @endif
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="p-5 border-b border-slate-100">
            <h3 class="font-bold text-slate-800 flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-emerald-600"></i> আপনার বর্তমান লোনের বিবরণ
            </h3>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-wider border-b border-slate-100">
                        <th class="py-4 px-6">চাষীর নাম</th>
                        <th class="py-4 px-6">ক্যাটাগরি</th>
                        <th class="py-4 px-6">টাকার পরিমাণ</th>
                        <th class="py-4 px-6">মাসিক কিস্তি</th>
                        <th class="py-4 px-6 text-center">স্ট্যাটাস</th>
                    </tr>
                </thead>
                <tbody class="text-slate-600 text-sm font-medium">
                    @if($farmer->loan_amount)
                    <tr class="hover:bg-slate-50/50 transition">
                        <td class="py-4 px-6 font-bold text-slate-800">{{ $farmer->name }}</td>
                        <td class="py-4 px-6 uppercase text-xs font-bold text-slate-500">{{ $farmer->category }}</td>
                        <td class="py-4 px-6 font-black text-emerald-700">৳{{ number_format($farmer->loan_amount) }}</td>
                        <td class="py-4 px-6 font-black text-emerald-700">৳{{ number_format($farmer->monthly_installment) }}</td>
                        <td class="py-4 px-6 text-center">
                            @if($farmer->status == 'pending')
                                <span class="bg-amber-50 text-amber-600 text-xs px-3 py-1 rounded-full font-bold border border-amber-200/50">পেন্ডিং</span>
                            @elseif($farmer->status == 'approved')
                                <span class="bg-emerald-50 text-emerald-600 text-xs px-3 py-1 rounded-full font-bold border border-emerald-200/50">অনুমোদিত</span>
                            @else
                                <span class="bg-red-50 text-red-600 text-xs px-3 py-1 rounded-full font-bold border border-red-200/50">বাতিলকৃত</span>
                            @endif
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="4" class="py-12 text-center text-slate-400">
                            <i class="fa-solid fa-folder-open text-4xl block mb-3 text-slate-300"></i>
                            এখনো কোনো লোনের আবেদন করা হয়নি।
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="loanModal" class="fixed inset-0 z-50 flex items-center justify-center p-4" x-cloak>
        <div @click="loanModal = false" class="fixed inset-0 bg-black/50 backdrop-blur-sm"></div>

        <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 z-10 border border-slate-100">
            <div class="flex justify-between items-center mb-6 pb-3 border-b border-slate-100">
                <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-emerald-600"></i> নতুন লোনের জন্য আবেদন করুন
                </h3>
                <button @click="loanModal = false" class="text-slate-400 hover:text-slate-600"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 mb-1.5">লোনের পরিমাণ (টাকা) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 font-black text-slate-400 text-sm">৳</span>
                            <input type="number" name="loan_amount" placeholder="যেমন: ৫০,০০০" class="w-full bg-slate-50 border border-slate-200 rounded-xl pl-9 pr-4 py-2.5 text-sm font-medium text-slate-800 focus:bg-white focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition outline-none" required>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3 border-t border-slate-100 pt-4">
                    <button type="button" @click="loanModal = false" class="bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-sm px-5 py-2.5 rounded-xl transition">বাতিল</button>
                    <button type="submit" class="bg-[#064e3b] hover:bg-emerald-800 text-white font-bold text-sm px-5 py-2.5 rounded-xl transition shadow-md">আবেদন জমা দিন</button>
                </div>
            </form>
        </div>
    </div>

</div>

<style>
    [x-cloak] { display: none !important; }
</style>
@endsection