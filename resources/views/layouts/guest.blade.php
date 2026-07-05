<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
        <!--! END: Favicon-->
        <!--! BEGIN: Bootstrap CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!--! END: Bootstrap CSS-->
        <!--! BEGIN: Vendors CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/daterangepicker.min.css') }}">
        <!--! END: Vendors CSS-->
        <!--! BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

     
    <!--! END: Favicon-->
    <!--! BEGIN: Bootstrap CSS-->

    <!--! END: Bootstrap CSS-->
    <!--! BEGIN: Vendors CSS-->

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">
    </head>
    <body>
 

                {{ $slot }}
        <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
       <!-- vendors.min.js {always must need to be top} -->
       <!--! END: Vendors JS !-->
       <!--! BEGIN: Apps Init  !-->
       <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
       <!--! END: Apps Init !-->
       <!--! BEGIN: Theme Customizer  !-->
       <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js') }}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    
    <script src="{{ asset('assets/js/dashboard-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    <!-- vendors.min.js {always must need to be top} -->
    <script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/select2-active.min.js') }}"></script>
    <!--! END: Vendors JS !-->
    <!--! BEGIN: Apps Init  !-->
    
    <script src="{{ asset('assets/js/customers-init.min.js') }}"></script>
    <!--! END: Apps Init !-->
    <!--! BEGIN: Theme Customizer  !-->
    <
    <!--! END: Theme Customizer !-->
     <!--! BEGIN: Favicon-->
    
    <!--! END: Vendors CSS-->
    <!--! BEGIN: Custom CSS-->
   
    
       <!--! END: Theme Customizer !-->
    </body>
</html>
