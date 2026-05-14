@extends('backend.master')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#f1f5f9;
    font-family:'Inter',sans-serif;
}

/* PAGE */
.page_area{
    padding:30px;
}

/* TOP BAR */
.top_bar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:35px;
    gap:20px;
    flex-wrap:wrap;
}

.page_title{
    font-size:32px;
    font-weight:800;
    color:#111827;
    margin:0;
}

/* BUTTON */
.add_btn{
    background:linear-gradient(135deg,#f59e0b,#d97706);
    color:#fff;
    border:none;
    border-radius:14px;
    padding:13px 28px;
    font-weight:700;
    transition:.3s;
    box-shadow:0 10px 25px rgba(245,158,11,.25);
}

.add_btn:hover{
    transform:translateY(-3px);
    background:#b45309;
    color:#fff;
}

/* GRID */
.achievement_grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(320px,1fr));
    gap:28px;
}

/* CARD */
.achievement_card{
    background:#fff;
    border-radius:26px;
    overflow:hidden;
    position:relative;
    transition:.35s;
    box-shadow:0 10px 35px rgba(15,23,42,.07);
    border:1px solid #eef2f7;
}

.achievement_card:hover{
    transform:translateY(-7px);
    box-shadow:0 18px 45px rgba(15,23,42,.12);
}

/* ICON AREA */
.icon_area{
    height:180px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(135deg,#fef3c7,#fde68a);
}

.icon_area i{
    font-size:70px;
    color:#d97706;
}

/* BODY */
.achievement_body{
    padding:25px;
    text-align:center;
}

.achievement_number{
    font-size:42px;
    font-weight:900;
    color:#111827;
    margin-bottom:8px;
}

.achievement_title{
    font-size:20px;
    font-weight:700;
    color:#374151;
    margin-bottom:20px;
}

/* ACTION BUTTONS */
.action_btns{
    display:flex;
    gap:12px;
}

.edit_btn,
.delete_btn{
    flex:1;
    border:none;
    border-radius:12px;
    padding:11px;
    font-weight:700;
    transition:.3s;
    text-decoration:none;
}

.edit_btn{
    background:#0ea5e9;
    color:white;
}

.edit_btn:hover{
    background:#0284c7;
}

.delete_btn{
    background:#ef4444;
    color:white;
}

.delete_btn:hover{
    background:#dc2626;
    color:white;
}

/* MODAL */
.modal-content{
    border:none;
    border-radius:28px;
    overflow:hidden;
    padding:10px;
}

.modal-title{
    font-size:24px;
    font-weight:800;
    color:#111827;
}

.form-label{
    font-weight:700;
    color:#111827;
    margin-bottom:8px;
}

.form-control{
    border-radius:14px;
    border:1px solid #e5e7eb;
    padding:14px;
    font-size:15px;
    transition:.3s;
}

.form-control:focus{
    border-color:#f59e0b;
    box-shadow:0 0 0 .2rem rgba(245,158,11,.12);
}

/* EMPTY */
.empty_state{
    background:#fff;
    border-radius:24px;
    padding:60px 30px;
    text-align:center;
    grid-column:1/-1;
    box-shadow:0 10px 30px rgba(0,0,0,.05);
}

.empty_state h3{
    font-size:24px;
    font-weight:800;
    color:#111827;
    margin-bottom:10px;
}

.empty_state p{
    color:#6b7280;
    margin:0;
}

/* MOBILE */
@media(max-width:768px){

    .page_area{
        padding:20px;
    }

    .page_title{
        font-size:26px;
    }

}

</style>

<div class="page_area">
    <div class="top_bar">
        <h2 class="page_title">Achievement Management</h2>
        <button class="add_btn" data-bs-toggle="modal" data-bs-target="#addAchievementModal">
            + Add Achievement
        </button>
    </div>

    <div class="achievement_grid">
        @forelse ($achievements as $achievement)
            <div class="achievement_card">
                <div class="icon_area"><i class="fa fa-trophy"></i></div>
                <div class="achievement_body">
                    <div class="achievement_number">
                        {{-- এখানে 'number' এর বদলে 'count_number' হবে --}}
                        {{ $achievement->count_number }} 
                    </div>
                    <div class="achievement_title">{{ $achievement->title }}</div>

                    <div class="action_btns">
                        <button class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal{{ $achievement->id }}">
                            Edit
                        </button>
                        <a href="{{ route('achievement.delete', $achievement->id) }}" class="delete_btn" onclick="return confirm('Are you sure?')">
                            Delete
                        </a>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal{{ $achievement->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('achievement.update', $achievement->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Achievement Number</label>
                                    {{-- name="number" বদলে name="count_number" --}}
                                    <input type="text" name="count_number" value="{{ $achievement->count_number }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Achievement Title</label>
                                    <input type="text" name="title" value="{{ $achievement->title }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="add_btn w-100">Update Achievement</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty_state">
                <h3>No Achievements Found</h3>
                <p>Add your first achievement to get started.</p>
            </div>
        @endforelse
    </div>
</div>

<div class="modal fade" id="addAchievementModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('achievement.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Achievement Number</label>
                        {{-- name="number" বদলে name="count_number" --}}
                        <input type="text" name="count_number" class="form-control" placeholder="100+" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Achievement Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Happy Clients" required>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="add_btn w-100">Save Achievement</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection