
@extends('backend.master')

@section('content')

<style>

body{
    background:#f4f7fe;
}

.page_area{
    padding:30px;
}

.main_card{
    background:#ffffff;
    border-radius:20px;
    padding:25px;
    box-shadow:0 8px 25px rgba(0,0,0,0.08);
}

.top_area{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
    flex-wrap:wrap;
    gap:15px;
}

.page_title{
    font-size:30px;
    font-weight:700;
    color:#111827;
    margin:0;
}

.total_badge{
    background:#111827;
    color:#fff;
    padding:10px 18px;
    border-radius:10px;
    font-size:15px;
    font-weight:600;
}

.table-responsive{
    overflow-x:auto;
}

.table{
    width:100%;
    border-collapse:collapse;
    min-width:1200px;
}

.table thead{
    background:#111827;
}

.table thead th{
    color:#fff;
    padding:16px;
    font-size:15px;
    font-weight:600;
    border:none;
    white-space:nowrap;
}

.table tbody tr{
    background:#fff;
    transition:0.3s;
    border-bottom:1px solid #e5e7eb;
}

.table tbody tr:hover{
    background:#f9fafb;
}

.table tbody td{
    padding:15px;
    vertical-align:middle;
    color:#374151;
    font-size:14px;
}

.farmer_img{
    width:65px;
    height:65px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #e5e7eb;
}

.badge_pending,
.badge_approved,
.badge_rejected{
    padding:8px 16px;
    border-radius:30px;
    color:#fff;
    font-size:13px;
    font-weight:600;
    display:inline-block;
}

.badge_pending{
    background:#f59e0b;
}

.badge_approved{
    background:#16a34a;
}

.badge_rejected{
    background:#dc2626;
}

.action_area{
    display:flex;
    gap:10px;
}

.action_btn{
    padding:9px 16px;
    border:none;
    border-radius:8px;
    color:#fff;
    text-decoration:none;
    font-size:13px;
    font-weight:600;
    transition:0.3s;
}

.action_btn:hover{
    color:#fff;
    transform:translateY(-2px);
}

.btn_approve{
    background:#16a34a;
}

.btn_reject{
    background:#dc2626;
}

@media(max-width:768px){

    .page_title{
        font-size:24px;
    }

    .main_card{
        padding:15px;
    }

    .table thead th,
    .table tbody td{
        padding:12px;
        font-size:13px;
    }

}
/* Scrollbar */
.sidebar::-webkit-scrollbar{
    width: 5px;
}

.sidebar::-webkit-scrollbar-thumb{
    background: #10b981;
    border-radius: 20px;
}
.sidebar{
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100vh;
    overflow-y: auto;
    z-index: 999;
}

/* Main Content Right Space */
.page_area{
    margin-left: 280px;
    padding: 30px;
}
</style>

<div class="page_area">

    <div class="main_card">

        <div class="top_area">

            <h2 class="page_title">
                All Farmers
            </h2>

            <span class="total_badge">
                Total : {{ $farmers->count() }}
            </span>

        </div>

        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>NID</th>
                        <th>Category</th>
                        <th>Land</th>
                        <th>Loan</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($farmers as $farmer)

                    <tr>

                        <td>
                            #{{ $farmer->id }}
                        </td>

                        <td>

                            <img src="{{ asset('/backend/images/farmer/'.$farmer->image) }}"
                                 class="farmer_img">

                        </td>

                        <td>
                            {{ $farmer->name }}
                        </td>

                        <td>
                            {{ $farmer->phone }}
                        </td>

                        <td>
                            {{ $farmer->nid }}
                        </td>

                        <td>
                            {{ $farmer->category }}
                        </td>

                        <td>
                            {{ $farmer->land_amount }}
                        </td>

                        <td>
                            ৳{{ $farmer->loan_amount }}
                        </td>

                        <td>
                            {{ $farmer->address }}
                        </td>

                        <td>

                            @if($farmer->status == 'pending')

                                <span class="badge_pending">
                                    Pending
                                </span>

                            @elseif($farmer->status == 'approved')

                                <span class="badge_approved">
                                    Approved
                                </span>

                            @else

                                <span class="badge_rejected">
                                    Rejected
                                </span>

                            @endif

                        </td>

                        <td>

                            <div class="action_area">

                                <a href="{{ url('/admin/farmer-approve/'.$farmer->id) }}"
                                   class="action_btn btn_approve">

                                    Approve

                                </a>

                                <a href="{{ url('/admin/farmer-reject/'.$farmer->id) }}"
                                   class="action_btn btn_reject">

                                    Reject

                                </a>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
