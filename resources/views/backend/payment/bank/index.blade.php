@extends('backend.master')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Bank Approved Payments</h2>
        <span class="bg-emerald-100 text-emerald-800 text-xs font-medium px-3 py-1 rounded-full">Total Approved: {{ $payments->count() }}</span>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm font-semibold uppercase tracking-wider">
                        <th class="p-4">Bank Name</th>
                        <th class="p-4">Name & Address</th>
                        <th class="p-4">Phone No</th>
                        <th class="p-4 text-center">Amount</th>
                        <th class="p-4">Acc / Transaction ID</th>
                        <th class="p-4">Approved At</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                    @forelse($payments as $row)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-4">
                                <span class="bg-emerald-50 text-emerald-700 font-bold text-xs px-3 py-1.5 rounded-lg border border-emerald-200">
                                    {{ $row->bank_name }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="font-medium text-gray-900">{{ $row->name }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $row->address }}</div>
                            </td>
                            <td class="p-4 font-mono font-medium text-gray-600">{{ $row->phone }}</td>
                            <td class="p-4 text-center font-bold text-emerald-600">{{ number_format($row->amount, 2) }} ৳</td>
                            <td class="p-4"><span class="bg-gray-100 text-gray-800 font-mono text-xs px-2.5 py-1 rounded">{{ $row->transaction_id }}</span></td>
                            <td class="p-4 text-xs text-gray-500 font-mono">{{ $row->updated_at->format('d M Y, h:i A') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-8 text-center text-gray-400 italic">No approved Bank payments found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection