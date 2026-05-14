@extends('frontend.master')

@section('contant')
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <section class="slide-wrapper">
            <div class="container">
               <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                     <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                     <li data-target="#myCarousel" data-slide-to="1"></li>
                     <li data-target="#myCarousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="banner_taital_main">
                                    <h1 class="banner_taital">We Provid Landscaping</h1>
                                    <p class="banner_text">long established fact that a reader will be distracted by the
                                       readable content of a pagelong established fact that a reader will be distracted
                                       by the readable content of a page</p>
                                    <div class="btn_main">
                                       <div class="started_text"><a href="#">Read More</a></div>
                                       <div class="started_text active"><a href="#">Contact Us</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="banner_taital_main">
                                    <h1 class="banner_taital">We Provid Landscaping</h1>
                                    <p class="banner_text">long established fact that a reader will be distracted by the
                                       readable content of a pagelong established fact that a reader will be distracted
                                       by the readable content of a page</p>
                                    <div class="btn_main">
                                       <div class="started_text active"><a href="#">Read More</a></div>
                                       <div class="started_text"><a href="#">Contact Us</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-12">
                                 <div class="banner_taital_main">
                                    <h1 class="banner_taital">We Provid Landscaping</h1>
                                    <p class="banner_text">long established fact that a reader will be distracted by the
                                       readable content of a pagelong established fact that a reader will be distracted
                                       by the readable content of a page</p>
                                    <div class="btn_main">
                                       <div class="started_text active"><a href="#">Read More</a></div>
                                       <div class="started_text"><a href="#">Contact Us</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- banner section end -->
   </div>
   <!-- header section end -->
   <!-- year section start -->
   <div class="year_section">
      <div class="container">
         <div class="year_section_2">
            <div class="row">
               <div class="col-md-3">
                  <h1 class="year_taital active">25</h1>
                  <br><span class="year_text active">Year<br>Exciperince</span>
               </div>
               <div class="col-md-3">
                  <div class="year_taital">250<br><span class="year_text">Happy<br>Customers</span></div>
               </div>
               <div class="col-md-3">
                  <div class="year_taital">2+<br><span class="year_text">Our<br>Awards</span></div>
               </div>
               <div class="col-md-3">
                  <div class="year_taital">25<br><span class="year_text">Landscapeing<br>Work done</span></div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- year section end -->

   <div id="about" style="padding: 60px 0;">
      <div class="container">
         <div class="row align-items-center">

            <div class="col-md-6 about-content">
               <h2 class="about-title">About Moon <br><span class="span">Farm and Company</span></h2>
               <p class="about-text">
                  We provide high-quality agricultural and landscaping services.
                  Our mission is to help farmers and clients achieve better productivity
                  using modern techniques. Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam non modi
                  quidem itaque fugiat esse delectus veniam nobis amet iste in, autem facilis omnis repellendus quaerat
                  deserunt facere,
               </p>
               <a href="#" class="btn btn-about">Read More</a>
            </div>

            <!-- Image -->
            <div class="col-md-6 text-center">
               <img src="{{asset('frontend/images/about.png')}}" alt="About Image" style="max-width:100%; height:auto;">
            </div>

         </div>
      </div>
   </div>
   <!-- services section start -->
   <div class="services_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h1 class="services_taital">Our Services</h1>
            </div>
         </div>
         <div class="services_section_2">
            <div class="row">
               <div class="col-md-4">
                  <div class="box_main active">
                     <div class="service_img"><img src="{{asset('frontend/images/img-1.png')}}"></div>
                     <h4 class="development_text">Garden</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_main">
                     <div class="service_img"><img src="{{asset('frontend/images/img-2.png')}}"></div>
                     <h4 class="development_text">Planting & Upgarde</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_main">
                     <div class="service_img"><img src="{{asset('frontend/images/img-3.png')}}"></div>
                     <h4 class="development_text">Bonsol Core</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="services_section_2">
            <div class="row">
               <div class="col-md-4">
                  <div class="box_main">
                     <div class="service_img"><img src="{{asset('frontend/images/img-4.png')}}"></div>
                     <h4 class="development_text">Garden Maintenance</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_main">
                     <div class="service_img"><img src="{{asset('frontend/images/img-5.png')}}"></div>
                     <h4 class="development_text">Plant Water</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="box_main">
                     <div class="service_img"><img src="{{asset('frontend/images/img-6.png')}}"></div>
                     <h4 class="development_text">Plant Cuting</h4>
                     <p class="services_text">It is a long established fact that a reader will be distracted by the
                        readable content </p>
                     <div class="readmore_bt"><a href="#">Read More</a></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- services section end -->
   <!-- about sectuion start -->
   <div class="container">
      <div class="row mt-5">
         <div class="col-12" data-aos="fade-up">
            <div class="cta-box">
               <div class="row align-items-center">
                  <div class="col-lg-8">
                     <h3>Transform Your Vision Into Reality</h3>
                     <p>Partner with us to bring your ideas to life with innovative solutions tailored to your needs</p>
                  </div>
                  <div class="col-lg-4 text-lg-end text-center">
                     <a href="#contact" class="cta-btn">Start Your Project</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- about sectuion end -->
   <!-- client section start -->
   <div class="client_section layout_padding">
      <div class="container">
         <h1 class="client_taital">Customers says</h1>
         <div class="client_section_2 layout_padding">
            <div class="owl-carousel owl-theme">
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
               <div class="item">
                  <div class="client_box">
                     <div class="client_img"><img src="{{asset('frontend/images/client-img.png')}}"></div>
                     <h2 class="looking_text">When looking </h2>
                     <p class="dummy_text">It is a long established fact that a reader will be distracted by the
                        readable content using Lorem Ipsum is that it has a </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- client section end -->
   <!-- contact section start -->
   <div class="contact_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <h1 class="contact_taital">Requeste A call Back</h1>
            </div>
         </div>
      </div>
      <div class="contact_section_2 ">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="mail_section map_form_container">
                     <form action="">
                        <div class="row">
                           <div class="col-md-6 ">
                              <input type="text" class="mail_text" placeholder="Your Name" name="Your Name">
                           </div>
                           <div class="col-md-6">
                              <input type="text" class="mail_text" placeholder="Email" name="Email">
                           </div>
                           <div class="col-md-6">
                              <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number">
                           </div>
                           <div class="col-md-6">
                              <textarea class="massage-bt" placeholder="Message" rows="5" id="comment"
                                 name="Message"></textarea>
                           </div>
                        </div>
                        <div class="btn_main">
                           <div class="send_bt active"><a href="#">Send</a></div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- contact section end -->
   <!-- blog section start -->
   <div class="blog_section layout_padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h1 class="blog_taital">How We do work</h1>
            </div>
         </div>
         <div class="blog_section_2">
            <div class="row">
               <div class="col-md-12">
                  <div class="blog_img">
                     <div class="video_bt">
                        <div class="play_icon"><img src="{{asset('frontend/images/play-icon.png')}}"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- blog section end -->
@endsection