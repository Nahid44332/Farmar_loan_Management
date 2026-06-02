@extends('frontend.master')

@section('contant')
    <style>
   /* ===== MOBILE RESPONSIVE ===== */
@media (max-width: 991px) {

    /* Title */
    .contact_taital {
        font-size: 26px;
    }

    /* Cards */
    .agent_card {
        padding: 30px 20px;
        margin-top: 20px;
    }

    .agent_icon {
        font-size: 45px;
    }

    .agent_card h2 {
        font-size: 20px;
    }

    .agent_card p {
        font-size: 14px;
    }

    /* Button */
    .btn_portal {
        padding: 10px 25px;
        font-size: 14px;
    }

    /* Stack cards (important) */
    .row.justify-content-center {
        flex-direction: column;
        align-items: center;
    }

    .col-md-5 {
        width: 100%;
        max-width: 400px;
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

    .contact_taital {
        font-size: 22px;
    }

    .agent_card {
        padding: 25px 15px;
    }

    .agent_card h2 {
        font-size: 18px;
    }

    .agent_card p {
        font-size: 13px;
    }

    .btn_portal {
        font-size: 13px;
    }

    /* Modal fix */
    .modal-dialog {
        margin: 10px;
    }
}
/* ===== END ===== */
   /* --- Header Section --- */
   .header_section {
      background-image: url('images/banner.jpg') !important; 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      padding: 15px 0;
      width: 100%;
      z-index: 999;
   }

   /* --- Agent Section Main Layout --- */
   .agent_section { 
      background: #fdfdfd; 
      padding: 90px 0; 
   }
   
   .contact_taital {
      font-size: 40px;
      color: #1f1f1f;
      font-weight: bold;
      text-transform: uppercase;
   }

   /* --- Agent & Login Cards --- */
   .agent_card {
      padding: 50px 30px;
      text-align: center;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.05);
      background: #fff;
      transition: all 0.4s ease-in-out;
      border-bottom: 6px solid #85A900;
      margin-top: 10px !important;
      height: 100%; /* কার্ডগুলো সমান রাখার জন্য */
   }

   .agent_card:hover { 
      transform: translateY(-10px); 
      box-shadow: 0 15px 40px rgba(0,0,0,0.1); 
   }

   .agent_icon { 
      font-size: 60px; 
      color: #85A900; 
      margin-bottom: 25px; 
   }

   /* --- Dark Theme Login Card --- */
   .login_card_bg { 
      background: #2D393B !important; 
      border-bottom: 6px solid #fff; 
   }
   
   .login_card_bg .agent_icon { 
      color: #fff !important; 
   }

   .login_card_bg h2, .login_card_bg p {
      color: #ffffff !important;
   }

   /* --- Investment Style Buttons --- */
   .btn_portal {
      background-color: #85A900;
      color: #fff !important;
      padding: 12px 40px;
      border-radius: 30px; /* ইনভেস্টমেন্ট পেজের মতো গোল */
      display: inline-block;
      font-weight: 600;
      font-size: 16px;
      border: none;
      transition: 0.3s;
      text-decoration: none !important;
      cursor: pointer;
      margin-top: 20px;
      box-shadow: 0 4px 15px rgba(133, 169, 0, 0.3);
   }

   .btn_portal:hover {
      background-color: #2D393B;
      color: #fff !important;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
   }

   /* লগইন কার্ডের ভেতর সাদা বাটন */
   .login_card_bg .btn_portal {
      background-color: #ffffff;
      color: #2D393B !important;
      box-shadow: 0 4px 15px rgba(255, 255, 255, 0.1);
   }

   .login_card_bg .btn_portal:hover {
      background-color: #85A900;
      color: #fff !important;
   }

   /* --- Form & Modal Styling --- */
   .form-control { 
      border-radius: 10px !important; 
      margin-bottom: 15px; 
      border: 1px solid #eee !important; 
      height: 45px;
      padding: 10px 20px;
   }

   .form-control:focus {
      border-color: #85A900 !important;
      box-shadow: none;
   }

   .modal-content {
      border-radius: 20px;
      border: none;
      overflow: hidden;
   }

   .modal-footer .btn_portal {
      width: 100%;
      margin-top: 0;
   }
   .agent_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/service-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
</style>




 <!-- Agent Portal Section Start -->
      <div class="agent_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="contact_taital text-center">Agent Portal</h1>
               </div>
            </div>

            <div class="row justify-content-center">
               <!-- Register as Agent Card -->
               <div class="col-md-5">
                  <div class="agent_card">
                     <div class="agent_icon"><i class="fa fa-briefcase"></i></div>
                     <h2>Join as Agent</h2>
                     <p>Help us identify the best farming projects and earn commissions on successful investments.</p>
                     <div class="btn_main">
                        <div class="send_bt active"><a href="#" data-toggle="modal" data-target="#agentRegisterModal">Register Now</a></div>
                     </div>
                  </div>
               </div>

               <!-- Agent Login Card -->
               <div class="col-md-5">
                  <div class="agent_card login_card_bg">
                     <div class="agent_icon icon_white"><i class="fa fa-unlock-alt"></i></div>
                     <h2 class="text-white">Agent Login</h2>
                     <p class="text-white">Access your dashboard to track your farmers, pending applications, and earnings.</p>
                     <div class="btn_main">
                        <div class="send_bt"><a href="#" data-toggle="modal" data-target="#agentLoginModal">Login Here</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Agent Registration Modal -->
      <div class="modal fade" id="agentRegisterModal" tabindex="-1">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header" style="background: #85A900; color: #fff;">
                  <h5 class="modal-title">Agent Recruitment Form</h5>
                  <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
               </div>
                 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
               <form action="{{ route('agent.register') }}" method="POST" enctype="multipart/form-data">
    
    @csrf
  
    <div class="modal-body">
        <div class="row">
            <div class="col-md-6 form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required value="{{ old('name') }}">
            </div>
            <div class="col-md-6 form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control" placeholder="01XXXXXXXXX" required value="{{ old('phone') }}">
            </div>
            <div class="col-md-6 form-group">
                <label>Working Area (District)</label>
                <input type="text" name="district" class="form-control" placeholder="e.g. Bogra, Rajshahi" required value="{{ old('district') }}">
            </div>
            <div class="col-md-6 form-group">
                <label>Experience (Years)</label>
                <input type="number" name="experience" class="form-control" placeholder="Years of experience" value="{{ old('experience') }}">
            </div>
            <div class="col-md-12 form-group">
                <label>Upload NID/ID Proof</label>
                <input type="file" name="nid_proof" class="form-control" style="padding: 5px;">
            </div>
            <div class="col-md-12 form-group">
                <label>Create Password</label>
                <input type="password" name="password" class="form-control" placeholder="Min 6 characters" required>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn" style="background: #85A900; color: #fff; border-radius: 25px; padding: 10px 40px; border:none;">Apply to Join</button>
    </div>
</form>
            </div>
         </div>
      </div>

      <!-- Agent Login Modal -->
      <div class="modal fade" id="agentLoginModal" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header" style="background: #2D393B; color: #fff;">
                  <h5 class="modal-title">Agent Dashboard Login</h5>
                  <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
               </div>
               <form action="{{route('agent.login')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone or Email" required>
                     </div>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-block" style="background: #2D393B; color: #fff; padding: 12px; border-radius: 10px; border:none;">Login</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Agent Portal Section End -->
@endsection