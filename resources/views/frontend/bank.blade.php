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

        /* ব্যাংক পেমেন্ট কন্টেইনার - ফুটার ফিক্স এখানে */
        .bank_payment_container {
            padding: 80px 0 120px 0; /* নিচে ১২০ পিক্সেল প্যাডিং দেওয়া হয়েছে যাতে ফুটারে না ঠেকে */
            background-color: #f8fbff;
            display: block;
            width: 100%;
            overflow: hidden; /* কন্টেন্ট যাতে বাইরে না যায় */
            min-height: 600px; /* যাতে ফুটার সবসময় নিচে থাকে */
        }

        .section_title h2 {
            font-size: 36px;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .section_title h2::after {
            content: "";
            position: absolute;
            width: 60%;
            height: 3px;
            background: #007bff;
            bottom: 0;
            left: 20%;
        }

        /* ব্যাংক কার্ড ডিজাইন */
        .bank-card {
            background: #ffffff;
            padding: 30px 20px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid #edf2f7;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px; /* কার্ডের নিচে গ্যাপ */
        }

        .bank-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 123, 255, 0.15);
            border-color: #007bff;
        }

        .bank-card img {
            height: 65px;
            max-width: 100%;
            object-fit: contain;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .bank-card:hover img {
            transform: scale(1.1);
        }

        .bank-card h5 {
            font-size: 16px;
            font-weight: 700;
            color: #2d3748;
            margin: 0;
            transition: color 0.3s;
        }

        .bank-card:hover h5 {
            color: #007bff;
        }

        /* কাস্টম মডাল স্টাইল */
        .custom-modal {
            display: none;
            position: fixed;
            z-index: 99999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
        }

        .modal-content-card {
            background-color: #fff;
            margin: 3% auto;
            width: 480px;
            border-radius: 25px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            position: relative;
            animation: modalSlideUp 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes modalSlideUp {
            from { transform: translateY(80px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .modal-header-bank {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: #fff;
            padding: 25px;
            text-align: center;
            position: relative;
        }

        .modal-header-bank h4 {
            margin: 0;
            font-weight: 700;
            font-size: 20px;
        }

        .close-modal {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
            line-height: 1;
        }

        .modal-body-bank {
            padding: 30px 40px;
        }

        .form-group label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            display: block;
            font-size: 14px;
        }

        .bank-input {
            width: 100%;
            padding: 12px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s;
            background-color: #f7fafc;
        }

        .bank-input:focus {
            border-color: #007bff;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(0, 123, 255, 0.1);
        }

        .btn-confirm-bank {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: #fff;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            font-size: 17px;
            font-weight: 700;
            margin-top: 10px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-confirm-bank:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
        }

        /* রেসপনসিভ */
        @media (max-width: 768px) {
            .bank_payment_container { padding-top: 120px; padding-bottom: 80px; }
            .modal-content-card { width: 90%; margin-top: 15%; }
            .modal-body-bank { padding: 25px; }
        }
         .bank_payment_container {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
    </style>

    <div class="bank_payment_container ">
        <div class="container">
            <div class="section_title text-center mb-5">
                <h2 style="font-weight: 700; color: #333;">ব্যাংক পেমেন্ট নির্বাচন করুন</h2>
                <p style="color: #666;">আপনার পছন্দসই ব্যাংকের ওপর ক্লিক করে পেমেন্ট সম্পন্ন করুন</p>
            </div>

            @if(session('success'))
                 <div style="max-width: 600px; margin: 0 auto 20px auto; color: green; background: #e6f4ea; padding: 15px; border-radius: 10px; font-weight: bold; text-align: center; border: 1px solid #34a853;">
                     {{ session('success') }}
                 </div>
            @endif

            @if($errors->any())
                 <div style="max-width: 600px; margin: 0 auto 20px auto; color: red; background: #fce8e6; padding: 15px; border-radius: 10px; font-weight: bold; text-align: center; border: 1px solid #ea4335;">
                     {{ $errors->first() }}
                 </div>
            @endif

            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Dutch-Bangla Bank')">
                        <img src="{{asset('frontend/images/butch_bangla.png')}}" alt="DBBL">
                        <h5>Dutch-Bangla Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Islami Bank')">
                        <img src="{{asset('frontend/images/islami_bank.png')}}" alt="IBBL">
                        <h5>Islami Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Sonali Bank')">
                        <img src="{{asset('frontend/images/sonali_bank.svg')}}" alt="Sonali">
                        <h5>Sonali Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('BRAC Bank')">
                        <img src="{{asset('frontend/images/brack_bank.png')}}" alt="BRAC">
                        <h5>BRAC Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('City Bank')">
                        <img src="{{asset('frontend/images/city_bank.png')}}" alt="City">
                        <h5>City Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Agrani Bank')">
                        <img src="{{asset('frontend/images/agrani_bank.png')}}" alt="Agrani">
                        <h5>Agrani Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Janata Bank')">
                        <img src="{{asset('frontend/images/janata_bank.png')}}" alt="Janata">
                        <h5>Janata Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Pubali Bank')">
                        <img src="{{asset('frontend/images/pubali_bank.png')}}" alt="Pubali">
                        <h5>Pubali Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Rupali Bank')">
                        <img src="{{asset('frontend/images/rupali_bank.png')}}" alt="Rupali">
                        <h5>Rupali Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('MTB Bank')">
                        <img src="{{asset('frontend/images/mtb_bank.png')}}" alt="MTB">
                        <h5>MTB Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Eastern Bank')">
                        <img src="{{asset('frontend/images/ebl_bank.png')}}" alt="EBL">
                        <h5>Eastern Bank (EBL)</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Prime Bank')">
                        <img src="{{asset('frontend/images/prime_bank.png')}}" alt="Prime">
                        <h5>Prime Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('SIBL Bank')">
                        <img src="{{asset('frontend/images/sibl_bank.png')}}" alt="SIBL">
                        <h5>SIBL Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Al-Arafah Bank')">
                        <img src="{{asset('frontend/images/al_arafah.png')}}" alt="Al-Arafah">
                        <h5>Al-Arafah Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Bank Asia')">
                        <img src="{{asset('frontend/images/bank_asia.png')}}" alt="Bank Asia">
                        <h5>Bank Asia</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('UCB Bank')">
                        <img src="{{asset('frontend/images/ucb_bank.png')}}" alt="UCB">
                        <h5>UCB Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('NRBC Bank')">
                        <img src="{{asset('frontend/images/nrbc_bank.png')}}" alt="NRBC">
                        <h5>NRBC Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Jamuna Bank')">
                        <img src="{{asset('frontend/images/jomuna_bank.png')}}" alt="Jamuna">
                        <h5>Jamuna Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('Shahjalal Bank')">
                        <img src="{{asset('frontend/images/shahjalal_bank.png')}}" alt="Shahjalal">
                        <h5>Shahjalal Bank</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="bank-card" onclick="openPaymentModal('EXIM Bank')">
                        <img src="{{asset('frontend/images/exim_bank.png')}}" alt="EXIM">
                        <h5>EXIM Bank</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="paymentModal" class="custom-modal">
        <div class="modal-content-card">
            <div class="modal-header-bank">
                <h4 id="selectedBankName">পেমেন্ট নিশ্চিত করুন</h4>
                <span class="close-modal" onclick="closePaymentModal()">&times;</span>
            </div>
            <div class="modal-body-bank">
                <form action="{{ route('bank.payment.submit') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="bank_name" id="bankNameInput">

                    <div class="form-group mb-3">
                        <label>আপনার নাম</label>
                        <input type="text" name="name" class="bank-input" placeholder="পুরো নাম লিখুন" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>ঠিকানা</label>
                        <input type="text" name="address" class="bank-input" placeholder="আপনার ঠিকানা লিখুন" value="{{ old('address') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>ফোন নম্বর</label>
                        <input type="text" name="phone" class="bank-input" placeholder="01XXXXXXXXX" value="{{ old('phone') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>টাকার পরিমাণ (Amount)</label>
                        <input type="number" name="amount" class="bank-input" placeholder="৳ ০.০০" value="{{ old('amount') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>ব্যাংক অ্যাকাউন্ট / ট্রানজেকশন আইডি</label>
                        <input type="text" name="transaction_id" class="bank-input" placeholder="আইডি বা অ্যাকাউন্ট নম্বর দিন" value="{{ old('transaction_id') }}" required>
                    </div>
                    <button type="submit" class="btn-confirm-bank">পেমেন্ট নিশ্চিত করুন</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openPaymentModal(bankName) {
            document.getElementById('selectedBankName').innerText = bankName + " পেমেন্ট";
            
            // 🎯 জাভাস্ক্রিপ্ট দিয়ে ব্যাংকের নাম হিডেন ইনপুটে সেট করা হচ্ছে
            document.getElementById('bankNameInput').value = bankName; 
            
            document.getElementById('paymentModal').style.display = "block";
            document.body.style.overflow = 'hidden'; 
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').style.display = "none";
            document.body.style.overflow = 'auto'; 
        }

        window.onclick = function(event) {
            let modal = document.getElementById('paymentModal');
            if (event.target == modal) {
                closePaymentModal();
            }
        }
    </script>
@endsection