@extends('frontend.master')

@section('contant')
        <style>
         /* =========================
   RESET
========================= */
* {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
}

img {
   max-width: 100%;
   height: auto;
}

/* =========================
   HEADER RESPONSIVE
========================= */
.header_section {
   background-size: cover;
   background-position: center;
   background-repeat: no-repeat;
   padding: 15px 0;
}

.navbar-nav {
   text-align: right;
}

.nav-link {
   font-weight: 600;
}

/* =========================
   INVESTMENT SECTION
========================= */
.investment_section {
   padding: 90px 0;
}

.investment_taital {
   font-size: 40px;
   font-weight: bold;
   text-align: center;
}

/* =========================
   INVESTOR CARD
========================= */
.investor_card {
   padding: 40px 30px;
   border-radius: 15px;
   text-align: center;
   margin-bottom: 30px;
   transition: 0.3s;
}

.investor_card:hover {
   transform: translateY(-10px);
}

.card_icon {
   font-size: 50px;
   margin-bottom: 15px;
}

.card_title {
   font-size: 24px;
   font-weight: bold;
}

/* =========================
   BUTTON
========================= */
.btn_portal {
   display: inline-block;
   padding: 12px 35px;
   border-radius: 30px;
   font-weight: 600;
   text-decoration: none !important;
}

/* =========================
   FOOTER
========================= */
.footer_section {
   padding: 60px 0;
}

/* =========================
   TABLET (768px - 991px)
========================= */
@media (max-width: 991px) {

   .investment_taital {
      font-size: 30px;
   }

   .investor_card {
      padding: 30px;
   }

   .navbar-nav {
      text-align: center;
   }
}

/* =========================
   MOBILE (576px - 767px)
========================= */
@media (max-width: 767px) {

   .investment_section {
      padding: 60px 0;
   }

   .investment_taital {
      font-size: 24px;
   }

   .investor_card {
      padding: 25px;
   }

   .card_title {
      font-size: 20px;
   }

   .btn_portal {
      width: 100%;
      text-align: center;
   }
}

/* =========================
   SMALL MOBILE (below 576px)
========================= */
@media (max-width: 575px) {

   .investment_taital {
      font-size: 20px;
   }

   .investor_card {
      padding: 20px;
   }

   .card_icon {
      font-size: 40px;
   }

   p {
      font-size: 14px;
   }

   .btn_portal {
      width: 100%;
      font-size: 14px;
   }
}
         /* Header Background */
         .header_section {
            background-image: url('images/banner.jpg') !important; 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 15px 0;
            width: 100%;
            z-index: 999;
         }
         .bg-light { background-color: transparent !important; }
         .nav-link { color: #fff !important; }

         /* Investment Section Styling */
         .investment_section {
            padding: 90px 0;
            background-color: #f8f9fa;
         }
         
         .investment_taital {
            width: 100%;
            float: left;
            font-size: 40px;
            color: #1f1f1f;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
         }

         /* Investor Cards */
         .investor_card {
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            border-bottom: 5px solid #85A900;
         }
         .investor_card:hover {
            transform: translateY(-10px);
         }
         .card_icon {
            font-size: 50px;
            color: #85A900;
            margin-bottom: 20px;
         }
         .card_title { font-size: 24px; font-weight: bold; margin-bottom: 15px; }
         
         /* Button Style */
         .btn_portal {
            background-color: #85A900;
            color: #fff;
            padding: 12px 35px;
            border-radius: 30px;
            display: inline-block;
            font-weight: 600;
            border: none;
            transition: 0.3s;
            text-decoration: none !important;
         }
         .btn_portal:hover {
            background-color: #2D393B;
            color: #fff;
         }
.investment_section {
    /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
    background-image: url('/frontend/images/contact-bg.png'); 
    
    /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */
   
    background-repeat: no-repeat;    /* ইমেজটি বারবার রিপিট হবে না */
    
    /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */
   
}
         /* Modal Customization */
         .modal-content { border-radius: 20px; border: none; }
         .form-control { border-radius: 8px; height: 45px; margin-bottom: 15px; }
         .modal-header { background: #85A900; color: #fff; border-radius: 20px 20px 0 0; }
      </style>


 <!-- Investment Content Start -->
    <div class="investment_section">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
              <h1 class="investment_taital mt-5">Investor Portal</h1>
           </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px;">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" style="border-radius: 10px;">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
           <div class="col-lg-5 col-md-6">
              <div class="investor_card">
                 <div class="card_icon"><i class="fa fa-handshake-o"></i></div>
                 <h2 class="card_title">Become an Investor</h2>
                 <p>Join our platform to fund local farming projects and earn profitable returns.</p>
                 <a href="#" class="btn_portal" data-toggle="modal" data-target="#investorRegisterModal">Register Now</a>
              </div>
           </div>

           <div class="col-lg-5 col-md-6">
              <div class="investor_card" style="border-bottom-color: #2D393B;">
                 <div class="card_icon" style="color: #2D393B;"><i class="fa fa-sign-in"></i></div>
                 <h2 class="card_title">Investor Dashboard</h2>
                 <p>Access your portfolio, track project progress, and manage your earnings.</p>
                 <a href="#" class="btn_portal" style="background-color: #2D393B;" data-toggle="modal" data-target="#investorLoginModal">Login Here</a>
              </div>
           </div>
        </div>
    </div>
</div>

<div class="modal fade" id="investorRegisterModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title">Investor Registration</h5>
             <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
          </div>
          
          <form action="{{ route('investor.register') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="modal-body">
                <div class="row">
                   <div class="col-md-6">
                      <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                   </div>
                   <div class="col-md-6">
                      <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                   </div>
                   <div class="col-md-12">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                   </div>
                   <div class="col-md-6">
                      <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
                   </div>
                   <div class="col-md-6">
                      <select name="investment_range" class="form-control" required>
                         <option value="">Select Investment Range</option>
                         <option value="10k-50k" {{ old('investment_range') == '10k-50k' ? 'selected' : '' }}>৳ 10,000 - ৳ 50,000</option>
                         <option value="50k-200k" {{ old('investment_range') == '50k-200k' ? 'selected' : '' }}>৳ 50,000 - ৳ 200,000</option>
                         <option value="200k+" {{ old('investment_range') == '200k+' ? 'selected' : '' }}>৳ 200,000+</option>
                      </select>
                   </div>
                   
                   <div class="col-md-6">
                      <label class="text-secondary font-weight-bold small mb-1">NID Front Part</label>
                      <input type="file" name="nid_front" class="form-control" accept="image/*" required>
                   </div>
                   
                   <div class="col-md-6">
                      <label class="text-secondary font-weight-bold small mb-1">NID Back Part</label>
                      <input type="file" name="nid_back" class="form-control" accept="image/*" required>
                   </div>

                   <div class="col-md-12 mt-2">
                      <input type="password" name="password" class="form-control" placeholder="Password (Minimum 6 Characters)" required>
                   </div>
                </div>
             </div>
             <div class="modal-footer">
                <button type="submit" class="btn_portal">Submit Application</button>
             </div>
          </form>
       </div>
    </div>
</div>

      <!-- Login Modal -->
      <div class="modal fade" id="investorLoginModal" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header" style="background: #2D393B;">
                  <h5 class="modal-title">Investor Login</h5>
                  <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
               </div>
               <form>
                  <div class="modal-body">
                     <input type="email" class="form-control" placeholder="Email" required>
                     <input type="password" class="form-control" placeholder="Password" required>
                  </div>
                  <div class="modal-footer text-center">
                     <button type="submit" class="btn_portal" style="background:#2D393B; width: 100%;">Login</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
@endsection