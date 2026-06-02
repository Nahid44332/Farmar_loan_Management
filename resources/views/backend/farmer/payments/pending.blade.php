@extends('backend.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                <h4 class="fw-bold text-dark mb-4">পেন্ডিং কিস্তি পেমেন্ট রিকোয়েস্ট</h4>

                @if (session('success'))
                    <div class="alert alert-success border-0 bg-emerald-100 text-emerald-800 p-3 rounded-3 mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive border rounded-3 w-100">
                    <table class="table table-hover align-middle mb-0 text-nowrap text-sm">
                        <thead class="bg-light border-bottom text-secondary">
                            <tr>
                                <th class="px-3 py-3 fw-semibold text-start">চাষীর নাম ও ফোন</th>
                                <th class="px-3 py-3 fw-semibold text-start">কিস্তি নম্বর</th>
                                <th class="px-3 py-3 fw-semibold text-start">টাকার পরিমাণ</th>
                                <th class="px-3 py-3 fw-semibold text-start">মাধ্যম ও TrxID</th>
                                <th class="px-3 py-3 fw-semibold text-start">তারিখ</th>
                                <th class="px-3 py-3 fw-semibold text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @forelse($pendingPayments as $payment)
                                <tr>
                                    <td class="px-3 py-3">
                                        <div class="fw-bold text-dark">
                                            {{ $payment->farmer->name ?? 'অজানা চাষী (ID: ' . $payment->farmer_id . ')' }}</div>
                                        <div class="text-muted text-xs">{{ $payment->farmer->phone ?? 'ফোন নম্বর নেই' }}
                                        </div>
                                    </td>
                                    <td class="px-3 py-3 fw-semibold text-secondary">
                                        কিস্তি #{{ $payment->installment->installment_no ?? 'N/A' }}
                                    </td>
                                    <td class="px-3 py-3 fw-bold text-dark">
                                        {{ number_format($payment->amount, 2) }} টাকা
                                    </td>
                                    <td class="px-3 py-3">
                                        <span
                                            class="badge bg-purple-100 text-purple-800 uppercase px-2 py-1 rounded">{{ $payment->payment_method }}</span>
                                        <div class="fw-bold text-xs mt-1 text-primary">{{ $payment->transaction_id }}</div>
                                    </td>
                                    <td class="px-3 py-3 text-muted">
                                        {{ $payment->created_at ? $payment->created_at->format('d M, Y h:i A') : '' }}
                                    </td>
                                    <td class="px-3 py-3 text-center">
                                        <form action="{{ route('admin.payments.approve', $payment->id) }}" method="POST"
                                            onsubmit="return confirm('আপনি কি নিশ্চিত যে এই পেমেন্টটি এপ্রুভ করতে চান?')">
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-sm btn-success bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-3 fw-medium text-xs border-0">
                                                <i class="fa-solid fa-check mr-1"></i> এপ্রুভ করুন
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">বর্তমানে কোনো পেন্ডিং পেমেন্ট
                                        রিকোয়েস্ট নেই।</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
