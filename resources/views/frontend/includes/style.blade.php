 <title>Green Scape</title>
 <meta name="keywords" content="">
 <meta name="description" content="">
 <meta name="author" content="">
 <!-- bootstrap css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.min.css') }}">
 <!-- style css -->
 <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}">
 <!-- Responsive-->
 <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
 <!-- fevicon -->
 <link rel="icon" href="{{ asset('frontend/images/fevicon.png') }}" type="image/gif" />
 <!-- Scrollbar Custom CSS -->
 <link rel="stylesheet" href="{{ asset('frontend/css/jquery.mCustomScrollbar.min.css') }}">
 <!-- Tweaks for older IEs-->
 <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <!-- fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
 <!-- owl stylesheets -->
 <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
     rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
 <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <style>
     .about_img img {
         display: block !important;
         width: 100% !important;
         height: 70px !important;
     }

     .about {
         background: #fff;
         position: relative;
         z-index: 1;
     }

     /* CTA Section Styling */
     .cta-box {
         background-color: #2D393B;
         /* আপনার দেওয়া স্পেসিফিক কালার */
         padding: 60px 50px;
         border-radius: 20px;
         /* রাউন্ডেড কর্নার */
         box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
         /* হালকা শ্যাডো */
         margin: 40px 0;
         border: 1px solid rgba(255, 255, 255, 0.05);
         /* হালকা বর্ডার লুক */
     }

     /* টেক্সট এলাইনমেন্ট এবং কালার */
     .cta-box h3 {
         color: #ffffff;
         font-size: 32px;
         font-weight: 700;
         margin-bottom: 15px;
         line-height: 1.3;
     }

     .cta-box p {
         color: #cbd5e0;
         /* হালকা গ্রে-সাদা টেক্সট যাতে পড়তে সুবিধা হয় */
         font-size: 18px;
         margin-bottom: 0;
         opacity: 0.9;
     }

     /* বাটন ডিজাইন */
     .cta-btn {
         display: inline-block;
         background-color: #ffffff;
         color: #2D393B !important;
         /* বাটনের টেক্সট কালার বক্সের কালারের সাথে মিল রেখে */
         padding: 14px 35px;
         border-radius: 50px;
         font-weight: 600;
         text-decoration: none;
         transition: all 0.3s ease;
         border: 2px solid transparent;
     }

     /* বাটনের হোভার ইফেক্ট */
     .cta-btn:hover {
         background-color: transparent;
         color: #ffffff !important;
         border-color: #ffffff;
         transform: translateY(-3px);
         /* হালকা উপরে উঠবে */
     }

     /* মোবাইল ভার্সনের জন্য এডজাস্টমেন্ট */
     @media (max-width: 991px) {
         .cta-box {
             text-align: center;
             padding: 40px 30px;
         }

         .cta-box h3 {
             font-size: 26px;
         }

         .cta-btn {
             margin-top: 30px;
         }
     }

     /* About Section Styles */
     .about-content {
         padding: 20px;
     }

     .span {
         color: #85A900 !important;
     }

     /* টাইটেল ডিজাইন */
     .about-title {
         font-size: 36px;
         font-weight: 700;
         line-height: 1.2;
         color: #333;
         /* গাঢ় কালার */
         margin-bottom: 25px;
     }

     .about-title span {
         color: #85A900;
         /* Farm and Company এর জন্য সবুজ কালার */
         display: block;
         margin-top: 5px;
     }

     /* টেক্সট বা প্যারাগ্রাফ ডিজাইন */
     .about-text {
         font-size: 18px;
         line-height: 1.8;
         color: #666;
         /* হালকা ধূসর কালার যা চোখের জন্য আরামদায়ক */
         margin-bottom: 30px;
         max-width: 500px;
         /* যাতে লেখাগুলো খুব বেশি ছড়িয়ে না যায় */
     }

     /* কাস্টম বাটন ডিজাইন */
     .btn-about {
         background-color: #85A900;
         color: #fff;
         padding: 12px 30px;
         font-size: 16px;
         font-weight: 600;
         border-radius: 5px;
         text-decoration: none;
         display: inline-block;
         transition: all 0.3s ease;
         border: none;
     }

     .btn-about:hover {
         background-color: #218838;
         /* হোভার করলে একটু গাঢ় হবে */
         color: #fff;
         transform: translateY(-2px);
         /* হালকা উপরে উঠবে */
         box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
     }

     /* মোবাইলের জন্য ছোট ফন্ট */
     @media (max-width: 768px) {
         .about-title {
             font-size: 28px;
         }

         .about-text {
             font-size: 16px;
         }
     }

     /* মেইন সেকশন */
     .client_section {
         padding: 100px 0;
         background: #fdfdfd;
     }

     .client_taital {
         text-align: center;
         font-size: 42px;
         font-weight: 800;
         color: #2D393B;
         letter-spacing: 1px;
         margin-bottom: 80px;
         text-transform: uppercase;
     }

     /* ইউনিক কার্ড ডিজাইন */
     .client_box {
         background: #ffffff;
         padding: 50px 30px 40px 30px;
         border-radius: 40px 10px 40px 10px;
         /* অসমান রাউন্ডেড কর্নার - খুব ইউনিক লাগে */
         text-align: center;
         margin: 60px 15px 30px 15px;
         position: relative;
         border: 1px solid rgba(45, 57, 59, 0.1);
         transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
     }

     /* কার্ডের পেছনে একটি ইনভিজিবল এলিমেন্ট যা হোভার করলে বের হবে */
     .client_box::before {
         content: "";
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: #85A900;
         border-radius: 40px 10px 40px 10px;
         z-index: -1;
         transition: all 0.4s ease;
         transform: rotate(0deg);
     }

     .client_box:hover::before {
         transform: rotate(5deg);
         /* হোভার করলে পেছনে একটা কালারড শেপ বের হবে */
     }

     .client_box:hover {
         border-color: #85A900;
     }

     /* ইমেজ ডিজাইন */
     .client_img {
         width: 110px;
         height: 110px;
         margin: 0 auto;
         position: absolute;
         top: -55px;
         left: 0;
         right: 0;
         z-index: 2;
     }

     .client_img img {
         width: 100%;
         height: 100%;
         border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
         /* ইউনিক ইমেজ শেপ (Blob style) */
         border: 4px solid #ffffff;
         box-shadow: 0 10px 20px rgba(45, 57, 59, 0.2);
         object-fit: cover;
         background: #fff;
     }

     /* টেক্সট ডিজাইন */
     .looking_text {
         font-size: 24px;
         font-weight: 700;
         color: #2D393B;
         margin-top: 30px;
     }

     /* কোটেশন আইকন (ইউনিকনেস বাড়াবে) */
     .client_box::after {
         content: "“";
         position: absolute;
         bottom: 10px;
         right: 30px;
         font-size: 80px;
         color: rgba(45, 57, 59, 0.05);
         font-family: serif;
     }

     .dummy_text {
         font-size: 16px;
         color: #555;
         line-height: 1.8;
         font-style: italic;
         /* রিভিউগুলো ইটালিক হলে বেশি সুন্দর লাগে */
         margin-top: 15px;
     }

     .blog_img {
         /* আপনার নতুন ছবির পাথ এখানে দিন */
         background-image: url('/frontend/images/banner-bg.png');

         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         height: 500px;
         /* আপনার প্রয়োজন অনুযায়ী হাইট দিন */
         width: 100%;
         display: flex;
         align-items: center;
         justify-content: center;
         border-radius: 20px;
         /* ইমেজটি রাউন্ডেড করার জন্য */
         position: relative;
         overflow: hidden;
     }

     /* প্লে বাটন ডিজাইন */
     .play_icon img {
         width: 80px;
         /* প্লে আইকনের সাইজ */
         transition: transform 0.3s ease;
         cursor: pointer;
     }

     .play_icon:hover img {
         transform: scale(1.1);
         /* হোভার করলে একটু বড় হবে */
     }

     /* --- ১. ব্যানার সেকশন ঠিক করার জন্য --- */
     .banner_section {
         background-image: url("/frontend/images/banner - Copy.jpg");
         /* আপনার ছবির নাম ঠিক করে দিন */
         background-size: cover;
         background-position: center;
         padding: 120px 0 150px 0;
         min-height: 20vh;
     }

     /* --- ২. CTA বক্স (আপনার পছন্দের ডার্ক কালার #2D393B) --- */
     .custom-cta-box {
         background-color: #2D393B !important;
         padding: 40px 50px;
         border-radius: 20px;
         margin: 50px 0;
         color: #ffffff;
         display: flex;
         align-items: center;
         justify-content: space-between;
     }

     /* --- ৩. About সেকশন ঠিক করার জন্য --- */
     .about-title {
         font-size: 38px;
         font-weight: 700;
         line-height: 1.2;
         color: #2D393B !important;
     }

     .about-title span {
         color: #28a745;
         /* সবুজ অংশ */
     }

     /* --- ৪. ক্লায়েন্ট/রিভিউ সেকশন ঠিক করার জন্য --- */
     .client_box_new {
         background: #ffffff;
         padding: 40px 25px;
         border-radius: 15px;
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
         border-bottom: 4px solid #2D393B;
         margin-top: 60px;
         text-align: center;
     }

     .custom-navbar {
         /* আপনার নতুন ইমেজের পাথ এখানে দিন */
         background-image: url('/frontend/images/banner.jpg') !important;

         background-size: cover;
         /* ইমেজটি পুরো সেকশন জুড়ে থাকবে */
         background-position: center;
         /* ইমেজটি মাঝখানে থাকবে */
         background-repeat: no-repeat;
         padding: 15px 0;
         /* উপরে নিচে একটু গ্যাপ থাকবে */
         width: 100%;
         z-index: 999;
     }

     /* ইনপুট ফিল্ড এবং টেক্সট এরিয়া ফোকাস স্টাইল */
     .mail_text:focus,
     .massage-bt:focus {
         outline: none !important;
         /* ব্রাউজারের ডিফল্ট নীল আউটলাইন সরানোর জন্য */
         border: 2px solid #85A900 !important;
         /* আপনার পছন্দের সবুজ কালার */
         box-shadow: 0 0 8px rgba(133, 169, 0, 0.3);
         /* হালকা গ্লো ইফেক্ট (ঐচ্ছিক) */
         transition: 0.3s;
         border-radius: 20px;
         /* পরিবর্তনটা যেন স্মুথ হয় */
     }

     /* মাউস হোভার করলেও যেন একটু পরিবর্তন বোঝা যায় */
     .mail_text:hover,
     .massage-bt:hover {
         border-color: #85A900;
         border-radius: 30px !important;
     }

     .mail_text,
     .massage-bt {
         border-radius: 20px;
         /* আপনার পছন্দমতো ৫px থেকে ২৫px পর্যন্ত দিতে পারেন */
         padding: 15px 20px;
         /* ভেতরের লেখাগুলো যেন লেগে না যায় সেজন্য প্যাডিং */
         border: 1px solid #ddd;
         /* হালকা বর্ডার */
         margin-bottom: 20px;
         /* একটি ইনপুট থেকে অন্যটির দূরত্ব */
         width: 100%;
         transition: all 0.3s ease;
     }

     /* --- Contact Form Border Styling --- */
     .mail_section {
         border: 2px solid #85A900;
         /* আপনার থিমের সবুজ রঙের বর্ডার */
         padding: 40px;
         /* বর্ডারের ভেতর থেকে ফর্মের দূরত্ব */
         border-radius: 20px;
         /* কোনাগুলো গোল করার জন্য */
         background-color: #ffffff;
         /* ফর্মের ব্যাকগ্রাউন্ড সাদা */
         box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
         /* হালকা শ্যাডো */
         transition: all 0.3s ease;
     }

     /* ফর্মের ওপর মাউস নিলে বর্ডারের রঙ পরিবর্তন হবে */
     .mail_section:hover {
         border-color: #2D393B;
         /* ডার্ক কালার হবে */
         box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
     }


     /* ইনপুট ফিল্ডে ক্লিক করলে বর্ডার কালার চেঞ্জ হবে */
     .mail_text:focus,
     .massage-bt:focus {
         border-color: #85A900 !important;
         outline: none;
     }

     .client_section {
         /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
         background-image: url('/frontend/images/services-img.png');

         /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */

         background-repeat: no-repeat;
         /* ইমেজটি বারবার রিপিট হবে না */

         /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */

     }

     /* মেইন বক্সের জন্য স্পষ্ট শ্যাডো */
     .year_section_2 {
         background-color: #ffffff !important;
         padding: 40px 20px;
         margin-top: 10px !important;
         border-radius: 15px;
         /* এখানে শ্যাডো বাড়ানো হলো */
         box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2) !important;
         transition: all 0.4s ease;
         position: relative;
         z-index: 99;
         /* যাতে এটি ব্যানারের ওপরে থাকে */
         margin-top: -100px;
         /* আপনার স্ক্রিনশট অনুযায়ী পজিশন */
     }

     /* হোভার করলে শ্যাডো আরও একটু গভীর হবে */
     .year_section_2:hover {
         transform: translateY(-8px);
         /* হালকা উপরে উঠবে */
         box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3) !important;
     }

     /* ================= RESPONSIVE ADD START ================= */
     /* ================= MOBILE NAVBAR TRANSPARENT OVER IMAGE ================= */





     /* 🔥 MOBILE (max-width:768px) */
     @media (max-width: 768px) {

         /* Banner */
         .banner_section {
             padding: 60px 0 !important;
             text-align: center;
         }

         .banner_taital {
             font-size: 26px !important;
         }

         .banner_text {
             font-size: 14px;
         }

         /* Year Section */
         .year_section_2 {
             margin-top: 20px !important;
             padding: 20px !important;
         }

         .year_section_2 .col-md-3 {
             margin-bottom: 20px;
             text-align: center;
         }

         /* About Section */
         .about-content {
             text-align: center;
         }

         .about-text {
             max-width: 100% !important;
         }

         .about-title {
             font-size: 28px !important;
         }

         /* 🔥 SERVICES SECTION CENTER FIX */
         .services_section .box_main {
             text-align: center !important;
             padding: 20px;
         }

         .services_section .service_img img {
             margin: 0 auto;
             display: block;
         }

         .services_section .development_text,
         .services_section .services_text,
         .services_section .readmore_bt {
             text-align: center !important;
         }

         /* CTA */
         .cta-box {
             text-align: center !important;
             padding: 30px 20px !important;
         }

         .cta-btn {
             margin-top: 20px;
         }

         /* 🔥 CLIENT SECTION MARGIN FIX */
         .client_section {
             padding-left: 15px !important;
             padding-right: 15px !important;
         }

         .client_box {
             margin-left: 10px !important;
             margin-right: 10px !important;
         }

         .client_img {
             width: 80px !important;
             height: 80px !important;
             top: -40px !important;
         }

         .looking_text {
             font-size: 18px !important;
         }

         .dummy_text {
             font-size: 14px !important;
         }

         /* Contact Form */
         .mail_section {
             padding: 20px !important;
         }

         .mail_text,
         .massage-bt {
             padding: 10px !important;
             font-size: 14px;
         }

         /* Footer */
         .footer_section .col-lg-3 {
             margin-bottom: 25px;
             text-align: center;
         }

     }

     /* 🔥 TABLET (max-width:991px) */
     @media (max-width: 991px) {

         .navbar-nav {
             background: #fff;
             padding: 10px;
             border-radius: 10px;
         }

         .cta-box {
             text-align: center !important;
         }

     }

     /* ================= MOBILE ONLY FIX ================= */
     @media (max-width: 768px) {

         /* card content center align */
         .services_section .box_main {
             text-align: center;
         }

         /* image center */
         .services_section .service_img img {
             margin: 0 auto;
             display: block;
         }

         /* text center */
         .services_section .development_text,
         .services_section .services_text {
             text-align: center;
         }

         /* ===== READ MORE BUTTON CENTER FIX ===== */
         .services_section .readmore_bt {
             display: flex;
             justify-content: center;
             /* 🔥 TRUE CENTER */
             align-items: center;
             margin-top: 15px;
             margin-left: 55px !important;
         }

         .services_section .readmore_bt a {
             display: inline-block;
             padding: 10px 25px;
             border-radius: 30px;
             background: #85A900;
             color: #fff !important;
             font-weight: 600;
             text-decoration: none;
             transition: 0.3s ease;
             box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
         }

         .services_section .readmore_bt a:active {
             transform: scale(0.95);
         }
     }

     /* ================= RESPONSIVE ADD END ================= */
     /* Ensure the parent item is the reference point */

     /* --- নেভিবার মেইন স্টাইল --- */
     .custom-navbar {
         width: 100%;
         background-image: url('{{ asset('frontend/images/rice.avif') }}');
         background-size: cover;
         background-position: center;
         padding: 12px 0;
         position: relative;
         z-index: 1000;
     }

     /* ব্যাকগ্রাউন্ড ডার্ক ওভারলে (যাতে লেখা পরিষ্কার বুঝা যায়) */
     .custom-navbar::before {
         content: "";
         position: absolute;
         inset: 0;
         z-index: -1;
     }

     /* কন্টেইনার গ্যাপ ফিক্স */
     .custom-navbar .container {
         padding-right: 20px !important;
         padding-left: 20px !important;
         display: flex;
         align-items: center;
         justify-content: space-between;
     }

     /* লোগো ও বাটন মার্জিন */
     .navbar-brand {
         margin-left: 10px;
     }

     .logo img {
         max-height: 50px;
         width: auto;
     }

     /* --- মোবাইল টগলার আইকন গাঢ়/কালো করার জন্য --- */
     .navbar-toggler-icon {
         background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='black' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E") !important;
     }

     /* টগলার বাটনের বর্ডারও যদি গাঢ় করতে চান */
     .navbar-toggler {
         border: 1px solid #2D393B !important;
         padding: 4px 8px;
     }

     /* মেনু লিঙ্ক স্টাইল */
     .navbar-nav .nav-link {
         color: #ffffff !important;
         margin: 0 8px;
         font-weight: 600;
         text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
     }

     /* একটিভ মেনু */
     .active-menu {
         background: #ffffff;
         color: #85A900 !important;
         padding: 6px 18px !important;
         border-radius: 5px;
         text-shadow: none !important;
     }

     /* ড্রপডাউন মেনু ফিক্স */
     .dropdown-menu {
         border-radius: 8px;
         border: none;
         box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
     }

     /* --- মোবাইল রেসপন্সিভ ফিক্স (৯৯১ পিক্সেলের নিচে) --- */
     @media (max-width: 991px) {
         .navbar-collapse {
            
            
             margin-top: 15px;
             padding: 20px;
             border-radius: 10px;
             text-align: center;
         }
  @media (max-width: 991px) {
    .navbar-nav {
        background: none !important;
        padding: 10px;
        border-radius: 10px;
    }
}
         .navbar-nav .nav-link {
             border-bottom: 1px solid rgba(255, 255, 255, 0.1);
             padding: 12px 0 !important;
             margin: 0;
         }

         .dropdown-menu {
             background: rgba(255, 255, 255, 0.1) !important;
             box-shadow: none;
         }

         .dropdown-item {
             color: #fff !important;
             padding: 10px;
         }

         /* মোবাইলে একটিভ মেনু স্টাইল ঠিক করা */
         .active-menu {
             display: inline-block;
             margin-bottom: 10px;
         }
     }
 </style>
