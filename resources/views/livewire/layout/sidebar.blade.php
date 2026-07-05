<div>
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('admin.dashboard') }}" class="b-brand">
                    <!-- ========   RehabCare Logo   ============ -->
                    <img src="{{ asset('assets/images/logo-full.png') }}" alt="RehabCare Logo" class="logo logo-lg" />
                    <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="RehabCare Logo" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    {{-- <li class="nxl-item nxl-caption">
                        <label>Doctor Portal</label>
                        <span class="text-muted text-thin fs-10">RehabCare System</span>
                    </li> --}}
                    <li class="nxl-item">
                        <a href="{{ route('admin.dashboard') }}" class="nxl-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-home"></i></span>
                            <span class="nxl-mtext">Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- Patient Management -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">Patient Management</span>
                            <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <a class="nxl-link {{ request()->routeIs('patients') ? 'active' : '' }}" href="{{ route('patients') }}">Patient List</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Caregiver Management -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-plus"></i></span>
                            <span class="nxl-mtext">Caregiver Management</span>
                            <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <a class="nxl-link {{ request()->routeIs('caregivers') ? 'active' : '' }}" href="{{ route('caregivers') }}">Caregiver List</a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Reports -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-bar-chart-2"></i></span>
                            <span class="nxl-mtext">Reports</span>
                            <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <a class="nxl-link" href="{{ route('reports') }}">Caregiver Reports</a>
                            </li>
                            <li class="nxl-item">
                                <a class="nxl-link" href="{{ route('reports') }}">Reviewed Reports</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nxl-item">
                        <a href="{{ route('reports') }}" class="nxl-link {{ request()->routeIs('reports') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-star"></i></span>
                            <span class="nxl-mtext">Doctor Reviews</span>
                        </a>
                    </li>
                    
                    <li class="nxl-item">
                        <a href="{{ route('appointments') }}" class="nxl-link {{ request()->routeIs('appointments') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Appointments</span>
                        </a>
                    </li>
                    
                    <li class="nxl-item">
                        <a href="{{ route('risks') }}" class="nxl-link {{ request()->routeIs('risks') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-alert-triangle"></i></span>
                            <span class="nxl-mtext">Risk Types</span>
                        </a>
                    </li>
                    
                    <li class="nxl-item">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">Profile</span>
                        </a>
                    </li>
                    
                    <li class="nxl-item">
                        <a href="javascript:void(0);" wire:submit="logout" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-log-out"></i></span>
                            <span class="nxl-mtext">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>