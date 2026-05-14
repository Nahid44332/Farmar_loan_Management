@extends('frontend.master')

@section('contant')
       <style>
      /* =========================
   BASE RESET
========================= */
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
}

img {
   max-width: 100%;
   height: auto;
}

/* =========================
   LARGE DESKTOP (1200px+)
========================= */
@media (min-width: 1200px) {
   .container {
      max-width: 1140px;
      margin: auto;
   }
}

/* =========================
   LAPTOP / SMALL DESKTOP (992px - 1199px)
========================= */
@media (max-width: 1199px) {
   .section_title {
      font-size: 32px;
   }

   .agent_card,
   .choice_box,
   .benefit_card {
      padding: 25px;
   }
}

/* =========================
   TABLET (768px - 991px)
========================= */
@media (max-width: 991px) {

   .navbar-nav {
      text-align: center;
   }

   .header_section {
      text-align: center;
   }

   .section_title {
      font-size: 28px;
   }

   .feature_img {
      margin-top: 30px;
   }

   .agent_card,
   .choice_box {
      margin-bottom: 30px;
   }

   .why_us_dark {
      text-align: center;
      padding: 30px;
   }
}

/* =========================
   MOBILE (576px - 767px)
========================= */
@media (max-width: 767px) {

   .section_title {
      font-size: 24px;
   }

   .btn_custom,
   .btn_portal {
      padding: 12px 25px;
      font-size: 14px;
   }

   .agent_card,
   .choice_box,
   .benefit_card {
      padding: 20px;
   }

   .feature_img img {
      margin-top: 20px;
   }

   .why_us_dark {
      padding: 20px;
   }
}

/* =========================
   SMALL MOBILE (below 576px)
========================= */
@media (max-width: 575px) {

   .section_title {
      font-size: 20px;
      text-align: center;
   }

   p {
      font-size: 14px;
   }

   .navbar-nav li {
      margin: 5px 0;
   }

   .btn_custom,
   .btn_portal {
      width: 100%;
      text-align: center;
   }

   .agent_card,
   .choice_box,
   .benefit_card {
      text-align: center;
   }

   .feature_img img {
      border-radius: 10px;
   }
}
/* =========================
   BENEFIT CARD RESPONSIVE FIX
========================= */

/* Desktop default spacing */
.benefit_card{
   margin-bottom: 25px;
}

/* Tablet + Mobile spacing control */
@media (max-width: 991px){
   .loan_page_section .row{
      row-gap: 25px;
   }

   .benefit_card{
      height: auto;
   }
}

