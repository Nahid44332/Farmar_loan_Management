@extends('frontend.master')
@section('contant')
<style>
         /* =========================
   RESPONSIVE CSS
========================= */
/* ================= BENEFIT CARD MOBILE FIX ================= */

@media (max-width: 768px) {

    .benefit_card {
        margin-bottom: 25px !important;   /* ফাঁকা জায়গা */
        padding: 25px !important;
    }

    .rice_section .row {
        row-gap: 20px; /* নতুন Bootstrap gap fix */
    }

    .col-md-4 {
        margin-bottom: 10px;
    }

    .benefit_card h4 {
        font-size: 18px;
    }

    .benefit_card p {
        font-size: 14px;
        line-height: 1.6;
    }
}
/* Extra small devices (phones) */
@media (max-width: 576px) {

  .header_section {
    padding: 10px 0;
    text-align: center;
  }

  .navbar-nav {
    text-align: center;
  }

  .navbar-nav .nav-item {
    margin: 5px 0;
  }

  .section_title {
    font-size: 24px;
    text-align: center;
  }

  .about_img img,
  .rice_img img,
  .feature_img img {
    margin-top: 20px !important;
  }

  .benefit_card {
    text-align: center;
  }

  .why_us_box,
  .why_us_dark {
    padding: 25px !important;
    text-align: center;
  }

  .privacy_card {
    padding: 20px !important;
  }

  .investor_card {
    padding: 25px !important;
  }

  .cta_section,
  .loan_cta {
    padding: 60px 15px !important;
  }

  .btn_portal,
  .btn_loan,
  .btn_custom {
    width: 100%;
    padding: 12px 20px;
    font-size: 16px;
  }
}


/* Small devices (tablets) */
@media (min-width: 577px) and (max-width: 768px) {

  .section_title {
    font-size: 28px;
    text-align: center;
  }

  .navbar-nav {
    text-align: center;
  }

  .benefit_card {
    margin-bottom: 20px;
  }

  .why_us_box,
  .why_us_dark {
    padding: 35px;
  }

  .privacy_card {
    padding: 30px;
  }

  .cta_section,
  .loan_cta {
    padding: 70px 20px;
  }
}


/* Medium devices (small laptops) */
@media (min-width: 769px) and (max-width: 992px) {

  .section_title {
    font-size: 32px;
  }

  .benefit_card {
    height: auto;
 
  }

  .why_us_box,
  .why_us_dark {
    padding: 45px;
  }

  .investor_card {
    padding: 35px;
  }
}


