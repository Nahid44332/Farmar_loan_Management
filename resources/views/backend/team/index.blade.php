@extends('backend.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f1f5f9; font-family: 'Inter', sans-serif; }
        .page_area { padding: 30px; }
        .top_bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 20px; flex-wrap: wrap; }
        .page_title { font-size: 28px; font-weight: 800; color: #111827; margin: 0; }
        .add_btn { background: linear-gradient(135deg, #10b981, #059669); color: #fff; padding: 12px 24px; border-radius: 12px; text-decoration: none; font-weight: 700; border: none; transition: 0.3s; box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2); }
        .add_btn:hover { background: #047857; color: white; transform: translateY(-2px); }
        .service_grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; }
        .service_card { background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); transition: 0.3s; border: 1px solid #eee; }
        .service_card:hover { transform: translateY(-5px); }
        .service_img { width: 100%; height: 250px; object-fit: cover; background: #e5e7eb; }
        .service_body { padding: 20px; }
        .service_body h3 { font-size: 20px; font-weight: 700; color: #111827; margin-bottom: 5px; }
        .service_body p { color: #6b7280; font-size: 14px; line-height: 1.6; margin-bottom: 15px; }
        .action_btns { display: flex; gap: 10px; margin-top: 15px; }
        .edit_btn { background: #0ea5e9; color: white; flex: 1; border-radius: 10px; padding: 8px; border: none; font-weight: 600; }
        .delete_btn { background: #ef4444; color: white; flex: 1; border-radius: 10px; padding: 8px; border: none; font-weight: 600; text-align: center; text-decoration: none; }
        .modal-content { border-radius: 20px; border: none; padding: 10px; }
        .form-control { border-radius: 10px; padding: 12px; border: 1px solid #e5e7eb; }
        .form-control:focus { border-color: #10b981; box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.1); }
        a { text-decoration: none; }
    </style>

    <div class="page_area">
        <div class="top_bar">
            <h2 class="page_title">Team Management</h2>
            <button class="add_btn" data-bs-toggle="modal" data-bs-target="#addTeamModal">
                + Add Member
            </button>
        </div>

        <div class="service_grid">
            @foreach ($teams as $member)
                <div class="service_card">
                    <img src="{{ asset('backend/images/teams/' . $member->image) }}" class="service_img"
                        onerror="this.src='https://via.placeholder.com/300x300?text=Member+Image'">
                    <div class="service_body">
                        <h3>{{ $member->name }}</h3>
                        <p class="text-muted">{{ $member->designation }}</p>

                        <div class="action_btns">
                            <button class="edit_btn" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $member->id }}">Edit</button>
                            <a href="{{ route('team.delete', $member->id) }}" class="delete_btn"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal{{ $member->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="fw-bold">Edit Member</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('team.update', $member->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Name</label>
                                        <input type="text" name="name" value="{{ $member->name }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Designation</label>
                                        <input type="text" name="designation" value="{{ $member->designation }}" 
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Image</label><br>
                                        <img src="{{ asset('backend/images/teams/' . $member->image) }}" width="80"
                                            class="rounded mb-2">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="add_btn w-100">Update Member</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="addTeamModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="fw-bold">Add New Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Member's name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="e.g. Founder & CEO" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Member Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="add_btn w-100">Save Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection