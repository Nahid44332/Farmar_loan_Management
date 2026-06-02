@extends('backend.farmer-panel.master')
@section('content')
<div class="container-fluid py-4">
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-3 p-md-4">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark m-0 fs-5 sm:fs-4">আমার কিস্তি ও লেনদেনের তালিকা</h4>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 bg-emerald-100 text-emerald-800 p-3 rounded-3 mb-4 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 bg-red-100 text-red-800 p-3 rounded-3 mb-4 text-sm">
                    <ul class="mb-0 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive border rounded-3 w-100" style="-webkit-overflow-scrolling: touch;">
                <table class="table table-hover align-middle mb-0 text-sm">
                    <thead class="bg-light border-bottom text-secondary">
                        <tr>
                            <th class="px-3 py-3 fw-semibold text-start text-nowrap" style="width: 15%;">কিস্তি নং</th>
                            <th class="px-3 py-3 fw-semibold text-start text-nowrap" style="width: 25%;">টাকার পরিমাণ</th>
                            <th class="px-3 py-3 fw-semibold text-start text-nowrap" style="width: 25%;">শেষ তারিখ</th>
                            <th class="px-3 py-3 fw-semibold text-start text-nowrap" style="width: 15%;">অবস্থা</th>
                            <th class="px-3 py-3 fw-semibold text-start text-nowrap" style="width: 20%;">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @forelse($installments as $installment)
                            <tr>
                                <td class="px-3 py-3 fw-bold text-secondary text-nowrap">কিস্তি #{{ $installment->installment_no }}</td>
                                <td class="px-3 py-3 fw-semibold text-dark text-nowrap">{{ number_format($installment->amount, 2) }} টাকা</td>
                                <td class="px-3 py-3 text-muted text-nowrap">{{ date('d M, Y', strtotime($installment->due_date)) }}</td>
                                <td class="px-3 py-3 text-nowrap">
                                    @if($installment->status == 'paid')
                                        <span class="badge bg-emerald-100 text-emerald-800 px-2.5 py-1.5 rounded-pill fw-medium" style="font-size: 11px;">পরিশোধিত</span>
                                    @elseif($installment->status == 'overdue')
                                        <span class="badge bg-rose-100 text-rose-800 px-2.5 py-1.5 rounded-pill fw-medium" style="font-size: 11px;">সময় পার হয়েছে</span>
                                    @else
                                        <span class="badge bg-amber-100 text-amber-800 px-2.5 py-1.5 rounded-pill fw-medium" style="font-size: 11px;">বাকি আছে</span>
                                    @endif
                                </td>
                                <td class="px-3 py-3 text-nowrap">
                                    @if($installment->status != 'paid')
                                        <button type="button" 
                                                class="btn btn-sm btn-success bg-emerald-600 border-0 hover:bg-emerald-700 text-white px-3 py-1.5 rounded-3 fw-medium text-xs d-inline-flex align-items-center gap-1 shadow-sm"
                                                onclick="openPaymentModal('{{ $installment->id }}', '{{ $installment->installment_no }}', '{{ $installment->amount }}')">
                                            <i class="fa-solid fa-wallet"></i> পেমেন্ট করুন
                                        </button>
                                    @else
                                        <span class="text-emerald-600 fw-bold text-xs d-inline-flex align-items-center gap-1">
                                            <i class="fa-solid fa-circle-check"></i> সম্পূর্ণ
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted text-sm">কোনো কিস্তির শিডিউল পাওয়া যায়নি।</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="paymentModal" tabindex="-1" data-bs-backdrop="false" aria-labelledby="paymentModalLabel" aria-hidden="true" style="background: rgba(0,0,0,0.4); z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered px-3" style="max-width: 440px; margin-right: auto; margin-left: auto;">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header bg-emerald-600 text-white border-0 py-3 px-4">
                <h5 class="modal-title fw-bold fs-6" id="paymentModalLabel">কিস্তির টাকা পরিশোধ ফর্ম</h5>
                <button type="button" class="btn-close btn-close-white shadow-none text-xs" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('farmer.payments.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4 text-sm">
                    <input type="hidden" name="installment_id" id="modal_installment_id">

                    <div class="mb-3 bg-light p-3 rounded-3 border border-gray-100">
                        <p class="mb-1 text-muted fw-medium">পরিশোধ করছেন: <span id="text_installment_no" class="fw-bold text-dark"></span></p>
                        <p class="mb-0 text-muted fw-medium">টাকার পরিমাণ: <span id="text_installment_amount" class="fw-bold text-emerald-600"></span> টাকা</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary mb-1">পেমেন্ট মাধ্যম সিলেক্ট করুন</label>
                        <select name="payment_method" class="form-select border-gray-300 rounded-3 text-sm shadow-none form-control" required>
                            <option value="">-- মাধ্যম বাছুন --</option>
                            <option value="bkash">বিকাশ (bKash)</option>
                            <option value="nagad">নগদ (Nagad)</option>
                            <option value="rocket">রকেট (Rocket)</option>
                            <option value="bank">ব্যাংক ট্রান্সফার (Bank Transfer)</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary mb-1">টাকার পরিমাণ</label>
                        <input type="number" name="amount" id="modal_amount_input" class="form-control border-gray-300 rounded-3 bg-light fw-bold text-sm shadow-none" readonly required>
                    </div>

                    <div class="mb-1">
                        <label class="form-label fw-semibold text-secondary mb-1">ট্রানজেকশন আইডি (Transaction ID)</label>
                        <input type="text" name="transaction_id" class="form-control border-gray-300 rounded-3 text-sm shadow-none" placeholder="যেমন: 8rrCK9PKtK" required>
                        <small class="text-muted text-xs mt-1 block">টাকা পাঠানোর পর যে ট্রানজেকশন আইডি পেয়েছেন তা দিন।</small>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 py-3 px-4 d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary px-3 py-1.5 rounded-3 text-xs border-0 bg-gray-500 hover:bg-gray-600" data-bs-dismiss="modal">বন্ধ করুন</button>
                    <button type="submit" class="btn btn-success bg-emerald-600 hover:bg-emerald-700 px-4 py-1.5 rounded-3 text-white fw-bold text-xs shadow-none border-0 transition">পেমেন্ট সাবমিট করুন</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
    function openPaymentModal(id, no, amount) {
        // ফর্ম ইনপুটে ডাটা সেট করা
        document.getElementById('modal_installment_id').value = id;
        document.getElementById('modal_amount_input').value = amount;
        document.getElementById('text_installment_no').innerText = 'কিস্তি নম্বর ' + no;
        document.getElementById('text_installment_amount').innerText = amount;
        
        // ১. পিওর সিএসএস ও ক্লাস দিয়ে মডাল শো করা (বুটস্ট্র্যাপ ভার্সন ক্ল্যাশ এড়াতে)
        var modalEl = document.getElementById('paymentModal');
        modalEl.classList.add('show');
        modalEl.style.display = 'block';
        document.body.classList.add('modal-open');

        // ২. ক্লোজ বাটন বা বাইরে ক্লিক করলে মডাল বন্ধ করার লজিক
        var closeButtons = modalEl.querySelectorAll('[data-bs-dismiss="modal"], .btn-close');
        closeButtons.forEach(function(btn) {
            btn.onclick = function() {
                modalEl.classList.remove('show');
                modalEl.style.display = 'none';
                document.body.classList.remove('modal-open');
            };
        });
    }
</script>
@endpush