/* Small mobile extra spacing */
@media (max-width: 576px){
   .loan_page_section .row{
      row-gap: 20px;
   }

   .benefit_card{
      padding: 20px;
      text-align: center;
   }
}
         /* Header Section */
         .header_section {
            background-image: url('/frontend/images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            padding: 15px 0;
            width: 100%;
         }

         /* Main Content Styling */
         .loan_page_section { padding: 90px 0; background: #fff; }
         .section_title { color: #1a1a1a; font-weight: bold; margin-bottom: 20px; font-size: 36px; }
         .section_title span { color: #85A900; }
         
         .feature_img img { 
            width: 100%; 
            border-radius: 20px; 
            height: 400px;
           margin-top: 120px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
         }

         /* Benefit Cards */
         .benefit_card {
            padding: 30px;
            background: #fdfdfd;
            border-radius: 15px;
            margin-bottom: 25px;
            border-top: 5px solid #85A900;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: 0.3s;
            height: 100%;
         }
         .benefit_card:hover { transform: translateY(-10px); background: #fff; }
         .benefit_card i { font-size: 40px; color: #85A900; margin-bottom: 20px; }

         /* Why Us Box */
         .why_us_dark { 
            background: #2D393B; 
            color: #fff; 
            padding: 50px; 
            border-radius: 30px; 
            margin: 50px 0;
         }

         /* FAQ Style */
         .faq_box { background: #f8f9fa; padding: 80px 0; }
         .accordion .card { border: none; margin-bottom: 10px; border-radius: 12px !important; overflow: hidden; }
         .accordion .card-header { background: #fff; padding: 15px; }
         .accordion .btn-link { color: #2D393B; font-weight: 700; text-decoration: none; display: block; width: 100%; text-align: left; }

         /* CTA Loan Button */
         .cta_loan { text-align: center; padding: 80px 0; }
         .btn_custom {
            background-color: #85A900;
            color: #fff !important;
            padding: 16px 45px;
            border-radius: 35px;
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            transition: 0.4s;
            box-shadow: 0 10px 20px rgba(133, 169, 0, 0.2);
         }
         .btn_custom:hover { background-color: #2D393B; color: #fff !important; transform: scale(1.05); }
              .loan_page_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/service-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
              .cta_loan {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}

      </style>






<!-- About Cow Buying Loan -->
      <div class="loan_page_section">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-6">
                  <h1 class="section_title">About <span>Cow Buying Loan</span></h1>
                  <p>গরু ক্রয় ঋণ বা ক্যাটল লোন হলো পশু পালনকারীদের জন্য একটি বিশেষ আর্থিক সহায়তা। আপনি যদি দুগ্ধ খামার করতে চান বা কোরবানির ঈদকে সামনে রেখে গরু মোটাতাজাকরণ করতে চান, তবে বড় অংকের মূলধনের প্রয়োজন হয়। আমাদের এই লোন সুবিধা আপনাকে উন্নত জাতের গরু ক্রয় করতে সাহায্য করবে।</p>
                  <p>খামারিদের আর্থিক সক্ষমতা বৃদ্ধি এবং গ্রামীণ অর্থনীতিকে চাঙ্গা করাই আমাদের এই ঋণের প্রধান লক্ষ্য।</p>
               </div>
               <div class="col-md-6">
                  <div class="feature_img">
                     <img src="{{asset('frontend/images/cow.avif')}}" alt="Cow Farming"> <!-- আপনার ইমেজ ফোল্ডারে ছবি যোগ করুন -->
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Benefits -->
      <div class="loan_page_section" style="background: #f9f9f9;">
         <div class="container">
            <h2 class="section_title text-center">Benefits of <span>Cattle Loan</span></h2>
            <div class="row mt-5">
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-truck"></i>
                     <h4>সহজ পরিবহন ও ক্রয়</h4>
                     <p>আপনার পছন্দের হাট থেকে উন্নত জাতের গরু ক্রয়ের জন্য তাৎক্ষণিক অর্থের নিশ্চয়তা।</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-medkit"></i>
                     <h4>চিকিৎসা ও খাদ্য সহায়তা</h4>
                     <p>লোনের পাশাপাশি আমরা পশু চিকিৎসকের পরামর্শ এবং উন্নত মানের গো-খাদ্য ক্রয়ে সহায়তা করি।</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-refresh"></i>
                     <h4>সহজ কিস্তি</h4>
                     <p>দুগ্ধ উৎপাদন বা গরু বিক্রির সময়ের সাথে সামঞ্জস্য রেখে সহজ কিস্তিতে পরিশোধের সুযোগ।</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Why Us Section -->
      <div class="container">
         <div class="why_us_dark">
            <div class="row align-items-center">
               <div class="col-md-9">
                  <h2 class="text-white">Why Choose <span>Our Support?</span></h2>
                  <p>আমরা কেবল ঋণ দিই না, বরং একজন খামারিকে সফল উদ্যোক্তা হিসেবে গড়ে তুলতে শুরু থেকে শেষ পর্যন্ত পাশে থাকি। আমাদের লোনের প্রসেসিং অত্যন্ত দ্রুত এবং লুকানো কোনো চার্জ নেই।</p>
               </div>
               <div class="col-md-3 text-right">
                  <i class="fa fa-thumbs-up" style="font-size: 80px; color: #85A900;"></i>
               </div>
            </div>
         </div>
      </div>

      <!-- FAQ Section -->
      <div class="faq_box">
         <div class="container">
            <h2 class="section_title text-center">Questions & <span>Answers</span></h2>
            <div class="accordion mt-5" id="cowFaq">
               <div class="card">
                  <div class="card-header"><button class="btn btn-link" data-toggle="collapse" data-target="#q1">১. ঋণের জন্য জামানত কী লাগবে?</button></div>
                  <div id="q1" class="collapse show" data-parent="#cowFaq"><div class="card-body">ক্রয়কৃত পশুই ঋণের প্রাথমিক জামানত হিসেবে বিবেচিত হবে। সাথে ব্যক্তিগত গ্যারান্টার প্রয়োজন।</div></div>
               </div>
               <div class="card">
                  <div class="card-header"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#q2">২. ঋণের টাকা পেতে কতদিন সময় লাগে?</button></div>
                  <div id="q2" class="collapse" data-parent="#cowFaq"><div class="card-body">কাগজপত্র জমা দেওয়ার ৩ থেকে ৫ কার্যদিবসের মধ্যে ঋণ অনুমোদন করা হয়।</div></div>
               </div>
            </div>
         </div>
      </div>

      <!-- Final Action -->
      <div class="cta_loan">
         <div class="container">
            <h2>আপনার খামার শুরু করার এটাই সঠিক সময়!</h2>
            <p>আবেদন করতে এবং বিস্তারিত জানতে আমাদের এজেন্টের সাথে যোগাযোগ করুন।</p>
            <a href="client.html" class="btn_custom">Talk to an Agent for Loan</a>
         </div>
      </div>
@endsection