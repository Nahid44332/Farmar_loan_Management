@extends('frontend.master')

@section('contant')
    <style>
        /* ================= MOBILE RESPONSIVE ================= */

        /* Tablet */
        @media (max-width: 991px) {

            .header_section {
                padding: 10px 0;
            }

            .navbar-nav {
                text-align: center;
                margin-top: 15px;
            }

            .farmer_section {
                padding: 60px 0;
            }

            .choice_box {
                margin-bottom: 25px;
                padding: 30px 20px;
            }

            .approved_farmer_card {
                margin-top: 20px;
            }

            .modal-dialog {
                margin: 20px;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {

            .contact_taital {
                font-size: 26px;
                margin-bottom: 20px;
            }

            .choice_box h2 {
                font-size: 20px;
            }

            .choice_icon {
                font-size: 40px;
            }

            .approved_farmer_card img {
                width: 90px;
                height: 90px;
            }

            .approved_farmer_card h3 {
                font-size: 18px;
            }

            .farmer_desc {
                font-size: 13px;
            }

            .card_login_btn a {
                font-size: 13px;
                padding: 6px 20px;
            }

            .modal-content {
                border-radius: 15px;
            }

            .modal-body {
                padding: 15px;
            }

            .modal-footer button {
                width: 100%;
            }
        }

        /* Small Mobile */
        @media (max-width: 480px) {

            .contact_taital {
                font-size: 22px;
            }

            .choice_box {
                padding: 25px 15px;
            }

            .choice_box p {
                font-size: 14px;
            }

            .approved_farmer_card {
                padding: 20px;
            }

            .approved_farmer_card img {
                width: 80px;
                height: 80px;
            }

            .modal-dialog {
                margin: 10px;
            }
        }

        .header_section {
            /* আপনার নতুন ইমেজের পাথ এখানে দিন */
            background-image: url('images/banner.jpg') !important;

            background-size: cover;
            /* ইমেজটি পুরো সেকশন জুড়ে থাকবে */
            background-position: center;
            /* ইমেজটি মাঝখানে থাকবে */
            background-repeat: no-repeat;
            padding: 15px 0;
            /* উপরে নিচে একটু গ্যাপ থাকবে */
            width: 100%;
            z-index: 999;
        }

        /* Farmer Choice Boxes */
        .choice_box {
            padding: 40px;
            text-align: center;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: 0.4s;
            background: #fff;
            border-bottom: 6px solid #85A900;
        }

        .choice_box:hover {
            transform: translateY(-10px);
        }

        .choice_icon {
            font-size: 50px;
            color: #85A900;
            margin-bottom: 20px;
        }

        .choice_box h2 {
            color: #2D393B;
            font-weight: 700;
        }

        /* Approved Farmer Card Style */
        .approved_farmer_card {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            position: relative;
            margin-top: 30px;
            margin-bottom: 20px;
            border: 1px solid #eee;
        }

        .farmer_status {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #85A900;
            color: #fff;
            padding: 3px 12px;
            font-size: 12px;
            border-radius: 20px;
        }

        .approved_farmer_card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 4px solid #f8f9fa;
            object-fit: cover;
        }

        .approved_farmer_card h3 {
            color: #2D393B;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .farmer_desc {
            font-size: 14px;
            color: #777;
            margin: 15px 0;
        }

        .card_login_btn a {
            display: inline-block;
            padding: 8px 25px;
            background: #2D393B;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .card_login_btn a:hover {
            background: #85A900;
        }

        .modal-content input,
        .modal-content select {
            border-radius: 10px !important;
            border: 1px solid #ddd !important;
            padding: 10px !important;
        }

        .modal-content label {
            font-weight: 600;
            color: #2D393B;
            margin-top: 10px;
        }

        .modal-header .close {
            opacity: 1;
        }

        select.form-control {
            display: block !important;
            width: 100% !important;
            appearance: auto !important;
            -moz-appearance: auto !important;
            -webkit-appearance: auto !important;
        }

        .modal-content select {
            height: 45px !important;
            padding: 5px 10px !important;
            overflow: hidden !important;
        }

        /* Farmer Section Background Design */
        .farmer_section {
            /* ১. আপনার ইমেজের নাম এবং পাথ এখানে দিন */
            background-image: url('/frontend/images/contact-bg.png');

            /* ২. ইমেজটি স্ক্রিনের সাথে খাপ খাওয়াতে */

            background-repeat: no-repeat;
            /* ইমেজটি বারবার রিপিট হবে না */

            /* ৩. লেখা পরিষ্কার দেখানোর জন্য একটি হালকা কালো আবরণ (Overlay) */

        }
    </style>


    <div class="farmer_section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1 class="contact_taital text-center mt-5">Farmer Portal</h1>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="choice_box">
                        <div class="choice_icon"><i class="fa fa-user-plus"></i></div>
                        <h2>New Farmer?</h2>
                        <p>Create an account to submit your documents and apply for stock loans.</p>
                        <div class="btn_main">
                            <div class="send_bt active"><a href="#" data-toggle="modal"
                                    data-target="#registerModal">Register Now</a></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="choice_box login_bg">
                        <div class="choice_icon"><i class="fa fa-sign-in"></i></div>
                        <h2>Already Registered?</h2>
                        <p>Log in to check your loan status or manage your profile details.</p>
                        <div class="btn_main">
                            <div class="send_bt">
                                <a href="#" data-toggle="modal" data-target="#loginModal" style="color: #fff;">Login
                                    Here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #85A900; color: #fff;">
                            <h5 class="modal-title">Farmer Registration & Loan Application</h5>
                            <button type="button" class="close" data-dismiss="modal" style="color: #fff;">&times;</button>
                        </div>
                        <form action="{{ route('farmer.register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Full Name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="017XXXXXXXX"
                                            required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>NID Number</label>
                                        <input type="text" name="nid" class="form-control"
                                            placeholder="National ID Card Number" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Amount of Land (Decimals)</label>
                                        <input type="number" name="land_amount" class="form-control" placeholder="e.g. 50">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Loan Amount Needed (Tk)</label>
                                        <input type="number" name="loan_amount" class="form-control"
                                            placeholder="e.g. 50000" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Farming Category</label>
                                        <select name="category" class="form-control" required>
                                            <option value="" disabled selected>Select Category</option>
                                            <option value="crop">Crop Farming</option>
                                            <option value="poultry">Poultry</option>
                                            <option value="fishery">Fishery</option>
                                            <option value="dairy">Dairy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Farmer's Profile Image</label>
                                        <input type="file" name="farmer_image" class="form-control" accept="image/*"
                                            style="padding: 5px;">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Full Address</label>
                                        <textarea name="address" class="form-control" rows="2" placeholder="Village, Upazila, District" required></textarea>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Create a password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn"
                                    style="background: #85A900; color: #fff; border-radius: 25px; padding: 10px 40px;">Apply
                                    & Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="border-radius: 20px;">
                        <div class="modal-header" style="background: #2D393B; color: #fff; border-radius: 20px 20px 0 0;">
                            <h5 class="modal-title" id="loginModalLabel">Farmer Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="color: #fff;">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="017XXXXXXXX" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" required>
                                </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button type="submit" class="btn btn-block"
                                    style="background: #2D393B; color: #fff; padding: 12px; border-radius: 10px;">Login
                                    Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="margin_top90">

            <div class="row margin_top90">
                <div class="col-md-12">
                    <h2 class="contact_taital text-center" style="font-size: 30px;">Our Verified Farmers</h2>
                </div>

                @foreach ($farmers as $farmer)
                    <div class="col-lg-4 col-sm-6">

                        <div class="approved_farmer_card">

                            <div class="farmer_status">

                                Verified

                            </div>

                            <img src="{{ asset('/backend/images/farmer/' . $farmer->image) }}" alt="">

                            <h3>{{ $farmer->name }}</h3>

                            <p>

                                <i class="fa fa-map-marker"></i>

                                {{ $farmer->address }}

                            </p>

                            <p class="farmer_desc">

                                Category :
                                {{ $farmer->category }}

                            </p>

                            <div class="card_login_btn">

                                <a href="#">

                                    Loan :
                                    ৳{{ $farmer->loan_amount }}

                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
