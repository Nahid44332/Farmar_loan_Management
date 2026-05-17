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
            height: 100px !important; /* মোবাইল স্ক্রিনে মেসেজ বক্সের হাইট */
        }
        .send_bt button {
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

    /* ================= MAIN STYLE ================= */
    .header_section {
        background-image: url('images/banner.jpg') !important; 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 15px 0;
        width: 100%;
        z-index: 999;
    }

    .contact_section {
        background-image: url('/frontend/images/contact-bg.png'); 
        background-repeat: no-repeat;    
    }

    /* Contact Form Wrapper Styling */
    .mail_section {
       border: 2px solid #85A900;
       padding: 40px;
       border-radius: 20px;
       background-color: #ffffff;
       box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
       transition: all 0.3s ease;
    }

    .mail_section:hover {
       border-color: #2D393B;
       box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    /* ================= INPUTS & TEXTAREA UNIFORM DESIGN ================= */
    /* সব ইনপুট ফিল্ড এবং মেসেজ বক্সের সাইজ, কোণা এবং ফন্ট কালার সমান রাখার জন্য */
    .mail_text, 
    .massage-bt {
        border-radius: 12px !important; /* সব ইনপুটের কোণা সমান ১২px গোল থাকবে */
        padding: 15px 20px;   
        border: 1px solid #ddd; 
        margin-bottom: 20px;    
        width: 100%;
        font-family: inherit;
        transition: all 0.3s ease;
        box-sizing: border-box;
        
        /* 🎨 ইনপুটে লেখার ফন্ট কালার কুচকুচে কালো করার জন্য */
        color: #000000 !important; 
        font-weight: 500; /* লেখা যেন স্পষ্ট ও সুন্দর দেখায় */
    }

    /* প্লেসহোল্ডারের (Placeholder) টেক্সট কালার কিছুটা হালকা রাখার জন্য (ঐচ্ছিক কিন্তু স্ট্যান্ডার্ড) */
    .mail_text::placeholder,
    .massage-bt::placeholder {
        color: #999999 !important;
        font-weight: normal;
    }

    /* ইনপুট ফিল্ডের নির্দিষ্ট হাইট */
    .mail_text {
        height: 54px;
    }

    /* মেসেজ বক্স বা টেক্সট এরিয়ার কাস্টম ডিজাইন */
    .massage-bt {
        height: 120px;          /* মেসেজ লেখার জন্য পর্যাপ্ত হাইট */
        resize: vertical;       /* ইউজার টেনে শুধু নিচের দিকে বড় করতে পারবে */
        overflow-y: auto;       /* লেখা বেশি হলে ভেতরে স্ক্রল হবে */
    }

    /* হোভার ইফেক্ট */
    .mail_text:hover, 
    .massage-bt:hover {
        border-color: #85A900;
        border-radius: 12px !important;
    }

    /* ফোকাস ইফেক্ট (ক্লিক করে লেখার সময় বর্ডার এবং গ্লো ইফেক্ট) */
    .mail_text:focus, 
    .massage-bt:focus {
        outline: none !important;          
        border: 2px solid #85A900 !important; 
        box-shadow: 0 0 8px rgba(133, 169, 0, 0.3); 
        border-radius: 12px !important;
        color: #000000 !important; /* ফোকাস অবস্থাতেও কালো থাকবে */
    }

    /* সাবমিট বাটনের কাস্টম ডিজাইন */
    .send_bt button {
        background-color: #85A900;
        color: #fff;
        padding: 12px 40px;
        font-size: 16px;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    
    .send_bt button:hover {
        background-color: #2D393B;
    }
</style>

<div class="contact_section layout_padding mb-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="contact_taital">Request A Call Back</h1>
            </div>
        </div>
    </div>
    <div class="contact_section_2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mail_section map_form_container">
                        
                        @if(session('success'))
                            <div style="color: green; background: #e6f4ea; padding: 15px; border-radius: 10px; font-weight: bold; text-align: center; border: 1px solid #34a853; margin-bottom: 20px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="mail_text" placeholder="Your Name" name="name" value="{{ old('name') }}" required>
                                    @error('name') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="mail_text" placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    @error('email') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12"> 
                                    <input type="text" class="mail_text" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12"> 
                                    <textarea class="massage-bt" placeholder="Message" rows="5" id="comment" name="message" required>{{ old('message') }}</textarea>
                                    @error('message') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="btn_main">
                                <div class="send_bt active">
                                    <button type="submit">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection