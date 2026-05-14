@extends('backend.master')

@section('content')
    <style>
        /* বেসিক রিসেট */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f1f5f9;
            font-family: 'Inter', sans-serif;
        }

        .page_area {
            padding: 30px;
        }

        /* HEADER */
        .top_header {
            background: linear-gradient(135deg, #059669, #065f46);
            border-radius: 28px;
            padding: 35px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .top_header h2 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .top_header p {
            opacity: .85;
            line-height: 1.7;
            max-width: 600px;
            position: relative;
            z-index: 1;
        }

        /* FAQ GRID */
        .faq_grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 25px;
        }

        .faq_card {
            background: #fff;
            border-radius: 22px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
            transition: transform .3s ease;
            display: flex;
            flex-direction: column;
        }

        .faq_card:hover { transform: translateY(-5px); }

        .card_body {
            padding: 24px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .question {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .answer {
            font-size: 15px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .btn_area {
            display: flex;
            gap: 12px;
            margin-top: auto;
        }

        .edit_btn, .delete_btn {
            flex: 1;
            padding: 12px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: .3s;
            text-align: center;
            border: none;
            color: white !important;
            text-decoration: none;
        }

        .edit_btn { background: linear-gradient(135deg, #3b82f6, #2563eb); }
        .delete_btn { background: linear-gradient(135deg, #ef4444, #dc2626); }

        /* MODAL STYLES (বড়-ছোট সব স্ক্রিনের জন্য বাইরে নিয়ে আসলাম) */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0; top: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background-color: #fff;
            margin: 8% auto;
            width: 90%;
            max-width: 480px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: modalSlide 0.3s ease;
        }

        @keyframes modalSlide {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header {
            padding: 20px 25px;
            background: #064e3b;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-body { padding: 25px; }
        .modal-body label { display: block; margin-bottom: 8px; font-weight: 600; color: #334155; }
        .modal-body input, .modal-body textarea {
            width: 100%; padding: 12px; margin-bottom: 20px;
            border: 1px solid #e2e8f0; border-radius: 12px; outline: none;
        }
        .modal-body input:focus, .modal-body textarea:focus { border-color: #10b981; box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1); }

        .modal-footer {
            padding: 15px 25px;
            background: #f8fafc;
            text-align: right;
            display: flex;
            gap: 10px;
        }

        .cancel-btn { padding: 10px 20px; background: #e2e8f0; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; }
        .update-btn { padding: 10px 20px; background: #10b981; color: white; border: none; border-radius: 10px; font-weight: 600; cursor: pointer; }

        /* Responsive */
        @media(max-width: 768px) {
            .page_area { padding: 15px; }
            .top_header { padding: 25px; border-radius: 20px; }
            .top_header h2 { font-size: 26px; }
            .faq_grid { grid-template-columns: 1fr; }
        }

        @media(max-width: 480px) {
            .btn_area { flex-direction: column; }
        }
    </style>

    <div class="page_area">
        <div class="top_header">
            <h2>❓ FAQ Management</h2>
            <p>All submitted FAQ questions and answers will appear beautifully here with edit and delete options.</p>
        </div>

        <div class="faq_grid">
            @forelse($faqs as $faq)
                <div class="faq_card">
                    <div class="card_body">
                        <h3 class="question">{{ $faq->question }}</h3>
                        <p class="answer">{{ $faq->answer }}</p>

                        <div class="btn_area">
                            <button type="button" 
                                onclick="openEditModal('{{ $faq->id }}', '{{ addslashes($faq->question) }}', '{{ addslashes($faq->answer) }}')" 
                                class="edit_btn">
                                <i class="fa fa-pen me-1"></i> Edit
                            </button>

                            <form action="{{ route('faq.delete', $faq->id) }}" method="POST" style="flex:1;" 
                                  onsubmit="return confirm('মামা, নিশ্চিত তো? ডিলিট করে দেব?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete_btn" style="width: 100%;">
                                    <i class="fa fa-trash me-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px;">
                    <h4 class="text-muted">মামা, এখনো কোনো FAQ অ্যাড করা হয়নি! 🌽</h4>
                </div>
            @endforelse
        </div>
    </div>

    <div id="myEditModal" class="custom-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="margin:0">Edit FAQ মামা!</h3>
                <span class="close-btn" onclick="closeModal()" style="cursor:pointer; font-size:24px">&times;</span>
            </div>

            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <label>Question</label>
                    <input type="text" name="question" id="edit_question" required>

                    <label>Answer</label>
                    <textarea name="answer" id="edit_answer" rows="4" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="update-btn">Update FAQ</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function openEditModal(id, question, answer) {
            // ফর্মের অ্যাকশন ইউআরএল সেট করা
            document.getElementById('editForm').action = "/admin/rice/faq/update/" + id;
            
            // ইনপুট ফিল্ডে ডাটা বসানো
            document.getElementById('edit_question').value = question;
            document.getElementById('edit_answer').value = answer;
            
            // মোডাল দেখানো
            document.getElementById('myEditModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('myEditModal').style.display = "none";
        }

        // মোডালের বাইরে ক্লিক করলে বন্ধ হবে
        window.onclick = function(event) {
            let modal = document.getElementById('myEditModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endpush