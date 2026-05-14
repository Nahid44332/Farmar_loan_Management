@extends('backend.master')

@section('content')
    <style>
        /* আপনার আগের সব CSS এখানে থাকবে */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .page_area {
            padding: 30px;
        }

        .top_header {
            background: linear-gradient(135deg, #059669, #065f46);
            border-radius: 28px;
            padding: 30px 35px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .top_header::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            background: rgba(255, 255, 255, .08);
            border-radius: 50%;
            top: -100px;
            right: -70px;
        }

        .top_header h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .top_header p {
            opacity: .85;
            line-height: 1.7;
            max-width: 600px;
        }

        .card_grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 22px;
        }

        .data_card {
            background: #fff;
            border-radius: 22px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
            transition: .3s;
        }

        .data_card:hover {
            transform: translateY(-5px);
        }

        .card_body {
            padding: 22px;
        }

        .icon_box {
            width: 55px;
            height: 55px;
            border-radius: 16px;
            background: linear-gradient(135deg, #10b981, #059669);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            margin-bottom: 18px;
        }

        .card_title {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .card_desc {
            font-size: 14px;
            color: #64748b;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .btn_area {
            display: flex;
            gap: 10px;
        }

        .edit_btn {
            flex: 1;
            text-decoration: none;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            padding: 11px;
            border: none;
            border-radius: 12px;
            text-align: center;
            font-size: 14px;
            font-weight: 700;
            transition: .3s;
            cursor: pointer;
        }

        .edit_btn:hover {
            transform: translateY(-2px);
            color: white;
        }

        .delete_btn {
            flex: 1;
            border: none;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            padding: 11px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
        }

        .delete_btn:hover {
            transform: translateY(-2px);
        }

        @media(max-width:768px) {
            .page_area {
                padding: 15px;
            }

            .top_header {
                padding: 22px;
                border-radius: 22px;
            }

            .top_header h2 {
                font-size: 24px;
            }

            .btn_area {
                flex-direction: column;
            }
        }
    </style>

    <div class="page_area">
        <div class="top_header">
            <h2>🌽 Benefits Management</h2>
            <p>All submitted benefit cards will appear beautifully here with edit and delete options.</p>
        </div>

        <div class="card_grid">
            @foreach ($benefits as $benefit)
                <div class="data_card">
                    <div class="card_body">
                        <div class="icon_box">
                            <i class="{{ $benefit->icon ?? 'fa fa-seedling' }}"></i>
                        </div>

                        <h3 class="card_title">{{ $benefit->title }}</h3>
                        <p class="card_desc">{{ $benefit->description }}</p>

                        <div class="btn_area">
                            <button class="edit_btn" onclick='openEditModal(@json($benefit))' type="button">
                                <i class="fa fa-pen"></i> Edit
                            </button>
                            <form action="{{ route('maize.benefit.delete', $benefit->id) }}" method="POST" style="flex: 1;"
                                onsubmit="return confirm('মামা, নিশ্চিত তো? ডিলিট করে দিব?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete_btn" style="width: 100%;">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="editBenefitModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius: 22px;">
                <div class="modal-header"
                    style="background: linear-gradient(135deg,#3b82f6,#2563eb); color: white; border-radius: 22px 22px 0 0;">
                    <h5 class="modal-title">Edit Benefit Item</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editBenefitForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Icon Class</label>
                                <input type="text" name="icon" id="edit_icon" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Benefit Title</label>
                                <input type="text" name="title" id="edit_title" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" id="edit_description" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="border-radius: 10px;">Close</button>
                        <button type="submit" class="btn btn-primary"
                            style="background: #2563eb; border-radius: 10px; padding: 10px 25px;">Update Benefit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function openEditModal(benefit) {
            // ১. ডাইনামিক রাউট সেট করা
            let updateUrl = "{{ url('admin/maize/benefits/update') }}/" + benefit.id;
            $('#editBenefitForm').attr('action', updateUrl);

            // ২. মডালের ফিল্ডগুলোতে ভ্যালু বসানো
            $('#edit_icon').val(benefit.icon);
            $('#edit_title').val(benefit.title);
            $('#edit_description').val(benefit.description);

            // ৩. মডাল ওপেন করা (Bootstrap 4 এর জন্য)
            $('#editBenefitModal').modal('show');
        }
    </script>
@endpush
