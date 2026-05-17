@extends('backend.master')
@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Investor Membership Requests</h2>
            <p class="text-sm text-gray-500">Review and approve new investor applications</p>
        </div>
        <div class="bg-amber-100 text-amber-700 px-4 py-2 rounded-lg font-bold shadow-sm">
            Pending Requests: {{ $requests->count() }}
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Investor Info</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Range</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Documents (NID)</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($requests as $investor)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                                {{ substr($investor->first_name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">{{ $investor->first_name }} {{ $investor->last_name }}</div>
                                <div class="text-xs text-gray-500">{{ $investor->phone }} | {{ $investor->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium">
                            {{ $investor->investment_range }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            @if($investor->nid_front)
                                <a href="{{ asset('uploads/investors/'.$investor->nid_front) }}" target="_blank" class="text-emerald-500 hover:underline text-xs font-medium">
                                    <i class="fa fa-file-image mr-1"></i> Front Part
                                </a>
                            @endif
                            @if($investor->nid_back)
                                <a href="{{ asset('uploads/investors/'.$investor->nid_back) }}" target="_blank" class="text-emerald-500 hover:underline text-xs font-medium">
                                    <i class="fa fa-file-image mr-1"></i> Back Part
                                </a>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('admin.investor.approve', $investor->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-xs font-bold transition shadow-sm">
                                    Approve
                                </button>
                            </form>
                            <button class="bg-red-50 hover:bg-red-100 text-red-500 px-4 py-2 rounded-lg text-xs font-bold transition">
                                Reject
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">
                        No pending requests found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection