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

    .why_grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 28px; }
    
    .why_card {
        background: #fff; border-radius: 26px; overflow: hidden;
        transition: .35s; box-shadow: 0 10px 35px rgba(15, 23, 42, .07);
        border: 1px solid #eef2f7; display: flex; flex-direction: column;
    }

    .img_area { height: 200px; background: #fef3c7; display: flex; align-items: center; justify-content: center; overflow: hidden; }
    .img_area img { width: 100%; height: 100%; object-fit: cover; }

    .why_body { padding: 25px; }
    .desc_list { list-style: none; padding: 0; margin-bottom: 20px; }
    .desc_list li { font-size: 14px; color: #4b5563; margin-bottom: 8px; display: flex; align-items: start; gap: 8px; }
    .desc_list li i { color: #f59e0b; margin-top: 4px; }

    .action_btns { display: flex; gap: 12px; margin-top: auto; }
    .edit_btn { background: #0ea5e9; color: white; flex: 1; border: none; border-radius: 12px; padding: 11px; font-weight: 700; }
    .delete_btn { background: #ef4444; color: white; flex: 1; border: none; border-radius: 12px; padding: 11px; font-weight: 700; text-decoration: none; text-align: center; }

    .modal-content { border-radius: 28px; padding: 10px; border: none; }
</style>

<div class="page_area">
    <div class="top_bar">
        <h2 class="page_title">Why Choose Us</h2>
        <button class="add_btn" data-bs-toggle="modal" data-bs-target="#addModal">+ Add New Info</button>
    </div>

    <div class="why_grid">
        @forelse($why_chooses as $item)
            <div class="why_card">
                <div class="img_area">
                    <img src="{{ asset($item->image) }}" alt="image">
                </div>

                <div class="why_body">
                    <ul class="desc_list">
                        @php $descs = json_decode($item->description); @endphp
                        @if(is_array($descs))
                            @foreach($descs as $line)
                                <li><i class="fa fa-check-circle"></i> {{ $line }}</li>
                            @endforeach
                        @else
                            <li>{{ $item->description }}</li>
                        @endif
                    </ul>

                    <div class="action_btns">
                        <button class="edit_btn" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Edit</button>
<a href="{{ route('why.delete', $item->id) }}" class="delete_btn" onclick="return confirm('Are you sure?')">Delete</a>                    </div>
                </div>
            </div>

            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-0">
                            <h5 class="fw-bold">Edit Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('why.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="fw-bold">Update Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                
                                <div class="edit-description-container-{{ $item->id }}">
                                    <label class="fw-bold">Descriptions</label>
                                    @if(is_array($descs))
                                        @foreach($descs as $line)
                                            <div class="input-group mb-2 line-group">
                                                <input type="text" name="description[]" class="form-control" value="{{ $line }}">
                                                <button type="button" class="btn btn-danger remove-line">X</button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <button type="button" class="btn btn-outline-primary btn-sm w-100 add-more-edit" data-id="{{ $item->id }}">+ Add More Line</button>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="add_btn w-100">Update Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>No Data.</p>
        @endforelse
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="fw-bold">Add Why Choose Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('why.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="fw-bold">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    
                    <div id="add-description-container">
                        <label class="fw-bold">Descriptions (Lines)</label>
                        <div class="input-group mb-2">
                            <input type="text" name="description[]" class="form-control" placeholder="Point 1" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-warning btn-sm w-100" id="add-more-btn">+ Add More Line</button>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="add_btn w-100">Save Information</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Add More in Create Modal
    $('#add-more-btn').click(function() {
        $('#add-description-container').append('<div class="input-group mb-2 line-group"><input type="text" name="description[]" class="form-control" placeholder="New Point"><button type="button" class="btn btn-danger remove-line">X</button></div>');
    });

    // Add More in Edit Modal
    $('.add-more-edit').click(function() {
        let id = $(this).data('id');
        $(`.edit-description-container-${id}`).append('<div class="input-group mb-2 line-group"><input type="text" name="description[]" class="form-control" placeholder="New Point"><button type="button" class="btn btn-danger remove-line">X</button></div>');
    });

    // Remove Line
    $(document).on('click', '.remove-line', function() {
        $(this).closest('.line-group').remove();
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection