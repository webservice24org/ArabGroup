 <!DOCTYPE html>

<html lang="en">

<head>

  <!-- Meta Options -->

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



  <!-- Title -->

  <title>Homepage 1</title>



  <!-- Bootstrap -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/bootstrap.min.css')}}">

  <!-- Favicon -->

  <link rel="icon" type="image/x-icon" href="{{asset('front-asset/assets/images/heading-icon.png')}}">

  <!-- Owl Carousal -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/owl.theme.default.min.css')}}">

  <!-- Animate on scroll -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/aos.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/odometer.min.css')}}">

  <!-- Fancy Box -->

  <link rel="stylesheet" href="{{asset('front-asset/assets/css/jquery.fancybox.min.css')}}">

  <!-- Nice Select -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/nice-select.css')}}">

  <!-- Stylesheet -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/style.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/style-dark.css')}}">

  <!-- Colors -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/color.css')}}">


  <!-- Responsive -->

  <link rel="stylesheet" type="text/css" href="{{asset('front-asset/assets/css/responsive.css')}}">

  <!-- Font Awesome 5 -->

  <script src="https://kit.fontawesome.com/27a041baf1.js" crossorigin="anonymous"></script>

</head>
 
<body>
  <!-- Loader Start -->
  <div class="preloader"> 
    <figure>
      <img src="{{asset('front-asset/assets/images/Builty-Logo-Black-Home.svg')}}" alt="Image"> 
    </figure>
  </div>


  @include('frontend.parts.header')
  

  @yield('content')

@include('frontend.parts.footer')


  <button id="scrollTop" class="scrollTopStick">
    <i class="fa-solid fa-arrow-up"></i>
  </button>


  @include('frontend.parts.consult-model-home')
  @include('frontend.parts.price-model')

  <!-- Jquery -->

  <script src="{{asset('front-asset/assets/js/jquery.min.js')}}"></script>


  <!-- Waypoint -->

  <script src="{{asset('front-asset/assets/js/jquery.waypoints.min.js')}}"></script>


  <!-- Counter -->

   <script src="{{asset('front-asset/assets/js/odometer.min.js')}}"></script>

  <!-- Bootstrap Js -->

  <script src="{{asset('front-asset/assets/js/bootstrap.min.js')}}"></script>

  <!-- Fancybox Js -->

  <script src="{{asset('front-asset/assets/js/jquery.fancybox.min.js')}}"></script>

  <!-- Nice Select Js -->

  <script src="{{asset('front-asset/assets/js/jquery.nice-select.js')}}"></script>

  <!-- Animate on scroll Js -->

  <script src="{{asset('front-asset/assets/js/aos.js')}}"></script>

  <!-- Owl Carousal Js -->

  <script src="{{asset('front-asset/assets/js/owl.carousel.min.js')}}"></script>

  <!-- Custom Js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.6/gsap.min.js"></script>

  <!-- Custom Js -->

  <script src="{{asset('front-asset/assets/js/custom.js')}}"></script>
</body>

</html>
