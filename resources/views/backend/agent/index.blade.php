@extends('backend.master') 

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Approved Agent List</h2>
            <p class="text-sm text-gray-500">Manage all registered and active agents</p>
        </div>
        <div class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg font-bold shadow-sm">
            Total Agents: {{ $agents->count() }}
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
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Agent Info</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Working Area</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Experience</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($agents as $agent)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold shadow-sm">
                                {{ strtoupper(substr($agent->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">{{ $agent->name }}</div>
                                <div class="text-xs text-gray-500">{{ $agent->phone }}</div>
                            </div>
                        </div>
                    </td>
                    
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <i class="fa fa-location-dot mr-1 text-emerald-500"></i> {{ $agent->district }}
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">
                            {{ $agent->experience ?? 0 }} Years
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Active
                        </span>
                    </td>
                    
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <button type="button" onclick="openViewModal('{{ $agent->id }}')" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-2 rounded-lg text-xs font-bold transition shadow-sm" title="View Details">
                                <i class="fa fa-eye"></i>
                            </button>
                            
                            <form action="{{ route('admin.agent.suspend', $agent->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to suspend {{ $agent->name }}?');" class="inline" style="margin:0;">
                                @csrf
                                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 p-2 rounded-lg text-xs font-bold transition" title="Suspend Agent">
                                    <i class="fa fa-ban"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <div id="tailwindModal{{ $agent->id }}" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div class="bg-white rounded-2xl max-w-md w-full shadow-xl overflow-hidden transform transition-all">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-bold text-gray-800">Agent Details Profile</h3>
                            <button type="button" onclick="closeViewModal('{{ $agent->id }}')" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
                        </div>
                        <div class="p-6 space-y-4 text-left">
                            <p class="text-sm text-gray-600"><strong>Full Name:</strong> <span class="text-gray-900 font-semibold">{{ $agent->name }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Phone Number:</strong> <span class="text-gray-900 font-semibold">{{ $agent->phone }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Working Area (District):</strong> <span class="text-gray-900 font-semibold">{{ $agent->district }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Experience:</strong> <span class="text-gray-900 font-semibold">{{ $agent->experience ?? 0 }} Years</span></p>
                            <p class="text-sm text-gray-600"><strong>Status:</strong> <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-xs font-bold rounded-full">Active</span></p>
                            
                            <div class="pt-2 border-t border-gray-100">
                                <p class="text-sm text-gray-600 mb-2"><strong>NID / ID Proof Document:</strong></p>
                                @if($agent->nid_proof)
                                    <a href="{{ asset('uploads/agents/'.$agent->nid_proof) }}" target="_blank" class="inline-flex items-center text-sm bg-emerald-50 text-emerald-600 border border-emerald-200 px-3 py-2 rounded-lg font-medium hover:bg-emerald-100 transition w-full justify-center">
                                        <i class="fa fa-file-invoice mr-2"></i> View Documents File
                                    </a>
                                @else
                                    <span class="text-gray-400 text-xs italic block text-center bg-gray-50 py-2 rounded-lg">No document file uploaded.</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 border-t border-gray-100 text-right">
                            <button type="button" onclick="closeViewModal('{{ $agent->id }}')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-xl text-sm font-semibold transition">Close</button>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="5" class="px-6 py-10 text-center text-gray-400 italic">
                        No approved agents found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
    function openViewModal(id) {
        document.getElementById('tailwindModal' + id).classList.remove('hidden');
    }

    function closeViewModal(id) {
        document.getElementById('tailwindModal' + id).classList.add('hidden');
    }
</script>
@endsection