@extends('backend.master') 
@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Approved Investor List</h2>
            <p class="text-sm text-gray-500">Manage all registered and active investors</p>
        </div>
        <div class="bg-emerald-100 text-emerald-700 px-4 py-2 rounded-lg font-bold shadow-sm">
            Total Investors: {{ $investors->count() }}
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
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Investment Range</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($investors as $investor)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold shadow-sm">
                                {{ strtoupper(substr($investor->first_name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-bold text-gray-900">{{ $investor->first_name }} {{ $investor->last_name }}</div>
                                <div class="text-xs text-gray-500">{{ $investor->phone }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-medium">
                            {{ $investor->investment_range }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-700 rounded-full text-xs font-bold">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Active
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">
                            <button type="button" onclick="openViewModal('{{ $investor->id }}')" class="bg-gray-100 hover:bg-gray-200 text-gray-700 p-2 rounded-lg text-xs font-bold transition shadow-sm">
                                <i class="fa fa-eye"></i>
                            </button>
                            
                            <form action="{{ route('admin.investor.suspend', $investor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to suspend this investor?');" style="margin:0;">
                                @csrf
                                <button type="submit" class="bg-red-50 hover:bg-red-100 text-red-500 p-2 rounded-lg text-xs font-bold transition">
                                    <i class="fa fa-ban"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                <div id="tailwindModal{{ $investor->id }}" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 p-4">
                    <div class="bg-white rounded-2xl max-w-md w-full shadow-xl overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                            <h3 class="text-lg font-bold text-gray-800">Investor Profile Details</h3>
                            <button type="button" onclick="closeViewModal('{{ $investor->id }}')" class="text-gray-400 hover:text-gray-600 text-xl font-bold">&times;</button>
                        </div>
                        <div class="p-6 space-y-4 text-left">
                            <p class="text-sm text-gray-600"><strong>Name:</strong> <span class="text-gray-900 font-semibold">{{ $investor->first_name }} {{ $investor->last_name }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Email:</strong> <span class="text-gray-900 font-semibold">{{ $investor->email }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Phone:</strong> <span class="text-gray-900 font-semibold">{{ $investor->phone }}</span></p>
                            <p class="text-sm text-gray-600"><strong>Investment Range:</strong> <span class="text-gray-900 font-semibold">{{ $investor->investment_range }}</span></p>
                            
                            <div class="pt-2 border-t border-gray-100">
                                <p class="text-sm text-gray-600 mb-2"><strong>NID Front Part:</strong></p>
                                @if($investor->nid_front)
                                    <a href="{{ asset('uploads/investors/'.$investor->nid_front) }}" target="_blank" class="inline-flex items-center text-sm bg-emerald-50 text-emerald-600 border border-emerald-200 px-3 py-1.5 rounded-lg font-medium w-full justify-center mb-2">
                                        View NID Front
                                    </a>
                                @endif
                                <p class="text-sm text-gray-600 mb-2"><strong>NID Back Part:</strong></p>
                                @if($investor->nid_back)
                                    <a href="{{ asset('uploads/investors/'.$investor->nid_back) }}" target="_blank" class="inline-flex items-center text-sm bg-emerald-50 text-emerald-600 border border-emerald-200 px-3 py-1.5 rounded-lg font-medium w-full justify-center">
                                        View NID Back
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="p-4 bg-gray-50 border-t border-gray-100 text-right">
                            <button type="button" onclick="closeViewModal('{{ $investor->id }}')" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-2 rounded-xl text-sm font-semibold transition">Close</button>
                        </div>
                    </div>
                </div>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">No approved investors found.</td>
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