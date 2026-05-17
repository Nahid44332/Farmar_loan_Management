@extends('frontend.master')

@section('contant')
    <style>
/* ================= COMMON STYLES ================= */
.section_padding {
   padding: 80px 0;
}

.main_title {
   font-size: 36px;
   font-weight: 700;
   color: #333;
   margin-bottom: 40px;
   text-align: center;
}

.main_title span {
   color: #85A900;
}

/* ================= NAVBAR ================= */
/* নেভিবার মেইন স্টাইল */
.custom-navbar {
    width: 100%;
    background-image: url('{{asset("frontend/images/rice.avif")}}');
    background-size: cover;
    background-position: center;
    padding: 12px 0;
    position: relative;
    z-index: 1000;
}

/* ব্যাকগ্রাউন্ড ঘোলাটে কালো করা (Overlay) */
.custom-navbar::before {
    content: "";
    position: absolute;
    inset: 0;

    z-index: -1;
}

/* লোগো সাইজ */
.logo img {
    max-height: 50px;
    width: auto;
}

/* মেনু লিঙ্কের স্টাইল */
.navbar-nav .nav-link {
    color: #ffffff !important;
    margin: 0 8px;
    font-weight: 500;
    transition: 0.3s;
}

/* একটিভ মেনু স্টাইল */
.active-menu {
    background: #ffffff;
    color: #85A900 !important;
    padding: 6px 18px !important;
    border-radius: 5px;
}

/* মোবাইল রেসপন্সিভ ফিক্স */
@media (max-width: 991px) {
    .navbar-brand {
        margin-right: 0;
    }
    @media (max-width: 991px) {
    .navbar-nav {
        background: none !important;
        padding: 10px;
        border-radius: 10px;
    }
}
    .navbar-toggler {
        border: 1px solid #fff;
        padding: 5px;
    }

    /* টগলার আইকন সাদা করা */
    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E") !important;
    }

    /* মোবাইলে মেনু ওপেন হলে স্টাইল */
    .navbar-collapse {
 
        margin-top: 15px;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
    }

    .navbar-nav .nav-link {
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        padding: 10px 0 !important;
        margin: 0;
    }

    .dropdown-menu {
       
        border: none;
    }

    .dropdown-item {
     
        text-align: center;
    }
}
/* কন্টেইনারের দুই পাশে স্পেস দেওয়ার জন্য */
.custom-navbar .container {
    padding-right: 20px !important;
    padding-left: 20px !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* লোগোকে বাম দিক থেকে একটু সরিয়ে দেওয়ার জন্য */
.navbar-brand {
    margin-left: 10px;
}

/* টগলার বাটনকে ডান দিক থেকে একটু সরিয়ে দেওয়ার জন্য */
.navbar-toggler {
    margin-right: 10px;
}

/* মোবাইলে মেনু ড্রপডাউন ওপেন হলে যেন দুই পাশে লেগে না থাকে */
@media (max-width: 991px) {
    .navbar-collapse {
        margin-left: 10px;
        margin-right: 10px;
    }
}

/* ================= ABOUT SECTION ================= */
.about_content_box {
   padding: 20px;
   margin-top: 120px !important;
}

.about_text {
   font-size: 18px;
   line-height: 1.8;
   color: #555;
}

/* images */
.img-fluid.shadow {
   margin-top: 120px !important;
   border: 5px solid #fff;
   transition: transform 0.3s ease;
}

.img-fluid.shadow:hover {
   transform: scale(1.05);
}

/* ================= SERVICE SECTION ================= */
.service_card {
   padding: 30px;
   text-align: center;
   border: 1px solid #eee;
   border-radius: 10px;
   background: #fff;
   box-shadow: 0 4px 15px rgba(0,0,0,0.05);
   transition: 0.3s;
   margin-bottom: 30px;
}

.service_card:hover {
   box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.service_card img {
   width: 70px;
   margin-bottom: 20px;
}

/* button */
.btn_service {
   display: inline-block;
   margin-top: 15px;
   padding: 10px 25px;
   background-color: transparent;
   color: #85A900;
   border: 2px solid #85A900;
   border-radius: 5px;
   font-size: 14px;
   font-weight: 600;
   text-decoration: none;
   transition: all 0.3s ease;
}

.btn_service:hover {
   background-color: #85A900;
   color: #fff;
   transform: translateY(-2px);
   box-shadow: 0 5px 15px rgba(133,169,0,0.3);
}

/* ================= TEAM ================= */
.team_member {
   text-align: center;
   margin-bottom: 30px;
}

.team_img {
   width: 200px;
   height: 200px;
   border-radius: 50%;
   object-fit: cover;
   border: 5px solid #85A900;
   margin-bottom: 15px;
}

/* ================= ACHIEVEMENT ================= */
.achievement_bg {
   background: #2D393B;
   color: #fff;
   padding: 60px 0;
}

.counter_box h2 {
   font-size: 45px;
   font-weight: 700;
   color: #85A900;
}

/* ================= WHY CHOOSE US ================= */
.why_box {
   display: flex;
   align-items: flex-start;
   margin-bottom: 20px;
}

.why_icon {
   background: #85A900;
   color: #fff;
   padding: 10px;
   border-radius: 50%;
   margin-right: 15px;
}

/* ================= TESTIMONIAL ================= */
.testi_card {
   background: #f9f9f9;
   padding: 30px;
   border-radius: 15px;
   font-style: italic;
   position: relative;
}

.testi_card::before {
   content: "\f10d";
   font-family: FontAwesome;
   position: absolute;
   top: 10px;
   left: 10px;
   color: #ddd;
   font-size: 25px;
}

/* ================= CTA ================= */
.cta_section {
   background: #85A900;
   color: #fff;
   text-align: center;
   padding: 60px 0;
}

.btn_white {
   background: #fff;
   color: #85A900;
   padding: 12px 35px;
   border-radius: 30px;
   font-weight: 700;
   text-decoration: none;
   display: inline-block;
   margin-top: 20px;
   transition: 0.3s;
}

.btn_white:hover {
   background: #333;
   color: #fff;
}

/* ================= MOBILE RESPONSIVE ================= */
@media (max-width: 768px) {

   /* navbar */
   .navbar-nav {
      padding: 15px;
      border-radius: 10px;
      text-align: center;
   }

   .navbar-nav .nav-link {
      display: block;
      padding: 10px;
   }

   .navbar-toggler {
      border: 1px solid #fff;
   }

   .navbar-toggler-icon {
      filter: invert(1);
   }

   /* header */
   .header_section {
      padding: 10px 0;
      text-align: center;
   }

   /* typography */
   .main_title {
      font-size: 24px;
      text-align: center !important;
   }

   /* about */
   .about_content_box {
      margin-top: 20px !important;
      padding: 10px;
      text-align: center;
   }

   .about_text {
      font-size: 16px;
      line-height: 1.6;
   }

   /* image */
   .img-fluid.shadow {
      margin-top: 20px !important;
      width: 100% !important;
   }

   /* layout */
   .row {
      text-align: center;
   }

   .col-md-6 {
      margin-bottom: 30px;
   }

   /* service */
   .service_card {
      padding: 20px;
   }

   /* team */
   .team_img {
      width: 150px;
      height: 150px;
   }

   /* counter */
   .counter_box h2 {
      font-size: 30px;
   }

   /* why */
   .why_box {
      flex-direction: column;
      align-items: center;
      text-align: center;
   }

   .why_icon {
      margin-bottom: 10px;
   }

   /* testimonial */
   .testi_card {
      padding: 20px;
   }

   /* CTA */
   .cta_section {
      padding: 40px 15px;
   }

   .btn_white {
      padding: 10px 25px;
      font-size: 14px;
   }

   /* footer */
   .footer_section_2 .row {
      text-align: center;
   }

   .location_text,
   .social_icon ul {
      justify-content: center;
   }

   /* section spacing */
   .section_padding {
      padding: 40px 15px;
   }
}
/* PERFECT CIRCLE IMAGE */

.circle_image{
    width:420px;
    height:420px;
    border-radius:50%;
    object-fit:cover;
    object-position:center;
    border:8px solid #ffffff;
    box-shadow:
        0 15px 40px rgba(0,0,0,0.12),
        0 8px 20px rgba(16,185,129,0.15);
    transition:0.4s ease;
    background:#f8fafc;
}

.circle_image:hover{
    transform:scale(1.03);
}

/* Tablet */
@media(max-width:991px){

    .circle_image{
        width:320px;
        height:320px;
    }

}

/* Mobile */
@media(max-width:576px){

    .circle_image{
        width:240px;
        height:240px;
    }

}
.mission-img{
    width: 450px !important;      /* চাইলে বাড়াও/কমাও */
    height: 550px !important;     /* square রাখার জন্য */
    object-fit: cover; /* image কাটবে কিন্তু সুন্দরভাবে ফিট হবে */
    border-radius: 15px; /* গোল না চাইলে এটা কম/0 করে দাও */
}

.mission-img{
    width: 100%;
    max-width: 350px;
    height: 300px;
    object-fit: cover;
    border-radius: 12px;
}

.cta_section {
    background-color: #83b100; /* স্ক্রিনশটের সেই নির্দিষ্ট সবুজ কালার */
    padding: 80px 0;
    text-align: center;
    color: #1a1a1a; /* টেক্সট কালার কিছুটা ডার্ক */
}

.cta_section h2 {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #000;
}

.cta_section p {
    font-size: 18px;
    margin-bottom: 35px;
    color: #333;
}

.btn_white_custom {
    background-color: #ffffff;
    color: #83b100; /* বাটনের লেখা সবুজ */
    padding: 12px 45px;
    border-radius: 50px; /* পিল শেপ বাটন */
    text-decoration: none;
    font-weight: bold;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
    border: none;
}

.btn_white_custom:hover {
    background-color: #f8f9fa;
    color: #6a8f00;
    transform: translateY(-2px);
}
</style>

   <!-- about section start -->
<section class="section_padding bg-light">
   <div class="container">

      <!-- WHO WE ARE -->
      <div class="row align-items-center mb-5">

         <div class="col-md-6">

            <div class="about_content_box">

               <h2 class="main_title text-left" style="text-align:left;">
                  {{ $whoWeAre->title ?? '' }}
               </h2>

               <p class="about_text">
                  {{ $whoWeAre->description ?? '' }}
               </p>

            </div>

         </div>
<div class="col-md-6 text-center">

    <img src="{{ asset($whoWeAre->image ?? '') }}"
         class="circle_image"
         alt="Whoweare">

</div>
        

      </div>

      <hr style="margin:50px 0; border-top:1px dashed #ccc;">

      <!-- MISSION -->
      <div class="row align-items-center mb-5 flex-md-row-reverse">

         <div class="col-md-6">

            <div class="about_content_box">

               <h2 class="main_title text-left" style="text-align:left;">
                  {{ $mission->title ?? '' }}
               </h2>

               <p class="about_text">
                  {{ $mission->description ?? '' }}
               </p>

            </div>

         </div>

        <div class="col-md-6 text-center">

    <div class="col-md-6 text-center">
    <img src="{{ asset($mission->image ?? '') }}" class="mission-img img-fluid shadow">
</div>

</div>

      </div>

      <hr style="margin:50px 0; border-top:1px dashed #ccc;">

      <!-- FUTURE PLAN -->
      <div class="row align-items-center">

         <div class="col-md-6">

            <div class="about_content_box">

               <h2 class="main_title text-left" style="text-align:left;">
                  {{ $futurePlan->title ?? '' }}
               </h2>

               <p class="about_text">
                  {{ $futurePlan->description ?? '' }}
               </p>

            </div>

         </div>
<div class="col-md-6 text-center">

    <img src="{{ asset($futurePlan->image ?? '') }}"
         class="circle_image"
         alt="Feature">

</div>
         

      </div>

   </div>
</section>
   <!-- 4: What We Do / Services -->
<section class="section_padding">
    <div class="container">
        <h2 class="main_title">আমরা কী <span>সেবা দিই</span></h2>
        <div class="row">
            
            @if($sebas->count() > 0)
                @foreach($sebas as $seba)
                <div class="col-md-4 mb-4">
                    <div class="service_card">
                        <img src="{{ asset('sebas/' . $seba->image) }}" alt="{{ $seba->title }}">
                        
                        <h4>{{ $seba->title }}</h4>
                        <p>{{ Str::limit($seba->description, 100) }}</p>
                        
                        <a href="{{ $seba->button_link ?? '#' }}" class="btn_service">
                            বিস্তারিত দেখুন
                        </a>
                    </div>
                </div>
                @endforeach
            @else
                <p class="text-center">আপাতত কোনো সেবা পাওয়া যায়নি।</p>
            @endif

        </div>
    </div>
</section>

   <!-- 5: Team Section -->
  <section class="section_padding bg-light text-center">
    <div class="container">
        <h2 class="main_title">আমাদের <span>টিম</span></h2>
        <div class="row mt-5">
            @foreach($teams as $member)
            <div class="col-md-4 mb-4">
                <div class="team_member">
                    <img src="{{ asset('backend/images/teams/' . $member->image) }}" class="team_img" alt="{{ $member->name }}">
                    <h4>{{ $member->name }}</h4>
                    <p>{{ $member->designation }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

   <!-- 6: Achievements -->
   <section class="achievement_bg">
    <div class="container text-center">
        <div class="row">
            @foreach($achievements as $item)
            <div class="col-md-3">
                <div class="counter_box">
                    <h2>{{ $item->count_number }}</h2>
                    <p>{{ $item->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

   <!-- 7: Why Choose Us -->
   <section class="section_padding">
    <div class="container">
        @foreach($why_chooses as $item)
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="{{ asset($item->image) }}" class="img-fluid rounded" alt="Why Choose Us">
            </div>
            <div class="col-md-6">
                <h2 class="main_title text-left">কেন আমাদের <span>পছন্দ করবেন?</span></h2>
                
                @php 
                    // JSON ডাটাকে অ্যারেতে রূপান্তর
                    $descriptions = json_decode($item->description); 
                @endphp

                @if(is_array($descriptions))
                    @foreach($descriptions as $line)
                        @if(!empty($line))
                        <div class="why_box">
                            <div class="why_icon"><i class="fa fa-check"></i></div>
                            <p>{{ $line }}</p>
                        </div>
                        @endif
                    @endforeach
                @else
                    {{-- যদি ডাটা JSON না হয়ে সাধারণ টেক্সট হয় --}}
                    <div class="why_box">
                        <div class="why_icon"><i class="fa fa-check"></i></div>
                        <p>{{ $item->description }}</p>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>

   <!-- 8: Testimonial -->
   <section class="section_padding bg-light">
    <div class="container text-center">
        <h2 class="main_title">ক্লায়েন্টদের <span>মতামত</span></h2>
        
        <div class="row mt-4">
            @forelse($testimonials as $testi)
                <div class="col-md-6 mx-auto mb-4">
                    <div class="testi_card" style="background: #fff; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                        <p style="font-style: italic; color: #555;">
                            "{{ $testi->comment }}"
                        </p>
                        <h5 class="mt-3 text-success">
                            - {{ $testi->name }} {{ $testi->designation ? '('.$testi->designation.')' : '' }}
                        </h5>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">আপাতত কোনো মতামত নেই।</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

   <!-- 9: Call to Action -->
@if($cta)
<section class="cta_section mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h2>{{ $cta->title }}</h2>
                <p>{{ $cta->description }}</p>
                <a href="{{ $cta->button_link }}" class="btn_white_custom">
                    {{ $cta->button_text }}
                </a>
            </div>
        </div>
    </div>
</section>
@endif
   <!-- about sectuion end -->
@endsection