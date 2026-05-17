   <!-- Javascript files-->
   <!-- Javascript files-->
   <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
   <script src="{{asset('frontend/js/popper.min.js')}}"></script>
   <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
   <script src="{{asset('frontend/js/jquery-3.0.0.min.js')}}"></script>
   {{-- <script src="{{asset('frontend/js/plugin.js')}}"></script> --}}
   <!-- sidebar -->
   <script src="{{asset('frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
   <script src="{{asset('frontend/js/custom.js')}}"></script>
   <script src="jquery.js"></script>
<script src="popper.js"></script>
<script src="bootstrap.js"></script>
   <!-- javascript -->
   <script src="{{asset('frontend/js/owl.carousel.js')}}"></script>
   <script>
      $('.owl-carousel').owlCarousel({
         loop: true,
         margin: 35,
         nav: true,
         center: true,
         responsive: {
            0: {
               items: 1,
               margin: 0
            },
            575: {
               items: 1,
               margin: 0
            },
            768: {
               items: 3,
               margin: 0
            },
            1000: {
               items: 3
            }
         }
      })

   </script>