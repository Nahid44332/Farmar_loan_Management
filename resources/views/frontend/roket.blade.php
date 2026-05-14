@extends('frontend.master')
@section('contant')
    <style>
/* হেডার ইমেজের জন্য */
         .header_section {
            background-image: url('images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100%;
         }
         /* রকেট পেমেন্ট সেকশন স্টাইল */
.rocket_main_container {
    padding: 100px 0;
    background-color: #f9f9f9;
}

.rocket-card {
    max-width: 450px;
    margin: 0 auto;
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
    border: 1px solid #ddd;
}

.rocket-head {
    background: #8c3494; /* রকেট অফিশিয়াল পার্পল */
    padding: 25px;
    text-align: center;
}

.rocket-head img {
    width: 120px !important;
    filter: brightness(0) invert(1) !important; /* লোগো সাদা করার জন্য */
}

.rocket-body {
    padding: 30px;
}

/* ইনপুট ফিল্ড ও লেবেল স্টাইল */
.rocket-label {
    font-weight: 600;
    color: #444;
    margin-bottom: 8px;
    display: block;
}

.form-input-rocket {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    transition: 0.3s;
}

.form-input-rocket:focus {
    border-color: #8c3494;
    outline: none;
    box-shadow: 0 0 5px rgba(140, 52, 148, 0.2);
}

/* বাটন স্টাইল */
.btn-rocket {
    background: #8c3494;
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

.btn-rocket:hover {
    background: #722a79;
    transform: translateY(-2px);
}

/* মোবাইল রেসপনসিভ (আপনার আগের রিকোয়েস্ট অনুযায়ী টপ গ্যাপসহ) */
@media (max-width: 768px) {
    .rocket_main_container {
        padding-top: 150px !important; 
    }
    .rocket-card {
        max-width: 92%;
    }
}
 .rocket_main_container {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
          </style>





<!-- Rocket Main Container Start -->
<div class="rocket_main_container" style="padding: 60px 0; background-color: #f4f4f4;">
    <div class="container">
        <!-- রকেট কার্ড ডিজাইন -->
        <div class="rocket-card" style="max-width: 450px; margin: 0 auto; background: #ffffff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #ddd;">
            
            <!-- রকেট হেডার (পার্পল কালার) -->
            <div class="rocket-head" style="background: #8c3494; padding: 25px; text-align: center;">
                 <img src="{{asset('frontend/images/roket.png')}}" 
                     alt="Rocket" 
                     style="width: 120px; height: auto; filter: brightness(0) invert(1);">
            </div>

            <div class="rocket-body" style="padding: 30px;">
                <!-- রুট এবং মেথড লারাভেলের জন্য সেট করা -->
                <form action="" method="POST">
                     <!-- লারাভেলের সিকিউরিটি টোকেন -->
                    
                    <label class="nagad-label" style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">আপনার নাম</label>
                    <input type="text" name="name" class="form-input-nagad" placeholder="পুরো নাম লিখুন" required 
                           style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px;">

                    <label class="nagad-label" style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">আপনার ঠিকানা</label>
                    <input type="text" name="address" class="form-input-nagad" placeholder="গ্রাম/শহর, জেলা" required 
                           style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px;">

                    <label class="nagad-label" style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">রকেট নম্বর</label>
                    <input type="text" name="phone" class="form-input-nagad" placeholder="01XXXXXXXXX-X" required 
                           style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px;">

                    <label class="nagad-label" style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">টাকার পরিমাণ (Amount)</label>
                    <input type="number" name="amount" class="form-input-nagad" placeholder="৳ ০.০০" required 
                           style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px;">

                    <label class="nagad-label" style="font-weight: 600; color: #444; margin-bottom: 8px; display: block;">ট্রানজেকশন আইডি (TrxID)</label>
                    <input type="text" name="transaction_id" class="form-input-nagad" placeholder="TrxID এখানে দিন" required 
                           style="width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px;">

                    <!-- রকেট ব্র্যান্ড বাটন -->
                    <button type="submit" class="btn-rocket" 
                            style="background: #8c3494; color: white; width: 100%; padding: 14px; border: none; border-radius: 8px; font-size: 18px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                        পেমেন্ট নিশ্চিত করুন
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection