@php
    $footer = \App\Models\FooterSetting::first();
@endphp

<!-- footer section start -->
<div class="footer_section layout_padding">
   <div class="container">
      <div class="footer_section_2">
         <div class="row">

            <!-- CONTACT -->
            <div class="col-lg-3 col-sm-6">

               <h2 class="useful_text">Contact Us</h2>

               <div class="location_text">
                  <a href="#">
                     <i class="fa fa-map-marker"></i>
                     <span class="padding_left_15">
                        {{ $footer->location ?? 'Location not set' }}
                     </span>
                  </a>
               </div>

               <div class="location_text">
                  <a href="tel:{{ $footer->phone ?? '#' }}">
                     <i class="fa fa-phone"></i>
                     <span class="padding_left_15">
                        {{ $footer->phone ?? 'Phone not set' }}
                     </span>
                  </a>
               </div>

               <div class="location_text">
                  <a href="mailto:{{ $footer->email ?? '#' }}">
                     <i class="fa fa-envelope"></i>
                     <span class="padding_left_15">
                        {{ $footer->email ?? 'Email not set' }}
                     </span>
                  </a>
               </div>

               <!-- SOCIAL -->
               <div class="social_icon">
                  <ul>
                     <li><a href="{{ $footer->facebook ?? '#' }}"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="{{ $footer->twitter ?? '#' }}"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="{{ $footer->linkedin ?? '#' }}"><i class="fa fa-linkedin"></i></a></li>
                     <li><a href="{{ $footer->instagram ?? '#' }}"><i class="fa fa-instagram"></i></a></li>
                  </ul>
               </div>

            </div>

            <!-- LINKS (STATIC like your original) -->
            <div class="col-lg-3 col-sm-6">

               <h2 class="useful_text">Useful link</h2>

               <div class="footer_menu">
                  <ul>
                     <li class="active"><a href="{{ url('/') }}">Home</a></li>
                     <li><a href="{{ url('/about') }}">About</a></li>
                     <li><a href="{{ url('/service') }}">Service</a></li>
                     <li><a href="{{ url('/testimonial') }}">Testimonial</a></li>
                     <li><a href="#">Privacy Policy</a></li>
                     <li><a href="#">Terms & Conditions</a></li>
                     <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                  </ul>
               </div>

            </div>

            <!-- ABOUT -->
            <div class="col-lg-3 col-sm-6">

               <h2 class="useful_text">About</h2>

               <p class="lorem_text">
                  {{ $footer->about_text ?? 'No about information available yet.' }}
               </p>

            </div>

            <!-- NEWSLETTER -->
            <div class="col-lg-3 col-sm-6">

               <h2 class="useful_text">Newsletter</h2>

               <div class="form-group">

                  <textarea class="update_mail"
                     placeholder="Enter Your Email"
                     rows="5">{{ $footer->newsletter_text ?? '' }}</textarea>

                  <div class="subscribe_bt">
                     <a href="#">Subscribe</a>
                  </div>

               </div>

            </div>

         </div>
      </div>
   </div>
</div>


<div class="copyright_section">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">

            <p class="copyright_text">
               {{ date('Y') }} All Rights Reserved. 
               Design by 
               <a href="#" target="_blank">
                  Nusrat Jahan
               </a>
            </p>

         </div>
      </div>
   </div>
</div>
<!-- footer section end -->