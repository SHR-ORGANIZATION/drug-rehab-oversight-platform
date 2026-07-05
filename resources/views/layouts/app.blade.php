<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'REHUB') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!--start new vicoba-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/daterangepicker.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <!-- Page-specific Styles -->
    @stack('styles')
    
</head>

<body>
    <!-- Toast Notifications (must be at top for proper z-index) -->
    {{-- <div style="position: relative; z-index: 9999;">
        <x-toast-notification />
    </div> --}}
    
    <!-- Sidebar Navigation -->
    <livewire:layout.sidebar />

    <!-- Top Header Navigation -->
    <livewire:layout.navigation />

    <!-- Main Content Area -->
    <main class="nxl-container {{ request()->routeIs('settings.*') ? 'apps-container' : '' }}">
        <div class="nxl-content {{ request()->routeIs('settings.*') ? 'without-header nxl-full-content' : '' }}">
            {{ $slot }}
        </div>
        
        <livewire:layout.footer />

    </main>

    <!-- Modal Container (at body level for proper z-index - outside blur area) -->
    <div id="modal-container"></div>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme-customizer-init.min.js') }}"></script>
    
    <!-- Dashboard Scripts (Only load on dashboard page) -->
    @if(request()->routeIs('dashboard') || request()->is('/'))
    <script src="{{ asset('assets/js/dashboard-init.min.js') }}"></script>
    @endif
    
    <!-- Page-specific Scripts -->
    @stack('scripts')
    
    <!-- Modal Stack (for proper z-index) -->
    @stack('modals')
    
    @livewireScripts
    
</body>

</html>