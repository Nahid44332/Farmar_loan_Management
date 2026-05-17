 @extends('backend.master')

 @section('content')
     <style>
         body {
             background: #f1f5f9;
         }

         .page_area {
             padding: 30px;
         }

         .main_wrapper {
             background: #ffffff;
             border-radius: 30px;
             padding: 35px;
             box-shadow: 0 15px 50px rgba(0, 0, 0, 0.06);
         }

         .hero_box {
             background: linear-gradient(135deg, #059669, #065f46);
             border-radius: 28px;
             padding: 35px 40px;
             color: white;
             margin-bottom: 35px;
             position: relative;
             overflow: hidden;
         }

         .hero_box::after {
             content: "";
             position: absolute;
             width: 250px;
             height: 250px;
             background: rgba(255, 255, 255, 0.08);
             border-radius: 50%;
             top: -100px;
             right: -60px;
         }

         .hero_box h2 {
             font-size: 34px;
             font-weight: 800;
             margin-bottom: 10px;
         }

         .hero_box p {
             opacity: .85;
             font-size: 15px;
         }

         .section_card {
             background: #fff;
             border-radius: 25px;
             padding: 30px;
             margin-bottom: 30px;
             border: 1px solid #e2e8f0;
         }

         .section_title {
             font-size: 24px;
             font-weight: 800;
             color: #0f172a;
             margin-bottom: 25px;
         }

         .form-label {
             font-size: 14px;
             font-weight: 700;
             color: #334155;
             margin-bottom: 10px;
         }

         .form-control {
             margin-top: 15px;
             width: 100%;
             height: 55px;
             border-radius: 16px;
             border: 1px solid #dbeafe;
             padding: 0 18px;
             font-size: 15px;
             box-shadow: none !important;
         }

         textarea.form-control {
             height: 140px;
             padding-top: 15px;
             resize: none;
         }

         .form-control:focus {
             border-color: #10b981;
             box-shadow: 0 0 0 4px rgba(16, 185, 129, .12) !important;
         }

         .image_upload_box {
             background: #f8fafc;
             border: 2px dashed #10b981;
             border-radius: 25px;
             padding: 25px;
             text-align: center;
             height: 100%;
         }

         .preview_img {
             width: 100%;
             height: 260px;
             object-fit: cover;
             border-radius: 20px;
             margin-top: 20px;
         }

         .benefit_item {
             background: #f8fafc;
             border-radius: 22px;
             padding: 25px;
             margin-bottom: 20px;
             border: 1px solid #e2e8f0;
         }

         .faq_item {
             background: #f8fafc;
             border-radius: 22px;
             padding: 25px;
             border: 1px solid #e2e8f0;
             margin-bottom: 20px;
         }

         .cta_box {
             background: linear-gradient(135deg, #022c22, #065f46);
             border-radius: 30px;
             padding: 35px;
             color: white;
         }

         .cta_box .form-control {
             background: rgba(255, 255, 255, 0.08);
             border: 1px solid rgba(255, 255, 255, 0.12);
             color: white;
         }

         .cta_box .form-control::placeholder {
             color: rgba(255, 255, 255, 0.5);
         }

         .save_btn {
             border: none;
             background: linear-gradient(135deg, #10b981, #059669);
             color: white;
             padding: 16px 40px;
             border-radius: 18px;
             font-size: 16px;
             font-weight: 700;
             margin-top: 25px;
             box-shadow: 0 10px 25px rgba(16, 185, 129, .25);
             transition: .3s;
         }

         .save_btn:hover {
             transform: translateY(-3px);
         }

         .mini_title {
             font-size: 18px;
             font-weight: 700;
             color: #059669;
             margin-bottom: 20px;
         }

         /* =========================
                                       STATIC SIDEBAR
                                    ========================= */

         .sidebar {
             position: fixed;
             top: 0;
             left: 0;
             width: 280px;
             height: 100vh;
             overflow-y: auto;
             z-index: 999;
         }

         /* Main Content Right Space */
         .page_area {
             margin-left: 280px;
             padding: 30px;
         }

         /* Scrollbar */
         .sidebar::-webkit-scrollbar {
             width: 5px;
         }

         .sidebar::-webkit-scrollbar-thumb {
             background: #10b981;
             border-radius: 20px;
         }

         /* Mobile Responsive */
         @media(max-width:992px) {

             .sidebar {
                 transform: translateX(-100%);
                 transition: .3s;
             }

             .sidebar.active {
                 transform: translateX(0);
             }

             .page_area {
                 margin-left: 0;
                 padding: 15px;
             }

         }

         @media(max-width:768px) {

             .page_area {
                 padding: 15px;
             }

             .main_wrapper {
                 padding: 20px;
             }

             .hero_box {
                 padding: 25px;
             }

             .hero_box h2 {
                 font-size: 26px;
             }

             .section_card {
                 padding: 20px;
             }
         }

         #addBenefit {
             background: linear-gradient(135deg, #059669, #10b981);
             color: #fff;
             padding: 10px 18px;
             border: none;
             border-radius: 10px;
             font-size: 15px;
             font-weight: 600;
             cursor: pointer;
             transition: all 0.3s ease;
             box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
         }

         #addBenefit:hover {
             background: linear-gradient(135deg, #047857, #059669);
             transform: translateY(-2px);
             box-shadow: 0 10px 20px rgba(5, 150, 105, 0.4);
         }

         #addBenefit:active {
             transform: scale(0.97);
         }

         #addFaq {
             background: linear-gradient(135deg, #059669, #10b981);
             color: #fff;
             padding: 10px 18px;
             border: none;
             border-radius: 10px;
             font-size: 15px;
             font-weight: 600;
             cursor: pointer;
             transition: all 0.3s ease;
             box-shadow: 0 6px 15px rgba(16, 185, 129, 0.3);
         }

         #addFaq:hover {
             background: linear-gradient(135deg, #047857, #059669);
             transform: translateY(-2px);
             box-shadow: 0 10px 20px rgba(5, 150, 105, 0.4);
         }

         #addFaq:active {
             transform: scale(0.97);
         }
     </style>

     <div class="page_area">

         <div class="main_wrapper">

             <!-- HERO -->
             <div class="hero_box">

                 <h2>
                     🌽 Maize Loan Page Management
                 </h2>

                 <p>
                     Manage your complete maize stock loan page content beautifully.
                 </p>

             </div>

             <form action="{{ url('/admin/maize/update/' . $about->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf

                 <!-- ABOUT -->
                 <div class="section_card">

                     <h3 class="section_title">
                         About Section
                     </h3>

                     <div class="row align-items-start">

                         <div class="col-lg-7">

                             <div class="mb-4">

                                 <label class="form-label">
                                     Section Title
                                 </label>

                                 <input type="text" name="name" class="form-control" value="{{ $about->name }}"
                                     placeholder="Enter section title">

                             </div>

                             <div class="mb-4">

                                 <label class="form-label">
                                     Description One
                                 </label>

                                 <textarea name="desc_one" class="form-control" placeholder="Write first description">{{ $about->desc_one }}</textarea>

                             </div>

                             <div>

                                 <label class="form-label">
                                     Description Two
                                 </label>

                                 <textarea name="desc_two" class="form-control" placeholder="Write second description">{{ $about->desc_two }}</textarea>

                             </div>

                         </div>

                         <div class="col-lg-5 mt-4 mt-lg-0">

                             <div class="image_upload_box">

                                 <label class="form-label d-block mb-3">
                                     Upload About Image
                                 </label>

                                 <input type="file" name="image" class="form-control">

                                 <img src="{{ asset('backend/images/service/'. $about->image) }}" class="preview_img">

                             </div>

                         </div>

                     </div>

                     <!-- SINGLE BUTTON -->
                     <div class="text-end mt-4">

                         <button type="submit" class="save_btn">
                             <i class="fa fa-floppy-disk me-2"></i>
                             Update About
                         </button>

                     </div>

                 </div>

             </form>

             <div class="section_card">
                 <h3 class="section_title">Add New Benefits</h3>
                 <form action="{{ route('maize.benefit.save', $about->id) }}" method="POST">
                     @csrf
                     <div id="benefit_wrapper">
                         <div class="benefit_item">
                             <div class="d-flex justify-content-between align-items-center mb-3">
                                 <div class="mini_title">New Benefit Item</div>
                                 <button type="button" class="btn btn-danger btn-sm remove_benefit">
                                     <i class="fa fa-times"></i>
                                 </button>
                             </div>

                             <div class="row">
                                 <div class="col-md-4 mb-4">
                                     <label class="form-label">Icon Class</label>
                                     <input type="text" name="icon[]" class="form-control" placeholder="fa fa-star">
                                 </div>
                                 <div class="col-md-4 mb-4">
                                     <label class="form-label">Benefit Title</label>
                                     <input type="text" name="title[]" class="form-control" placeholder="Benefit title">
                                 </div>
                                 <div class="col-md-4">
                                     <label class="form-label">Description</label>
                                     <textarea name="description[]" class="form-control" style="height: 55px;" placeholder="Benefit description"></textarea>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="d-flex justify-content-between align-items-center mt-3">
                         <button type="button" class="btn btn-primary" id="addBenefit">+ Add More Field</button>
                         <button type="submit" class="save_btn" style="margin-top: 0;">
                             <i class="fa fa-plus-circle me-1"></i> Confirm Add
                         </button>
                     </div>
                 </form>
             </div>
             <!-- FAQ -->
             <div class="section_card">
                 <h3 class="section_title">
                     FAQ Section
                 </h3>

                 <form action="{{ route('faq.store') }}" method="POST">
                     @csrf
                     <input type="hidden" name="service_id" value="1">

                     <div id="faq_wrapper">
                         <div class="faq_item position-relative">
                             <div class="row">
                                 <div class="col-md-5 mb-4">
                                     <label class="form-label">Question</label>
                                     <input type="text" name="question[]" class="form-control"
                                         placeholder="Enter FAQ question" required>
                                 </div>
                                 <div class="col-md-6 mb-4">
                                     <label class="form-label">Answer</label>
                                     <textarea name="answer[]" class="form-control" placeholder="Enter answer" style="height: 55px;" required></textarea>
                                 </div>
                                 <div class="col-md-1 mt-4">
                                     <button type="button" class="btn btn-danger btn-sm remove_faq">
                                         <i class="fa fa-trash"></i>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="d-flex justify-content-between align-items-center mt-3">
                         <button type="button" id="addFaq" class="btn btn-primary">+ Add More FAQ</button>

                         <button type="submit" class="save_btn" style="margin-top: 0;">
                             <i class="fa fa-plus-circle me-1"></i> Confirm Add FAQ
                         </button>
                     </div>
                 </form>
             </div>
         </div>

     </div>
     <script>
         document.getElementById('addBenefit').addEventListener('click', function() {

             let wrapper = document.getElementById('benefit_wrapper');

             let firstItem = wrapper.querySelector('.benefit_item');

             let newItem = firstItem.cloneNode(true);

             // input clear
             newItem.querySelectorAll('input, textarea').forEach(function(el) {
                 el.value = '';
             });

             wrapper.appendChild(newItem);

         });
         document.getElementById('benefit_wrapper').addEventListener('click', function(e) {
             if (e.target.classList.contains('remove_benefit') || e.target.parentElement.classList.contains(
                     'remove_benefit')) {
                 let items = document.querySelectorAll('.benefit_item');

                 // কমপক্ষে একটা আইটেম যেন থাকে
                 if (items.length > 1) {
                     // ক্লিক করা বাটনের সবচেয়ে কাছের .benefit_item ডিলিট করা
                     e.target.closest('.benefit_item').remove();
                 } else {
                     alert('মামা, অন্তত একটা বেনিফিট তো রাখতে হবে!');
                 }
             }
         });
     </script>
     <script>
         document.getElementById('addFaq').addEventListener('click', function() {

             let wrapper = document.getElementById('faq_wrapper');

             let firstItem = wrapper.querySelector('.faq_item');

             let newItem = firstItem.cloneNode(true);

             // clear inputs
             newItem.querySelectorAll('input, textarea').forEach(function(el) {
                 el.value = '';
             });

             wrapper.appendChild(newItem);

         });

         // FAQ এর অতিরিক্ত রো ডিলিট করার কোড
         document.getElementById('faq_wrapper').addEventListener('click', function(e) {
             // চেক করা হচ্ছে ক্লিক কি ডিলিট বাটনে পড়েছে কি না
             if (e.target.classList.contains('remove_faq') || e.target.parentElement.classList.contains(
                 'remove_faq')) {

                 let items = document.querySelectorAll('.faq_item');

                 // কমপক্ষে একটা রো রাখতে হবে, নাহলে পরে আর অ্যাড করা যাবে না
                 if (items.length > 1) {
                     e.target.closest('.faq_item').remove();
                 } else {
                     alert('মামা, অন্তত একটা FAQ তো রাখতে হবে! সব ডিলিট করলে নতুন করে যোগ করবেন কিভাবে?');
                 }
             }
         });
     </script>
 @endsection
