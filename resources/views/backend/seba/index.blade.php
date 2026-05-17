@extends('backend.master')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        .page_area {
            padding: 30px;
        }

        /* TOP BAR */
        .top_bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .page_title {
            font-size: 28px;
            font-weight: 600;
            color: #111827;
            margin: 0;
        }

        /* BUTTONS */
        .add_btn {
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            border: none;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.2);
        }

        .add_btn:hover {
            background: #047857;
            color: white;
            transform: translateY(-2px);
        }

        /* GRID & CARDS */
        .seba_grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }

        .seba_card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            border: 1px solid #eee;
        }

        .seba_card:hover {
            transform: translateY(-5px);
        }

        .seba_img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #e5e7eb;
        }

        .seba_body {
            padding: 20px;
        }

        .seba_body h3 {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 10px;
        }

        .seba_body p {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
            height: 45px;
            overflow: hidden;
        }

        .action_btns {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .edit_btn {
            background: #0ea5e9;
            color: white;
            flex: 1;
            border-radius: 10px;
            padding: 8px;
            border: none;
            font-weight: 600;
        }

        .delete_btn {
            background: #ef4444;
            color: white;
            flex: 1;
            border-radius: 10px;
            padding: 8px;
            border: none;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
        }

        /* MODAL STYLING */
        .modal-content {
            border-radius: 20px;
            border: none;
            padding: 10px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e5e7eb;
        }

        .form-control:focus {
            border-color: #10b981;
            box-shadow: 0 0 0 0.2rem rgba(16, 185, 129, 0.1);
        }
        a{
            text-decoration: none;
        }
    </style>

    <div class="page_area">
        <div class="top_bar">
            <h2 class="page_title">Seba Management</h2>
            <button class="add_btn" data-bs-toggle="modal" data-bs-target="#addSebaModal">
                + Add Seba
            </button>
        </div>

        <div class="seba_grid">
            @foreach ($sebas as $seba)
                <div class="seba_card">
                    <img src="{{ asset('sebas/' . $seba->image) }}" class="seba_img"
                        onerror="this.src='https://via.placeholder.com/300x200?text=No+Image'">
                    <div class="seba_body">
                        <h3>{{ $seba->title }}</h3>
                        <p>{{ Str::limit($seba->description, 80) }}</p>

                        <div class="action_btns">
                            <button class="edit_btn" data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $seba->id }}">Edit</button>
                            <a href="{{ route('seba.delete', $seba->id) }}" class="delete_btn"
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="editModal{{ $seba->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="fw-bold">Edit Seba</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{ route('seba.update', $seba->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" name="title" value="{{ $seba->title }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <textarea name="description" rows="4" class="form-control" required>{{ $seba->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Button Link</label>
                                        <input type="text" name="button_link" value="{{ $seba->button_link }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Current Image</label><br>
                                        <img src="{{ asset('sebas/' . $seba->image) }}" width="80"
                                            class="rounded mb-2">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="submit" class="add_btn w-100">Update Seba</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="addSebaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="fw-bold">Add New Seba</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('seba.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Seba title" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Write description..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Button Link</label>
                            <input type="text" name="button_link" class="form-control" placeholder="https://...">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Seba Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="submit" class="add_btn w-100">Save Seba</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection