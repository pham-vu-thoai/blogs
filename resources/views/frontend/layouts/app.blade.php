<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('/public/frontend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{url('/public/frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4a8ccdbc24.js" crossorigin="anonymous"></script>
  <!-- Vendor CSS Files -->
  <link href="{{url('/public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('/public/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('/public/frontend/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{url('/public/frontend/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('/public/frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="{{url('/public/frontend/assets/css/variables.css')}}" rel="stylesheet">
  <link href="{{url('/public/frontend/assets/css/main.css')}}" rel="stylesheet">
  <link href="{{ asset('/public/user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Theme CSS -->
  <link href="{{ asset('/public/user/css/clean-blog.min.css') }}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{ asset('/public/user/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- =======================================================
  * Template Name: ZenBlog
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->

</head>

<body>
  @include('frontend.layouts.header')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->
  @include('frontend.layouts.footer')

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('/public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('/public/frontend/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('/public/frontend/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('/public/frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('/public/frontend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('/public/frontend/assets/js/main.js')}}"></script>
  @yield('script')
</body>

</html>