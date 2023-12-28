<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Shop')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ secure_url('client/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    @include('client.layouts.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    {{-- @include('client.layouts.navbar') --}}
    @if (!empty($showNavbar) && $showNavbar)
        @include('client.layouts.navbar')
    @endif
    
    <!-- Navbar End -->

    <!-- Featured End -->


    <!-- Categories Start -->

    <!-- Categories End -->

    @yield('content')
    <!-- Subscribe Start -->


    <!-- Vendor Start -->

    <!-- Vendor End -->


    <!-- Footer Start -->
    @include('client.layouts.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('client.layouts.javascript')
</body>

</html>
