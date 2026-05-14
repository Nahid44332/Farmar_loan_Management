@extends('backend.master')

@section('content')
     <!-- STATS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10 mt-5">

            <!-- CARD -->
            <div
                class="bg-white rounded-[30px] p-7 shadow-lg border border-slate-100 transition-all duration-500 card-hover">

                <div
                    class="w-14 h-14 rounded-2xl bg-emerald-100 flex items-center justify-center text-emerald-600 mb-6">
                    <i class="fa-solid fa-sack-dollar text-2xl"></i>
                </div>

                <p class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">
                    Total Disbursed
                </p>

                <h3 class="text-4xl font-black text-slate-800">
                    ৳ 45.8M
                </h3>

                <div class="mt-5 flex items-center gap-2 text-emerald-500 font-bold">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    +24% This Month
                </div>

            </div>

            <!-- CARD -->
            <div
                class="bg-white rounded-[30px] p-7 shadow-lg border border-slate-100 transition-all duration-500 card-hover">

                <div
                    class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 mb-6">
                    <i class="fa-solid fa-users text-2xl"></i>
                </div>

                <p class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">
                    Active Farmers
                </p>

                <h3 class="text-4xl font-black text-slate-800">
                    12,450
                </h3>

                <div class="mt-5 flex items-center gap-2 text-blue-500 font-bold">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                    +14% Growth
                </div>

            </div>

            <!-- CARD -->
            <div
                class="bg-white rounded-[30px] p-7 shadow-lg border border-slate-100 transition-all duration-500 card-hover">

                <div
                    class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-600 mb-6">
                    <i class="fa-solid fa-file-signature text-2xl"></i>
                </div>

                <p class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">
                    Pending Requests
                </p>

                <h3 class="text-4xl font-black text-slate-800">
                    328
                </h3>

                <div class="mt-5 flex items-center gap-2 text-orange-500 font-bold">
                    <i class="fa-solid fa-clock"></i>
                    Awaiting Review
                </div>

            </div>

            <!-- CARD -->
            <div
                class="bg-white rounded-[30px] p-7 shadow-lg border border-slate-100 transition-all duration-500 card-hover">

                <div
                    class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 mb-6">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>

                <p class="text-slate-400 text-xs uppercase font-bold tracking-widest mb-2">
                    Success Rate
                </p>

                <h3 class="text-4xl font-black text-slate-800">
                    94%
                </h3>

                <div class="mt-5 flex items-center gap-2 text-purple-500 font-bold">
                    <i class="fa-solid fa-bolt"></i>
                    Excellent
                </div>

            </div>

        </div>

        <!-- CONTENT GRID -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <!-- TABLE -->
            <div
                class="xl:col-span-2 bg-white rounded-[35px] shadow-lg border border-slate-100 overflow-hidden">

                <div
                    class="p-7 border-b border-slate-100 flex items-center justify-between">

                    <div>
                        <h3 class="text-2xl font-black text-slate-800">
                            Recent Applications
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Latest farmer loan applications
                        </p>
                    </div>

                    <button
                        class="px-5 py-2 rounded-xl bg-emerald-100 text-emerald-700 font-bold text-sm hover:bg-emerald-200 transition">
                        View All
                    </button>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full min-w-[700px]">

                        <thead class="bg-slate-50 text-slate-400 uppercase text-xs">

                            <tr>
                                <th class="px-8 py-5 text-left">Farmer</th>
                                <th class="px-8 py-5 text-left">Loan</th>
                                <th class="px-8 py-5 text-left">Risk</th>
                                <th class="px-8 py-5 text-center">Status</th>
                            </tr>

                        </thead>

                        <tbody class="divide-y divide-slate-100">

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-8 py-6">

                                    <div class="flex items-center gap-4">

                                        <div
                                            class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-black">
                                            MK
                                        </div>

                                        <div>
                                            <h4 class="font-bold text-slate-800">
                                                Mustafizur Khan
                                            </h4>

                                            <p class="text-xs text-slate-500">
                                                Rice Farmer • Gazipur
                                            </p>
                                        </div>

                                    </div>

                                </td>

                                <td class="px-8 py-6 font-black text-slate-700">
                                    ৳ 85,000
                                </td>

                                <td class="px-8 py-6">

                                    <div
                                        class="w-28 h-2 rounded-full bg-slate-100 overflow-hidden">

                                        <div
                                            class="w-[80%] h-full bg-emerald-500 rounded-full">
                                        </div>

                                    </div>

                                </td>

                                <td class="px-8 py-6 text-center">

                                    <span
                                        class="px-4 py-2 rounded-xl bg-emerald-100 text-emerald-700 text-xs font-black uppercase">
                                        Approved
                                    </span>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- QUICK ACTION -->
            <div
                class="bg-gradient-to-br from-emerald-800 to-emerald-950 rounded-[35px] p-8 text-white relative overflow-hidden shadow-2xl">

                <div
                    class="absolute -bottom-16 -right-16 text-[220px] text-white/5 rotate-12">
                    <i class="fa-solid fa-leaf"></i>
                </div>

                <div class="relative z-10">

                    <span
                        class="px-4 py-2 rounded-full bg-white/10 text-xs uppercase font-bold tracking-widest">
                        Smart Action
                    </span>

                    <h3 class="text-3xl font-black mt-6 leading-tight">
                        Quick Loan <br> Disbursement
                    </h3>

                    <p class="text-white/60 mt-4 text-sm leading-relaxed">
                        Process emergency agricultural loans instantly using AI-based verification.
                    </p>

                    <div class="space-y-4 mt-8">

                        <button
                            class="w-full py-4 rounded-2xl bg-white text-emerald-900 font-black hover:scale-105 transition-all duration-300 shadow-xl">
                            START NEW CASE
                        </button>

                        <button
                            class="w-full py-4 rounded-2xl border border-white/20 bg-white/5 hover:bg-white/10 transition-all font-bold">
                            VERIFY DOCUMENT
                        </button>

                    </div>

                </div>

            </div>

        </div>

@endsection