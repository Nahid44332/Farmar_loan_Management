@extends('frontend.master')

@section('contant')
     <style>
      /* =========================
   RESPONSIVE CSS START
========================= */

/* Large devices (laptops/desktops) */
@media (max-width: 1200px) {
    .section_title {
        font-size: 32px;
    }

    .benefit_card {
        padding: 25px;
    }
}

/* Medium devices (tablets) */
@media (max-width: 992px) {
    .section_title {
        font-size: 28px;
        text-align: center;
    }

    .maize_section {
        padding: 60px 0;
    }

    .about_img {
        margin-top: 30px;
    }

    .maize {
        margin-top: 0;
        text-align: center;
    }

    .benefit_card {
        text-align: center;
    }
}

/* Small devices (mobile phones) */
@media (max-width: 768px) {
    .section_title {
        font-size: 24px;
    }

    .maize_section {
        padding: 40px 0;
    }

    .about_img img {
        border-radius: 15px;
    }

    .benefit_card {
        padding: 20px;
        margin-bottom: 15px;
    }

    .loan_cta h1 {
        font-size: 26px;
    }

    .btn_loan {
        padding: 12px 30px;
        font-size: 16px;
    }
}

/* Extra small devices (small phones) */
@media (max-width: 576px) {
    .section_title {
        font-size: 20px;
    }

    .maize_section {
        padding: 30px 0;
    }

    .benefit_card i {
        font-size: 24px;
    }

    .card-header button {
        font-size: 14px;
    }

    .loan_cta {
        padding: 60px 15px;
    }

    .btn_loan {
        width: 100%;
        text-align: center;
    }
}

/* =========================
   RESPONSIVE CSS END
========================= */
         .header_section {
            background-image: url('/frontend/images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            padding: 15px 0;
            width: 100%;
         }
         .maize_section { padding: 90px 0; background: #fff; }
         .about_img img { width: 100%; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
         .section_title { color: #1a1a1a; font-weight: bold; margin-bottom: 20px; font-size: 36px; }
         .section_title span { color: #85A900; }
         
         /* Benefit Cards */
         .benefit_card {
            padding: 30px;
            background: #f9f9f9;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #85A900;
            transition: 0.3s;
         }
         .benefit_card:hover { transform: scale(1.02); background: #fff; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
         .benefit_card i { font-size: 30px; color: #85A900; margin-bottom: 15px; }

         /* FAQ Accordion */
         .faq_section { background: #f4f4f4; padding: 80px 0; }
         .card-header { background: #fff !important; border: none; margin-bottom: 10px; border-radius: 10px !important; }
         .card-header button { color: #2D393B; font-weight: 600; text-decoration: none !important; width: 100%; text-align: left; }
         
         /* Loan CTA Button */
         .loan_cta {
            background: #2D393B;
            color: #fff;
            padding: 100px 0;
            text-align: center;
         }
         .btn_loan {
            background-color: #85A900;
            color: #fff !important;
            padding: 15px 50px;
            border-radius: 35px;
            display: inline-block;
            font-size: 20px;
            font-weight: bold;
            margin-top: 30px;
            transition: 0.3s;
         }
         .btn_loan:hover { background: #fff; color: #85A900 !important; transform: translateY(-5px); }
         /* --- About Maize Image Styling --- */
.about_img {
   width: 100%;
   height: auto;
   display: flex;
   justify-content: center;
   align-items: center;
   overflow: hidden; /* ইমেজের বাড়তি অংশ কেটে যাবে না */
   border-radius: 20px; /* আপনার কার্ডের সাথে মিলিয়ে রাউন্ড শেপ */
   box-shadow: 0 10px 30px rgba(0,0,0,0.1); /* হালকা শ্যাডো যাতে ইমেজটি ফুটে ওঠে */
   margin-top: 120px;
}

.about_img img {
   max-width: 100%; /* কন্টেইনারের বাইরে যাবে না */
   height: 300px !important;
   display: block; /* নিচের এক্সট্রা স্পেস দূর করবে */
   object-fit: cover; /* ইমেজটিকে সুন্দরভাবে ফিট করবে */
   transition: transform 0.5s ease; /* হোভার ইফেক্টের জন্য */
   
}

/* ইমেজের ওপর মাউস নিলে হালকা জুম হবে */
.about_img img:hover {
   transform: scale(1.05);
}
.maize {
   margin-top: 120px;
}
.maize_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
.faq_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('frontend/images/service-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}

@media (max-width: 768px){

    .maize{
        margin-top: 0;
        text-align: center;
    }

    .about_img{
        margin-top: 30px;
    }

    .about_img img{
        height: auto !important;
    }

}

      </style>



      <!-- About Maize Section -->
      <div class="maize_section">
         <div class="container">
            <div class="row">
               <div class="col-md-6 maize">
                  <h1 class="section_title"><span>{{ $maize->name }}</span></h1>
                  <p>{{$maize->desc_one}}</p>
                  <p>{{$maize->desc_two}}</p>
               </div>
               <div class="col-md-6">
                  <div class="about_img"><img src="{{asset($maize->image)}}" alt="Maize"></div>
               </div>
            </div>
         </div>
      </div>

      <!-- Why Us / Benefits -->
      <div class="maize_section" style="background: #fdfdfd;">
         <div class="container">
            <h2 class="section_title text-center">Benefits of <span>Loan</span></h2>
            <div class="row mt-5">
               @foreach ($maize->benefits as $benefit)
                  <div class="col-md-4">
                  <div class="benefit_card">
                     <i class="{{$benefit->icon}}"></i>
                     <h4>{{$benefit->title}}</h4>
                     <p>{{$benefit->description}}</p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>

      <!-- FAQ Section -->
      <div class="faq_section">
         <div class="container">
            <h2 class="section_title text-center">Frequently Asked <span>Questions</span></h2>
            <div class="accordion mt-5" id="loanFaq">
               @foreach($maize->faqs as $key => $faq)
    <div class="card">
        <div class="card-header">
            <button class="btn btn-link" data-toggle="collapse" data-target="#q{{ $faq->id }}">
                {{ $key+1 }}. {{ $faq->question }}
            </button>
        </div>
        <div id="q{{ $faq->id }}" class="collapse">
            <div class="card-body">{{ $faq->answer }}</div>
        </div>
    </div>
@endforeach
            </div>
         </div>
      </div>

      <!-- Loan Action Section -->
      <div class="loan_cta mb-5">
         <div class="container">
            <h1 class="text-white">আপনার ভুট্টা মজুদ করে আজই ঋণ নিন!</h1>
            <p class="text-white">আবেদন করতে আমাদের এজেন্ট পোর্টালের মাধ্যমে যোগাযোগ করুন।</p>
            <a href="{{url('/farmer')}}" class="btn_loan">Apply for Loan via Agent</a>
         </div>
      </div>
@endsection