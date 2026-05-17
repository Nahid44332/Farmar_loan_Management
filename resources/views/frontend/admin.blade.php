@extends('frontend.master')

@section('contant')
<style>
         /* ===== MOBILE RESPONSIVE ===== */
@media (max-width: 991px) {

    /* Admin Card */
    .admin_login_card {
        padding: 30px 20px;
    }

    .admin_taital {
        font-size: 24px;
    }

    .admin_text {
        font-size: 14px;
    }

    .admin_icon {
        font-size: 50px;
    }

    /* Input */
    .input_group {
        padding: 5px 15px;
    }

    .admin_input {
        font-size: 14px;
    }

    /* Remember + Forgot */
    .remember_box {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }

    /* Button */
    .admin_btn {
        font-size: 16px;
        padding: 12px;
    }

    /* Navbar */
    .navbar-nav {
        text-align: center;
    }

    .navbar-nav .nav-item {
        margin: 10px 0;
    }

    /* Footer */
    .footer_section .col-lg-3 {
        text-align: center;
        margin-bottom: 30px;
    }
}

/* Extra Small Devices */
@media (max-width: 576px) {

    .admin_login_card {
        padding: 25px 15px;
    }

    .admin_taital {
        font-size: 20px;
    }

    .admin_text {
        font-size: 13px;
    }

    .admin_btn {
        font-size: 14px;
    }

    .header_section {
        padding: 10px 0;
    }
}
/* ===== END ===== */
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


   /* Admin Section Styling */
   .admin_section {
      background-color: #f8f9fa;
      padding: 100px 0;
      min-height: 60vh;
   }

   .admin_login_card {
      background: #ffffff;
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      text-align: center;
      border-top: 8px solid #2D393B; /* ডার্ক অ্যাডমিন থিম */
   }

   .admin_icon {
      font-size: 70px;
      color: #2D393B;
      margin-bottom: 20px;
   }

   .admin_taital {
      font-size: 32px;
      color: #1a1a1a;
      font-weight: bold;
      margin-bottom: 10px;
   }

   .admin_text {
      color: #777;
      margin-bottom: 35px;
   }

   /* Form Styling */
   .admin_form .form-group {
      margin-bottom: 20px;
      position: relative;
   }

   .input_group {
      display: flex;
      align-items: center;
      background: #f1f1f1;
      border-radius: 30px;
      padding: 5px 20px;
   }

   .input_icon {
      color: #85A900;
      margin-right: 15px;
   }

   .admin_input {
      background: transparent !important;
      border: none !important;
      height: 45px;
      color: #333;
      font-size: 15px;
   }

   .admin_input:focus {
      box-shadow: none;
   }

   .remember_box {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      margin-bottom: 30px;
      color: #666;
   }

   .forgot_pw {
      color: #85A900;
      text-decoration: none;
   }

   /* Admin Button (Investment Style) */
   .admin_btn {
      background-color: #2D393B;
      color: #fff;
      width: 100%;
      padding: 14px;
      border-radius: 30px;
      border: none;
      font-size: 18px;
      font-weight: 600;
      transition: 0.3s;
      cursor: pointer;
   }

   .admin_btn:hover {
      background-color: #85A900;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(133, 169, 0, 0.3);
   }
 .admin_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
      </style>







<!-- Admin Portal Section Start -->
      <div class="admin_section layout_padding">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="admin_login_card">
               <div class="admin_icon"><i class="fa fa-user-circle-o"></i></div>
               <h1 class="admin_taital">Admin Login</h1>
               <p class="admin_text">Please enter your credentials to access the management dashboard.</p>
               
               @if($errors->any())
                  <div class="alert alert-danger" style="color: #dc3545; background-color: #f8d7da; border-color: #f5c6cb; padding: 10px; border-radius: 5px; margin-bottom: 15px; font-size: 14px;">
                     {{ $errors->first() }}
                  </div>
               @endif

               <form action="{{ route('admin.login.submit') }}" method="POST" class="admin_form">
                  @csrf <div class="form-group">
                     <div class="input_group">
                        <span class="input_icon"><i class="fa fa-envelope"></i></span>
                        <input type="email" name="email" class="form-control admin_input" placeholder="Admin Email" value="{{ old('email') }}" required>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="input_group">
                        <span class="input_icon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="password" class="form-control admin_input" placeholder="Password" required>
                     </div>
                  </div>
                  
                  <div class="btn_main">
                     <button type="submit" class="admin_btn">Login to Dashboard</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
      <!-- Admin Portal Section End -->

@endsection