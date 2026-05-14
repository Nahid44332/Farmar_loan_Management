@extends('frontend.master')
@section('contant')
     <style>
/* হেডার ইমেজের জন্য */
         .header_section {
            background-image: url('/frontend/images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
         }
         /* নগদ ব্র্যান্ড কালার ও মেইন কন্টেইনার */
    .nagad_main_container {
        padding: 100px 0;
        background-color: #f9f9f9;
    }

    /* নগদ কার্ড ডিজাইন */
    .nagad-card {
        max-width: 450px;
        margin: 0 auto;
        background: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
        border: 1px solid #ddd;
    }

    .nagad-head {
        background: #f7941d; /* নগদের অরিজিনাল অরেঞ্জ কালার */
        padding: 25px;
        text-align: center;
    }

    .nagad-head img {
        width: 140px !important;
        filter: brightness(0) invert(1) !important; /* লোগো সাদা করার জন্য */
    }

    .nagad-body {
        padding: 30px;
    }

    .amount-box-nagad {
        background: #fff5e6;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        margin-bottom: 25px;
        border: 1px dashed #f7941d;
    }

    .nagad-label {
        font-weight: 600;
        color: #444;
        margin-bottom: 8px;
        display: block;
    }

    .form-input-nagad {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: 0.3s;
    }

    .form-input-nagad:focus {
        border-color: #f7941d;
        outline: none;
        box-shadow: 0 0 5px rgba(247, 148, 29, 0.2);
    }

    .btn-nagad {
        background: #f7941d;
        color: white;
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 8px;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-nagad:hover {
        background: #e68510;
        transform: translateY(-2px);
    }

    /* মোবাইল রেসপনসিভ */
    @media (max-width: 768px) {
        .nagad_main_container {
            padding-top: 150px !important; /* আপনার মেনু থেকে গ্যাপ রাখার জন্য */
        }
        .nagad-card {
            max-width: 92%;
        }
    }
    /* মোবাইল রেসপনসিভ এর জন্য অতিরিক্ত কোড */
@media (max-width: 768px) {
    /* মেইন কন্টেইনার অ্যাডজাস্টমেন্ট */
    .nagad_main_container {
        padding: 40px 0 !important; /* টপ প্যাডিং কমিয়ে আনা */
    }

    /* কার্ড ডিজাইন মোবাইল ভিউ */
    .nagad-card {
        max-width: 95%; /* স্ক্রিনের দুই পাশে সামান্য জায়গা রেখে কার্ডটি বড় করা */
        margin-top: 20px !important;
        border-radius: 10px; /* মোবাইল স্ক্রিনে রেডিয়াস কিছুটা কমানো */
    }

    /* হেড সেকশন */
    .nagad-head {
        padding: 15px; /* প্যাডিং কমানো যাতে জায়গা কম লাগে */
    }

    .nagad-head img {
        width: 100px !important; /* মোবাইল স্ক্রিনে লোগো কিছুটা ছোট করা */
    }

    /* বডি ও ফর্ম এলিমেন্ট */
    .nagad-body {
        padding: 20px; /* ভেতরের খালি জায়গা কমানো */
    }

    .nagad-label {
        font-size: 14px; /* ছোট স্ক্রিনে ফন্ট সাইজ সামঞ্জস্য করা */
    }

    .form-input-nagad {
        padding: 10px; /* ইনপুট ফিল্ডের প্যাডিং সামঞ্জস্য করা */
        font-size: 14px;
        margin-bottom: 15px;
    }

    .btn-nagad {
        padding: 12px;
        font-size: 16px;
    }

    /* অ্যামাউন্ট বক্স (যদি কোডে থাকতো) */
    .amount-box-nagad h2 {
        font-size: 20px;
    }
}
 .nagad_main_container {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/service-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
      </style>





    <div class="nagad_main_container">
    <div class="container">
        <div class="nagad-card">
          <div class="nagad-head" style="background: #f7941d; padding: 25px; text-align: center;">
    <!-- Laravel asset helper ব্যবহার করে ইমেজ কল করা -->
    <img src="{{asset('frontend/images/nagad.svg')}}" 
         alt="Nagad" 
         style="width: 140px !important; height: auto !important;">
</div>

            <div class="nagad-body">
                

                <form action="" method="POST">
               
                    
                    <label class="nagad-label">আপনার নাম</label>
                    <input type="text" name="name" class="form-input-nagad" placeholder="পুরো নাম লিখুন" required>

                    <label class="nagad-label">আপনার ঠিকানা</label>
                    <input type="text" name="address" class="form-input-nagad" placeholder="গ্রাম/শহর, জেলা" required>

                    <label class="nagad-label">নগদ নম্বর</label>
                    <input type="text" name="phone" class="form-input-nagad" placeholder="01XXXXXXXXX" required>

                    <label class="nagad-label">টাকার পরিমাণ (Amount)</label>
                    <input type="number" name="amount" class="form-input-nagad" placeholder="৳ ০.০০" required>

                    <label class="nagad-label">ট্রানজেকশন আইডি (TrxID)</label>
                    <input type="text" name="transaction_id" class="form-input-nagad" placeholder="TrxID এখানে দিন" required>

                    <button type="submit" class="btn-nagad">পেমেন্ট নিশ্চিত করুন</button>
                </form>
            </div>
        </div>
    </div>
</div>
       

@endsection