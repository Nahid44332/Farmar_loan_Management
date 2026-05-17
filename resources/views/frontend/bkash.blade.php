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

         /* মেইন কন্টেইনারে প্যাডিং দিয়ে কার্ডটি নিচে নামানো */
         .payment_main_container {
            padding: 100px 0; /* উপরে ১০০ পিক্সেল জায়গা খালি থাকবে */
            background-color: #f9f9f9; /* হালকা ধূসর ব্যাকগ্রাউন্ড যেন কার্ডটি ফুটে ওঠে */
         }

         /* বিকাশ কার্ড ডিজাইন */
         .bkash-card {
            max-width: 450px;
            margin: 0 auto;
                        background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            border: 1px solid #ddd;
         }

         .bkash-head {
            background: #e2136e;
            padding: 20px;
            text-align: center;
         }

      .bkash-head img { 
    /* লোগো বড় করার জন্য font-size এর বদলে width ব্যবহার করতে হয় */
    width: 200px !important; 
    
    /* লোগোকে সাদা করার জন্য */
    filter: brightness(0) invert(1) contrast(1.2) !important; 
    
    /* লোগোকে আরও স্পষ্ট বা 'বোল্ড' লুক দেওয়ার জন্য contrast ব্যবহার করা হয়েছে */
    display: inline-block;
}

         .bkash-body { padding: 30px; }

         .amount-box {
            background: #fff0f6;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 25px;
         }

         .form-input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
         }

         .btn-submit {
            background: #e2136e;
            color: white;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
         }

         /* Mobile Responsive CSS for bKash Payment Section */

@media (max-width: 768px) {
    /* মেইন কন্টেইনারের প্যাডিং কমিয়ে দেওয়া */
    .payment_main_container {
        padding: 50px 15px;
    }

    /* বিকাশ কার্ডের সাইজ মোবাইলের জন্য অ্যাডজাস্ট করা */
    .bkash-card {
        max-width: 100%;
        margin-top: 800px !important;
        border-radius: 10px;
    }

    /* লোগোর সাইজ মোবাইলে কিছুটা ছোট করা */
    .bkash-head img {
        width: 150px !important;
    }

    .bkash-head {
        padding: 15px;
    }

    /* ফর্মের ভেতরের প্যাডিং কমানো */
    .bkash-body {
        padding: 20px;
    }

    /* ইনপুট ফিল্ড ও টেক্সট সাইজ অ্যাডজাস্টমেন্ট */
    .form-input {
        padding: 10px;
        font-size: 14px;
    }

    .form-group label {
        font-size: 14px;
    }

    .btn-submit {
        font-size: 16px;
        padding: 10px;
    }
}

@media (max-width: 480px) {
    /* অতি ক্ষুদ্র স্ক্রিনের জন্য (যেমন ছোট ফোন) */
    .bkash-head img {
        width: 120px !important;
    }

    .payment_main_container {
        padding: 30px 10px;
    }

    .bkash-card {
        margin-top: 30px !important;
    }
}
  .payment_main_container {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
      </style>

<!-- কার্ড সেকশন -->
     <div class="payment_main_container">
         <div class="container">
            <div class="bkash-card">
               <div class="bkash-head">
                  <img src="https://www.logo.wine/a/logo/BKash/BKash-bKash-Logo.wine.svg" alt="bKash">
               </div>
               <div class="bkash-body">
                 
                 @if(session('success'))
                     <div class="alert alert-success" style="color: green; background: #e6f4ea; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px;">
                         {{ session('success') }}
                     </div>
                 @endif

                 @if($errors->any())
                     <div class="alert alert-danger" style="color: red; background: #fce8e6; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px;">
                         {{ $errors->first() }}
                     </div>
                 @endif

                 <form action="{{ route('bkash.payment.submit') }}" method="POST">
                    @csrf <div class="form-group">
                        <label>আপনার নাম</label>
                        <input type="text" name="name" class="form-input" placeholder="পুরো নাম লিখুন" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>আপনার ঠিকানা</label>
                        <input type="text" name="address" class="form-input" placeholder="গ্রাম/শহর, জেলা" value="{{ old('address') }}" required>
                    </div>

                    <div class="form-group">
                        <label>বিকাশ নম্বর (যেখান থেকে টাকা পাঠিয়েছেন)</label>
                        <input type="text" name="phone" class="form-input" placeholder="017XXXXXXXX" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label>টাকার পরিমাণ (Amount)</label>
                        <input type="number" name="amount" class="form-input" placeholder="কত টাকা পাঠিয়েছেন" value="{{ old('amount') }}" required>
                    </div>

                    <div class="form-group">
                        <label>ট্রানজেকশন আইডি (TrxID)</label>
                        <input type="text" name="transaction_id" class="form-input" placeholder="TrxID এখানে দিন" value="{{ old('transaction_id') }}" required>
                    </div>

                    <button type="submit" class="btn-submit">পেমেন্ট নিশ্চিত করুন</button>
                 </form>
               </div>
            </div>
         </div>
      </div>
@endsection