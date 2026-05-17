@extends('backend.master')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Bank Pending Payments</h2>
        <span class="bg-amber-100 text-amber-800 text-xs font-medium px-3 py-1 rounded-full">Total Pending: {{ $requests->count() }}</span>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-emerald-100 text-emerald-800 rounded-lg font-medium text-sm">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm font-semibold uppercase tracking-wider">
                        <th class="p-4">Selected Bank</th>
                        <th class="p-4">Name & Address</th>
                        <th class="p-4">Phone No</th>
                        <th class="p-4 text-center">Amount</th>
                        <th class="p-4">Acc / Transaction ID</th>
                        <th class="p-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                    @forelse($requests as $row)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4">
                                <span class="bg-blue-50 text-blue-700 font-bold text-xs px-3 py-1.5 rounded-lg border border-blue-200">
                                    {{ $row->bank_name }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="font-medium text-gray-900">{{ $row->name }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $row->address }}</div>
                            </td>
                            <td class="p-4 font-mono font-medium text-gray-600">{{ $row->phone }}</td>
                            <td class="p-4 text-center font-bold text-gray-900">{{ number_format($row->amount, 2) }} ৳</td>
                            <td class="p-4"><span class="bg-gray-100 text-gray-800 font-mono text-xs px-2.5 py-1 rounded">{{ $row->transaction_id }}</span></td>
                            <td class="p-4 text-center">
                                <form action="{{ route('admin.bank.approve', $row->id) }}" method="POST" onsubmit="return confirm('Approve this Bank payment?');">
                                    @csrf
                                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-semibold px-4 py-2 rounded-lg shadow-sm transition-all">Approve</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-8 text-center text-gray-400 italic">No pending Bank payments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection