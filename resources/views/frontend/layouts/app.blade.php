@include('frontend.layouts.head')
<body>

<!-- Page Wrapper -->
<div id="wrap" class="layout-9"> 
  
  <!-- Top bar -->
@include('frontend.layouts.topheader')
  
  <!-- Header -->
@include('frontend.layouts.header')
  
 @yield('content')
  <!-- End Content --> 
  
  <!-- Footer -->
  @include('frontend.layouts.footer')
  
  <!-- Rights -->
  <div class="rights">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Copyright © {{Carbon\Carbon::now()->format('Y')}} <a href="{{url('/')}}" class="ri-li"> HamroPasal Online Store </a>All rights reserved</p>
        </div>
        <div class="col-sm-6 text-right"> <img src="frontend/images/card-icon.png" alt=""> </div>
      </div>
    </div>
  </div>
  
  <!-- End Footer --> 
  
  <!-- GO TO TOP  --> 
  <a href="#" class="cd-top"><i class="fa fa-angle-up"></i></a> 
  <!-- GO TO TOP End --> 
</div>
<!-- End Page Wrapper --> 

<!-- JavaScripts --> 
<script src="{{ asset('frontend/js/vendors/jquery/jquery.min.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/wow.min.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/bootstrap.min.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/own-menu.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/jquery.sticky.js')}}"></script> 
<script src="{{ asset('frontend/js/vendors/owl.carousel.min.js')}}"></script> 

<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.t.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('frontend/rs-plugin/js/jquery.tp.min.js')}}"></script> 
<script src="{{ asset('frontend/js/main.js')}}"></script>
<script src="{{ asset('frontend/js/vendors/jquery.nouislider.min.js')}}"></script> 
<!-- Begin Map Script--> 
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script> 
<script src="{{ asset('frontend/js/vendors/map.js')}}"></script>
</body>
</html>