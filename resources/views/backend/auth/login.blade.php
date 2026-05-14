<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <style>
         /* ===== MOBILE RESPONSIVE ===== */
         body{
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    justify-content: center; /* left-right center */
    align-items: center;     /* top-bottom center */
  
}
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
  
      padding: 100px 0;
      min-height: 60vh;
   }

   .admin_login_card {
      background: #ffffff;
      padding: 50px 40px;
      width: 300px;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.1);
      text-align: center;
     border: 2px solid #85A900 !important; 
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
/* Input Focus Effect */
.input_group {
    display: flex;
    align-items: center;
    background: #f1f1f1;
    border-radius: 30px;
    padding: 5px 20px;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

/* যখন input এ click হবে */
.input_group:focus-within {
    border: 2px solid #85A900;
    box-shadow: 0 0 12px rgba(133, 169, 0, 0.4);
    transform: translateY(-2px);
}

/* Input default black outline remove */
.admin_input {
    background: transparent !important;
    border: none !important;
    outline: none !important;
    height: 45px;
    color: #333;
    font-size: 15px;
    width: 100%;
}

/* focus এ কালো border remove */
.admin_input:focus {
    box-shadow: none !important;
    outline: none !important;
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
      width: 40%;
      margin-top: 10px;
      padding: 14px;
      border-radius: 20px;
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

      </style>
</head>
<body>
    <!-- Admin Portal Section Start -->
      <div class="admin_section layout_padding">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="admin_login_card">
                     <div class="admin_icon"><i class="fa fa-user-circle-o"></i></div>
                     <h1 class="admin_taital">Admin Login</h1>
                     <p class="admin_text">Please enter your credentials to access the management dashboard.</p>
                     
                     <form action="{{ route('login') }}" method="POST" class="admin_form ">
                          @csrf
                        <div class="form-group">
                           <div class="input_group">
                              <span class="input_icon"><i class="fa fa-envelope"></i></span>
                              <input type="email" name="email" class="form-control admin_input" placeholder="Admin Email" required>
                           </div>
                              @error('email')
                        <small class="text-danger">{{ $message }}</small>
                     @enderror
                        </div>
                        <div class="form-group">
                           <div class="input_group">
                              <span class="input_icon"><i class="fa fa-lock"></i></span>
                              <input type="password" name="password" class="form-control admin_input" placeholder="Password" required>
                           </div>
                          
                       @error('password')
                        <small class="text-danger">{{ $message }}</small>
                     @enderror
                        </div>
                       
                        <div class="btn_main ">
                           <button type="submit" class="admin_btn">Login</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Admin Portal Section End -->
</body>
</html>