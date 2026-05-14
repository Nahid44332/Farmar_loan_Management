@extends('backend.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body { background: #f1f5f9; font-family: 'Inter', sans-serif; }
    .page_area { padding: 30px; }
    .top_bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
    .page_title { font-size: 32px; font-weight: 800; color: #111827; margin: 0; }
    
    .add_btn {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff; border: none; border-radius: 14px;
        padding: 13px 28px; font-weight: 700; transition: .3s;
        box-shadow: 0 10px 25px rgba(245, 158, 11, .25);
    }
    .add_btn:hover { transform: translateY(-3px); background: #b45309; color: #fff; }

    .testi_grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 28px; }
    
    .testi_card {
        background: #fff; border-radius: 26px; padding: 25px;
        transition: .35s; box-shadow: 0 10px 35px rgba(15, 23, 42, .07);
        border: 1px solid #eef2f7; display: flex; flex-direction: column;
        position: relative;
    }
    .testi_card:hover { transform: translateY(-7px); box-shadow: 0 18px 45px rgba(15, 23, 42, .12); }

    .quote_icon { font-size: 40px; color: #fef3c7; position: absolute; top: 15px; right: 25px; }
    
    .client_info h5 { font-weight: 800; color: #111827; margin-bottom: 2px; }
    .client_info span { font-size: 13px; color: #f59e0b; font-weight: 600; text-transform: uppercase; }
    
    .comment_text { font-size: 15px; color: #4b5563; line-height: 1.6; margin: 20px 0; font-style: italic; }

    .action_btns { display: flex; gap: 12px; margin-top: auto; }
    .edit_btn { background: #0ea5e9; color: white; flex: 1; border: none; border-radius: 12px; padding: 11px; font-weight: 700; }
    .delete_btn { background: #ef4444; color: white; flex: 1; border: none; border-radius: 12px; padding: 11px; font-weight: 700; text-decoration: none; text-align: center; }

    .modal-content { border-radius: 28px; padding: 15px; border: none; }
    .form-control { border-radius: 14px; padding: 12px; border: 1px solid #e5e7eb; }
</style>

<div class="page_area">
    <div class="top_bar">
        <h2 class="page_title">Clients Feedback</h2>
        <button class="add_btn" data-bs-toggle="modal" data-bs-target="#addTestiModal">+ Add Feedback</button>
    </div>

    <div class="testi_grid">
        @forelse($testimonials as $item)
            <div class="testi_card">
                <div class="quote_icon">"</div>
                <div class="client_info">
                    <h5>{{ $item->name }}</h5>
                    <span>{{ $item->designation }}</span>
                </div>
                
                <p class="comment_text">
                    {{ Str::limit($item->comment, 120) }}
                </p>

                <div class="action_btns">
                    <button class="edit_btn" data-bs-toggle="modal" data-bs-target="#editTesti{{ $item->id }}">Edit</button>
                    <a href="{{ route('testimonial.delete', $item->id) }}" class="delete_btn" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            </div>

            <div class="modal fade" id="editTesti{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0 pb-0">
                            <h5 class="fw-bold">Edit Feedback</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('testimonial.update', $item->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Client Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $item->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Designation</label>
                                    <input type="text" name="designation" class="form-control" value="{{ $item->designation }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Comment</label>
                                    <textarea name="comment" class="form-control" rows="4" required>{{ $item->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-0 pt-0">
                                <button type="submit" class="add_btn w-100">Update Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center w-100 p-5">
                <h4 class="text-muted">No feedback found.</h4>
            </div>
        @endforelse
    </div>
</div>

<div class="modal fade" id="addTestiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold">Add New Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('testimonial.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Client Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Designation</label>
                        <input type="text" name="designation" class="form-control" placeholder="e.g. Farmer">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Comment</label>
                        <textarea name="comment" class="form-control" rows="4" placeholder="Write feedback..." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="submit" class="add_btn w-100">Save Feedback</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection