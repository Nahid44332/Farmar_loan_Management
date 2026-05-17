@extends('frontend.master')

@section('contant')

<!-- =========================
    BANNER SECTION START
========================= -->
<div class="banner_section">

    <style>
        #myCarousel {
            background-color: #1a1a1a !important; /* ইমেজ লোড হওয়ার সময় বা স্লাইড পরিবর্তনের সময় ব্যাকগ্রাউন্ড কালো থাকবে */
        }
        .carousel-item {
            transition: transform 0.6s ease-in-out, opacity 0.6s ease-in-out !important;
            background: transparent !important;
        }
        .carousel-item-next, .carousel-item-prev, .carousel-item.active {
            display: flex !important; /* বুটস্ট্র্যাপের ফ্ল্যাট লেআউটের ডিসপ্লে গ্যাপ লক করার জন্য */
        }
    </style>

    <section class="slide-wrapper">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">

            {{-- indicators --}}
            <ol class="carousel-indicators">
                @foreach($banners as $index => $banner)
                    <li data-target="#myCarousel"
                        data-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}">
                    </li>
                @endforeach
            </ol>

            <div class="carousel-inner" style="background: #1a1a1a;">

                @foreach($banners as $index => $banner)

                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">

                    <div class="banner_dynamic_area"
                        style="
                            background-image:url('{{ asset('uploads/banners/'.$banner->image) }}');
                            background-size:cover;
                            background-position:center;
                            background-repeat:no-repeat;
                            width:100%;
                            min-height:700px;
                            display:flex;
                            align-items:center;
                            position:relative;
                        ">

                        {{-- overlay --}}
                        <div style="
                            position:absolute;
                            inset:0;
                            background:rgba(0,0,0,0.45);
                        "></div>

                        <div class="container position-relative">

                            <div class="row">
                                <div class="col-lg-7">

                                    <div class="banner_taital_main">

                                        <h1 class="banner_taital text-white">
                                            {{ $banner->title }}
                                        </h1>

                                        <p class="banner_text text-white">
                                            {{ $banner->description }}
                                        </p>

                                        <div class="btn_main">

                                            <div class="started_text">
                                                <a href="{{ $banner->read_more_url }}">
                                                    Read More
                                                </a>
                                            </div>

                                            <div class="started_text active">
                                                <a href="{{ $banner->contact_url }}">
                                                    Contact Us
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </section>

</div>
<!-- =========================
    BANNER SECTION END
========================= -->

<!-- =========================
    YEAR SECTION START
========================= -->
<div class="year_section">
    <div class="container">
        <div class="year_section_2">
            <div class="row">

                @if(isset($counters) && $counters->count() > 0)

                    @foreach($counters as $counter)

                    <div class="col-md-3">

                        <h1 class="year_taital {{ $counter->is_active ? 'active' : '' }}">
                            {{ $counter->number }}
                        </h1>

                        <br>

                        <span class="year_text {{ $counter->is_active ? 'active' : '' }}">
                            {{ $counter->title_line_1 }}
                            <br>
                            {{ $counter->title_line_2 }}
                        </span>

                    </div>

                    @endforeach

                @endif

            </div>
        </div>
    </div>
</div>
<!-- =========================
    YEAR SECTION END
========================= -->

<!-- =========================
    ABOUT SECTION START
========================= -->
<div id="about" style="padding:60px 0;">

    <div class="container">

        <div class="row align-items-center">

            @php
                $whoWeAre = $sections['who_we_are'] ?? null;
            @endphp

            <div class="col-md-6 about-content">

                <h2 class="about-title">

                    @if($whoWeAre && $whoWeAre->title)

                        @php
                            $words = explode(' ', $whoWeAre->title);
                            $firstPart = implode(' ', array_slice($words, 0, 2));
                            $secondPart = implode(' ', array_slice($words, 2));
                        @endphp

                        {{ $firstPart }}
                        <br>
                        <span class="span">{{ $secondPart }}</span>

                    @endif

                </h2>

                <p class="about-text">
                    {{ $whoWeAre->description ?? '' }}
                </p>

                <a href="#" class="btn btn-about">
                    Read More
                </a>

            </div>

            <div class="col-md-6 text-center">

                @php
                    $aboutImage = ($whoWeAre && $whoWeAre->image && file_exists(public_path($whoWeAre->image)))
                        ? asset($whoWeAre->image)
                        : asset('frontend/images/about.png');
                @endphp

                <img src="{{ $aboutImage }}"
                    class="img-fluid"
                    style="
                        width:350px;
                        height:350px;
                        object-fit:cover;
                        border-radius:50%;
                        box-shadow:0 10px 25px rgba(0,0,0,0.1);
                    ">

            </div>

        </div>

    </div>

</div>
<!-- =========================
    ABOUT SECTION END
========================= -->

<!-- =========================
    SERVICES SECTION START
========================= -->
<div class="services_section layout_padding">

    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="services_taital">
                    Our Services
                </h1>
            </div>
        </div>

        <div class="services_section_2">

            <div class="row">

                @foreach($sebas->take(3) as $seba)

                <div class="col-md-4">

                    <div class="box_main {{ $loop->first ? 'active' : '' }}">

                        <div class="service_img">
                            <img src="{{ asset('sebas/'.$seba->image) }}">
                        </div>

                        <h4 class="development_text">
                            {{ $seba->title }}
                        </h4>

                        <p class="services_text">
                            {{ Str::limit($seba->description,120) }}
                        </p>

                        <div class="readmore_bt">
                            <a href="{{ $seba->button_link ?? '#' }}">
                                Read More
                            </a>
                        </div>

                    </div>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>
<!-- =========================
    SERVICES SECTION END
========================= -->

<!-- =========================
    CTA SECTION START
========================= -->
<div class="container">

    <div class="row mt-5">

        <div class="col-12">

            <div class="cta-box">

                <div class="row align-items-center">

                    <div class="col-lg-8">

                        <h3>
                            Transform Your Vision Into Reality
                        </h3>

                        <p>
                            Partner with us to bring your ideas to life
                            with innovative solutions tailored to your needs
                        </p>

                    </div>

                    <div class="col-lg-4 text-lg-end text-center">

                        <a href="/contact" class="cta-btn">
                            Start Your Project
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- =========================
    CTA SECTION END
========================= -->

<!-- =========================
    CLIENT SECTION START
<!-- =========================
    CLIENT SECTION START
========================= -->

<div class="client_section layout_padding">

    <div class="container">

        <div class="row">
            <div class="col-12 text-center">

                <h1 class="client_taital mb-5">
                    Customers Says
                </h1>

            </div>
        </div>

        <div class="row">

            @forelse($testimonials as $item)
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="testimonial_card {{ $loop->iteration == 2 ? 'active_testimonial' : '' }}">

                        <div class="client_img_area">
                            @if($item->image && file_exists(public_path($item->image)))
                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                            @else
                                <img src="{{ asset('frontend/images/client-img.png') }}" alt="{{ $item->name }}">
                            @endif
                        </div>

                        <h3 class="client_name">
                            {{ $item->name }}
                        </h3>

                        <p class="client_designation">
                            {{ $item->designation ?? 'Happy Client' }}
                        </p>

                        <p class="client_review">
                            {{ $item->comment }}
                        </p>

                    </div>

                </div>
            @empty
                <div class="col-12 text-center p-5">
                    <p class="text-muted">No client feedback available at the moment.</p>
                </div>
            @endforelse

        </div>

    </div>

</div>
<!-- =========================
    CLIENT SECTION END
========================= -->


<!-- =========================
    CONTACT SECTION START
========================= -->
<div class="contact_section layout_padding mb-5" id="contact">

    <div class="container">

        <div class="row">

            <div class="col-sm-12">

                <h1 class="contact_taital">
                    Request A Call Back
                </h1>

            </div>

        </div>

    </div>

    <div class="contact_section_2">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="mail_section map_form_container">

                        @if(session('success'))

                        <div style="
                            color:green;
                            background:#e6f4ea;
                            padding:15px;
                            border-radius:10px;
                            margin-bottom:20px;
                            text-align:center;
                        ">
                            {{ session('success') }}
                        </div>

                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">

                            @csrf

                            <div class="row">

                                <div class="col-md-6">
                                    <input type="text"
                                        class="mail_text"
                                        placeholder="Your Name"
                                        name="name"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <input type="email"
                                        class="mail_text"
                                        placeholder="Email"
                                        name="email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text"
                                        class="mail_text"
                                        placeholder="Phone Number"
                                        name="phone"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="massage-bt"
                                        placeholder="Message"
                                        rows="5"
                                        name="message"
                                        required></textarea>
                                </div>

                            </div>

                            <div class="btn_main">

                                <div class="send_bt active">

                                    <button type="submit">
                                        Send
                                    </button>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- =========================
    CONTACT SECTION END
========================= -->

<!-- =========================
    BLOG SECTION START
========================= -->
<div class="blog_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1 class="blog_taital">{{ $work->title ?? 'How We do work' }}</h1>
         </div>
      </div>
      
      @php
         // ডাটাবেজে ব্যাকগ্রাউন্ড ইমেজ আপলোড করা থাকলে সেটি পাবে, অন্যথায় থিমের নিজস্ব এসেট পাবে
         $workBg = ($work && $work->image && file_exists(public_path($work->image))) 
             ? asset($work->image) 
             : asset('frontend/images/blog-img.jpg');
      @endphp

      <div class="blog_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="blog_img" style="background-image: url('{{ $workBg }}'); background-size: cover; background-position: center; min-height: 450px; position: relative; border-radius: 16px; display: flex; align-items: center; justify-content: center; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                  
                  <div class="video_bt" style="cursor: pointer;" data-toggle="modal" data-target="#videoModal">
                     <div class="play_icon">
                        <img src="{{ asset('frontend/images/play-icon.png') }}" alt="Play Button">
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background: #000000; border: none; border-radius: 12px; overflow: hidden;">
            <div class="modal-header" style="border: none; padding: 10px 20px 0 0;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #ffffff; opacity: 0.8; font-size: 28px;" onclick="stopVideo()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" id="youtubeVideo" src="{{ $work->video_url ?? '' }}" allowfullscreen allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =========================
    BLOG SECTION END
========================= -->

@endsection


@section('scripts')

<!-- Owl Carousel CSS -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>

$(document).ready(function(){

    // Bootstrap Banner Carousel
    $('#myCarousel').carousel({
        interval:4000,
        pause:false,
        wrap:true
    });

    // Owl Carousel
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,

        responsive:{
            0:{
                items:1
            },
            768:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

});

</script>
<script>
    function stopVideo() {
        var iframe = document.getElementById('youtubeVideo');
        if (iframe) {
            var iframeSrc = iframe.src;
            iframe.src = iframeSrc; // রিলোড সোর্স দিয়ে ভিডিও অফ করার লজিক
        }
    }
    
    // মডালের বাইরে ক্লিক করে কেটে দিলেও ভিডিও বন্ধ হবে
    $('#videoModal').on('hidden.bs.modal', function () {
        stopVideo();
    });
</script>
@endsection