/* Large devices (desktops) */
@media (min-width: 993px) {

  .container {
    max-width: 1200px;
  }
}
       .header_section {
            background-image: url('/frontend/images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            padding: 15px 0;
            width: 100%;
         }

         /* Section Styling */
         .rice_section { padding: 90px 0; background: #fff;
          }
         .section_title { color: #1a1a1a; font-weight: bold; margin-bottom: 20px; font-size: 36px; }
         .section_title span { color: #85A900; }
         
         .rice_img img { 
            width: 100%;
            margin-top: 120px; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
            transition: 0.4s;
         }
         .rice_img img:hover { transform: scale(1.02); }

         /* Benefit Cards */
         .benefit_card {
            padding: 30px;
            background: #f9f9f9;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #85A900;
            transition: 0.3s;
            height: 100%;
         }
         .benefit_card:hover { background: #fff; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
         .benefit_card i { font-size: 35px; color: #85A900; margin-bottom: 20px; }

         /* Why Us Section */
         .why_us_box { background: #2D393B; color: #fff; padding: 60px; border-radius: 25px; }

         /* FAQ Accordion */
         .faq_section { background: #f8f9fa; padding: 80px 0; }
         .accordion .card { border: none; margin-bottom: 10px; border-radius: 10px !important; }
         .accordion .card-header { background: #fff; border-bottom: none; }
         .accordion .btn-link { color: #2D393B; font-weight: 600; text-decoration: none; width: 100%; text-align: left; }

         /* CTA Button (Investment Style) */
         .cta_section { text-align: center; padding: 100px 0; background: #fdfdfd; }
         .btn_portal {
            background-color: #85A900;
            color: #fff !important;
            padding: 15px 50px;
            border-radius: 35px;
            display: inline-block;
            font-size: 18px;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none !important;
            border: none;
         }
         .btn_portal:hover { background-color: #2D393B; transform: translateY(-3px); }
         .why{
            color: #f8f9fa;
         }
         .rice_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
         .faq_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/services-img.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
         .cta_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/services-img.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}


      </style>


<!-- About Rice Stock Loan -->
      <div class="rice_section">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-md-6">
                  <h1 class="section_title">About <span>Rice Stock Loan</span></h1>
                  <p>ধান বা চাল মজুদ ঋণ হলো কৃষকদের জন্য একটি সময়োপযোগী আর্থিক সমাধান। আমন বা বোরো মৌসুমে যখন বাজারে ধানের সরবরাহ প্রচুর থাকে, তখন দাম কিছুটা কমে যায়। এই সময়ে কৃষকরা তাদের ধান বিক্রি না করে আমাদের অনুমোদিত গুদামে মজুদ রাখতে পারেন এবং তার বিপরীতে তাৎক্ষণিক ঋণ গ্রহণ করতে পারেন।</p>
                  <p>পরবর্তীতে যখন বাজারের দর বৃদ্ধি পায়, তখন মজুদকৃত চাল বা ধান বিক্রি করে কৃষক তার ঋণের টাকা পরিশোধ করতে পারেন এবং কাঙ্ক্ষিত মুনাফা অর্জন করতে পারেন।</p>
               </div>
               <div class="col-md-6">
                  <div class="rice_img">
                     <img src="{{asset('frontend/images/rice.avif')}}" alt="Rice Field"> <!-- এখানে আপনার ধানের ছবি দিন -->
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Benefits of Loan -->
      <div class="rice_section" style="background: #fdfdfd;">
         <div class="container">
            <h2 class="section_title text-center">Benefits of <span>Loan</span></h2>
            <div class="row mt-5">
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-money"></i>
                     <h4>তাৎক্ষণিক অর্থায়ন</h4>
                     <p>ফসল কাটার পর পারিবারিক খরচ বা পরবর্তী চাষাবাদের জন্য টাকার অভাব হবে না।</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-balance-scale"></i>
                     <h4>অন্যায্য দর থেকে মুক্তি</h4>
                     <p>বাজারে সিন্ডিকেটের কবলে পড়ে কম দামে ধান বিক্রি করার বাধ্যবাধকতা থাকবে না।</p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="fa fa-home"></i>
                     <h4>গুদামজাত সুবিধা</h4>
                     <p>আপনার কষ্টের ফসল আমাদের অত্যাধুনিক গুদামে থাকবে সম্পূর্ণ নিরাপদ ও পোকা-মাকড় মুক্ত।</p>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Why Us Section -->
      <div class="rice_section">
         <div class="container">
            <div class="why_us_box">
               <div class="row align-items-center">
                  <div class="col-md-8">
                     <h1 class="why"><b>Why Choose</b> <span><b>Us?</b></span></h1>
                     <p>আমরা সরাসরি কৃষকের সাথে কাজ করি এবং সহজ শর্তে ঋণ প্রদান করি। আমাদের স্বচ্ছ প্রক্রিয়া এবং দ্রুত অর্থ ছাড় কৃষকদের মুখে হাসি ফোটাতে সাহায্য করে। আমরা শুধু আর্থিক সহযোগিতাই করি না, বরং কৃষকদের বাজারের সঠিক তথ্য দিয়েও সহায়তা করি।</p>
                  </div>
                  <div class="col-md-4 text-center">
                     <i class="fa fa-users" style="font-size: 100px; opacity: 0.3;"></i>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- FAQ Section -->
      <div class="faq_section">
         <div class="container">
            <h2 class="section_title text-center">Common <span>Questions</span></h2>
            <div class="accordion mt-5" id="riceFaq">
               <div class="card">
                  <div class="card-header"><button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">১. সর্বোচ্চ কত টাকা ঋণ পাওয়া যাবে?</button></div>
                  <div id="collapseOne" class="collapse show" data-parent="#riceFaq"><div class="card-body">আপনার মজুদকৃত ধানের বর্তমান বাজার মূল্যের ৭০% থেকে ৮০% পর্যন্ত ঋণ প্রদান করা হয়।</div></div>
               </div>
               <div class="card">
                  <div class="card-header"><button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">২. ঋণের মেয়াদ কতদিন?</button></div>
                  <div id="collapseTwo" class="collapse" data-parent="#riceFaq"><div class="card-body">সাধারণত ৩ মাস থেকে ৬ মাস পর্যন্ত এই ঋণ নেওয়া যায়, তবে আলোচনা সাপেক্ষে এটি পরিবর্তনযোগ্য।</div></div>
               </div>
            </div>
         </div>
      </div>

      <!-- Loan Application Button -->
      <div class="cta_section">
         <div class="container">
            <h2>আপনার ধান মজুদ করে আজই আবেদন করুন</h2>
            <p>আমাদের যেকোনো এজেন্টের সাথে যোগাযোগ করতে নিচের বাটনে ক্লিক করুন।</p>
            <a href="client.html" class="btn_portal">Apply for Rice Loan</a>
         </div>
      </div>


    
@endsection