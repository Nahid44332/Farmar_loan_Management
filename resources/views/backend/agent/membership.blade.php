@extends('backend.master')
 @section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Agent Membership Requests</h2>
            <p class="text-sm text-gray-500">Review and approve new agent applications</p>
        </div>
        <div class="bg-amber-100 text-amber-700 px-4 py-2 rounded-lg font-bold shadow-sm">
            Pending Requests: {{ $requests->count() }}
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Agent Info</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Location</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Experience</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Documents</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($requests as $agent)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                                {{ substr($agent->name, 0, 1) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">{{ $agent->name }}</div>
                                <div class="text-xs text-gray-500">{{ $agent->phone }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <i class="fa fa-location-dot mr-1 text-gray-400"></i> {{ $agent->district }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-medium">
                            {{ $agent->experience ?? 0 }} Years
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        @if($agent->nid_proof)
                            <a href="{{ asset('uploads/agents/'.$agent->nid_proof) }}" target="_blank" class="text-emerald-500 hover:underline text-sm font-medium">
                                <i class="fa fa-file-pdf mr-1"></i> View NID
                            </a>
                        @else
                            <span class="text-gray-400 text-xs italic">No File</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <form action="{{ route('admin.agent.approve', $agent->id) }}" method="POST">
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
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">
                        No pending requests found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection