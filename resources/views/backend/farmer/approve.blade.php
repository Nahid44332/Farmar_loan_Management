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
    font-size:28px;
    font-weight:700;
    color:#111827;
    margin:0;
}

.total_badge{
    background:#16a34a;
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
    min-width:1000px;
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
    border-bottom:1px solid #e5e7eb;
    transition:0.3s;
}

.table tbody tr:hover{
    background:#f9fafb;
}

.table tbody td{
    padding:15px;
    vertical-align:middle;
    font-size:14px;
    color:#374151;
}

.farmer_img{
    width:65px;
    height:65px;
    border-radius:50%;
    object-fit:cover;
    border:3px solid #e5e7eb;
}

.badge_approved{
    background:#16a34a;
    color:#fff;
    padding:8px 16px;
    border-radius:30px;
    font-size:13px;
    font-weight:600;
    display:inline-block;
}

.no_data{
    text-align:center;
    padding:60px 20px;
}

.no_data img{
    width:120px;
    margin-bottom:15px;
}

.no_data h4{
    color:#6b7280;
}

@media(max-width:768px){

    .page_title{
        font-size:22px;
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

        <!-- TOP AREA -->
        <div class="top_area">

            <h2 class="page_title">
                Approved Farmers List
            </h2>

            <span class="total_badge">
                Approved : {{ $farmers->count() }}
            </span>

        </div>

        <!-- TABLE -->
        <div class="table-responsive">

            <table class="table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Category</th>
                        <th>Loan</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($farmers as $farmer)

                    <tr>

                        <td>#{{ $farmer->id }}</td>

                        <td>
                            <img src="{{ asset('/backend/images/farmer/'.$farmer->image) }}" class="farmer_img">
                        </td>

                        <td>
                            {{ $farmer->name }}
                        </td>

                        <td>
                            {{ $farmer->phone }}
                        </td>

                        <td>
                            <span class="badge bg-warning px-3 py-2">
                                {{ $farmer->category }}
                            </span>
                        </td>

                        <td>
                            ৳{{ $farmer->loan_amount }}
                        </td>

                        <td>
                            {{ $farmer->address }}
                        </td>

                        <td>
                            <span class="badge_approved">
                                Approved
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="8" class="no_data">

                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png">

                            <h4>No Approved Farmer Found</h4>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection