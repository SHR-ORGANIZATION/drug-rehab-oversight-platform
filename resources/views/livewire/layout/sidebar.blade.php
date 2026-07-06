<div>
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                @if(\Illuminate\Support\Facades\Auth::guard('caregiver')->check())
                    <a href="{{ route('caregiver.dashboard') }}" class="b-brand">
                @else
                    <a href="{{ route('admin.dashboard') }}" class="b-brand">
                @endif
                    <!-- ========   RehabCare Logo   ============ -->
                    <img src="{{ asset('assets/images/logo-full.png') }}" alt="RehabCare Logo" class="logo logo-lg" />
                    <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="RehabCare Logo" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">

                @if(\Illuminate\Support\Facades\Auth::guard('caregiver')->check())
                    {{-- ================================ --}}
                    {{-- CAREGIVER SIDEBAR MENU           --}}
                    {{-- ================================ --}}
                    <li class="nxl-item nxl-caption">
                        <label>Caregiver Portal</label>
                        <span class="text-muted text-thin fs-10">RehabCare System</span>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nxl-item">
                        <a href="{{ route('caregiver.dashboard') }}" class="nxl-link {{ request()->routeIs('caregiver.dashboard') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-home"></i></span>
                            <span class="nxl-mtext">Dashboard</span>
                        </a>
                    </li>

                    {{-- My Patients --}}
                    <li class="nxl-item">
                        <a href="{{ route('caregiver.patients') }}" class="nxl-link {{ request()->routeIs('caregiver.patients') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-users"></i></span>
                            <span class="nxl-mtext">My Patients</span>
                        </a>
                    </li>

                    {{-- Reports --}}
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-bar-chart-2"></i></span>
                            <span class="nxl-mtext">Reports</span>
                            <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <a class="nxl-link {{ request()->routeIs('caregiver.reports') ? 'active' : '' }}" href="{{ route('caregiver.reports') }}">My Reports</a>
                            </li>
                            <li class="nxl-item">
                                <a class="nxl-link {{ request()->routeIs('caregiver.reports.create') ? 'active' : '' }}" href="{{ route('caregiver.reports.create') }}">Submit New Report</a>
                            </li>
                        </ul>
                    </li>

                    {{-- Appointments --}}
                    <li class="nxl-item">
                        <a href="{{ route('caregiver.appointments') }}" class="nxl-link {{ request()->routeIs('caregiver.appointments') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Appointments</span>
                        </a>
                    </li>

                    {{-- Profile --}}
                    <li class="nxl-item">
                        <a href="{{ route('caregiver.profile') }}" class="nxl-link {{ request()->routeIs('caregiver.profile') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-user"></i></span>
                            <span class="nxl-mtext">My Profile</span>
                        </a>
                    </li>

                @else
                    {{-- ================================ --}}
                    {{-- DOCTOR (ADMIN) SIDEBAR MENU      --}}
                    {{-- ================================ --}}
                    <li class="nxl-item nxl-caption">
                        <label>Doctor Portal</label>
                        <span class="text-muted text-thin fs-10">RehabCare System</span>
                    </li>

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
                                <a class="nxl-link {{ request()->routeIs('admin.patients') ? 'active' : '' }}" href="{{ route('admin.patients') }}">Patient List</a>
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
                                <a class="nxl-link {{ request()->routeIs('admin.caregivers') ? 'active' : '' }}" href="{{ route('admin.caregivers') }}">Caregiver List</a>
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
                                <a class="nxl-link" href="{{ route('admin.reports') }}">Caregiver Reports</a>
                            </li>
                            <li class="nxl-item">
                                <a class="nxl-link" href="{{ route('admin.reports') }}">Reviewed Reports</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nxl-item">
                        <a href="{{ route('admin.reports') }}" class="nxl-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-star"></i></span>
                            <span class="nxl-mtext">Doctor Reviews</span>
                        </a>
                    </li>

                    <li class="nxl-item">
                        <a href="{{ route('admin.appointments') }}" class="nxl-link {{ request()->routeIs('admin.appointments') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-calendar"></i></span>
                            <span class="nxl-mtext">Appointments</span>
                        </a>
                    </li>

                    <li class="nxl-item">
                        <a href="{{ route('admin.risks') }}" class="nxl-link {{ request()->routeIs('admin.risks') ? 'active' : '' }}">
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
                @endif

                    {{-- Logout (shared) --}}
                    <li class="nxl-item">
                        <a href="javascript:void(0);" wire:click="$dispatch('logout')" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-log-out"></i></span>
                            <span class="nxl-mtext">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>