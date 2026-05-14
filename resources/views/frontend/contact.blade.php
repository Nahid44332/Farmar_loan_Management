@extends('frontend.master')

@section('contant')
          <style>
         /* ================= CONTACT PAGE RESPONSIVE ================= */

/* Tablet */
@media (max-width: 991px) {

    .contact_section {
        padding: 60px 0;
    }

    .contact_taital {
        font-size: 32px;
        text-align: center;
    }

    .mail_section {
        padding: 30px;
    }

    .btn_main {
        text-align: center;
    }
}

/* Mobile */
@media (max-width: 767px) {

    .contact_taital {
        font-size: 26px;
    }

    .mail_section {
        padding: 25px 20px;
        border-radius: 15px;
    }

    .mail_text,
    .massage-bt {
        font-size: 14px;
        padding: 12px 15px;
    }

    .massage-bt {
        height: 120px;
    }

    .send_bt a {
        width: 100%;
        display: block;
        text-align: center;
    }
}

/* Small Mobile */
@media (max-width: 480px) {

    .contact_taital {
        font-size: 22px;
    }

    .mail_section {
        padding: 20px 15px;
    }

    .mail_text,
    .massage-bt {
        font-size: 13px;
    }

    .footer_section_2 {
        text-align: center;
    }

    .social_icon ul {
        justify-content: center;
    }
}
         .header_section {
    /* আপনার নতুন ইমেজের পাথ এখানে দিন */
    background-image: url('images/banner.jpg') !important; 
    
    background-size: cover;      /* ইমেজটি পুরো সেকশন জুড়ে থাকবে */
    background-position: center;   /* ইমেজটি মাঝখানে থাকবে */
    background-repeat: no-repeat;
    padding: 15px 0;             /* উপরে নিচে একটু গ্যাপ থাকবে */
    width: 100%;
    z-index: 999;
}

/* ইনপুট ফিল্ড এবং টেক্সট এরিয়া ফোকাস স্টাইল */
.mail_text:focus, 
.massage-bt:focus {
    outline: none !important;          /* ব্রাউজারের ডিফল্ট নীল আউটলাইন সরানোর জন্য */
    border: 2px solid #85A900 !important; /* আপনার পছন্দের সবুজ কালার */
    box-shadow: 0 0 8px rgba(133, 169, 0, 0.3); /* হালকা গ্লো ইফেক্ট (ঐচ্ছিক) */
    transition: 0.3s;  
    border-radius: 20px;               /* পরিবর্তনটা যেন স্মুথ হয় */
}

/* মাউস হোভার করলেও যেন একটু পরিবর্তন বোঝা যায় */
.mail_text:hover, 
.massage-bt:hover {
    border-color: #85A900;
    border-radius: 30px !important;
}
.mail_text, 
.massage-bt {
    border-radius: 20px; /* আপনার পছন্দমতো ৫px থেকে ২৫px পর্যন্ত দিতে পারেন */
    padding: 15px 20px;   /* ভেতরের লেখাগুলো যেন লেগে না যায় সেজন্য প্যাডিং */
    border: 1px solid #ddd; /* হালকা বর্ডার */
    margin-bottom: 20px;    /* একটি ইনপুট থেকে অন্যটির দূরত্ব */
    width: 100%;
    transition: all 0.3s ease;
}
/* --- Contact Form Border Styling --- */
.mail_section {
   border: 2px solid #85A900; /* আপনার থিমের সবুজ রঙের বর্ডার */
   padding: 40px;             /* বর্ডারের ভেতর থেকে ফর্মের দূরত্ব */
   border-radius: 20px;       /* কোনাগুলো গোল করার জন্য */
   background-color: #ffffff; /* ফর্মের ব্যাকগ্রাউন্ড সাদা */
   box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); /* হালকা শ্যাডো */
   transition: all 0.3s ease;
}

/* ফর্মের ওপর মাউস নিলে বর্ডারের রঙ পরিবর্তন হবে */
.mail_section:hover {
   border-color: #2D393B; /* ডার্ক কালার হবে */
   box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}


/* ইনপুট ফিল্ডে ক্লিক করলে বর্ডার কালার চেঞ্জ হবে */
.mail_text:focus, .massage-bt:focus {
   border-color: #85A900 !important;
   outline: none;
}
    
.contact_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
      </style>






  <!-- contact section start -->
      <div class="contact_section layout_padding mb-5">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="contact_taital">Requeste A call Back</h1>
               </div>
            </div>
         </div>
         <div class="contact_section_2">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mail_section map_form_container">
                        <form action="">
                           <div class="row">
                              <div class="col-md-6">
                                 <input type="text" class="mail_text" placeholder="Your Name" name="Your Name">
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="mail_text" placeholder="Email" name="Email">
                              </div>
                              <div class="col-md-6">
                                 <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                              </div>
                              <div class="col-md-6">
                                 <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="Message"></textarea>
                              </div>
                           </div>
                           <div class="btn_main">
                              <div class="send_bt active"><a href="#">Send</a></div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
@endsection