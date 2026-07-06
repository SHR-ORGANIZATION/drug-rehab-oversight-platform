<div>
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                @if(\Illuminate\Support\Facades\Auth::guard('caregiver')->check())
                    <a href="{{ route('caregiver.dashboard') }}" class="b-brand">
                @else
                    <a href="{{ route('admin.dashboard') }}" class="b-brand">
                @endif
                    <!-- ========   NexusCare Logo   ============ -->
                    <div class="d-flex align-items-center gap-2">
                        <div class="brand-icon" style="width: 36px; height: 36px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                            <span class="text-white fw-bold" style="font-size: 18px;">N</span>
                        </div>
                        <div>
                            <div style="font-size: 16px; font-weight: 700; color: #1a1a2e; line-height: 1.2;">NexusCare</div>
                            <div style="font-size: 9px; color: #6c757d; letter-spacing: 0.5px;">Clinical & Care</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">

                @if(\Illuminate\Support\Facades\Auth::guard('caregiver')->check())
                    {{-- ================================ --}}
                    {{-- CAREGIVER SIDEBAR MENU           --}}
                    {{-- ================================ --}}

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


                    <li class="nxl-item">
                        <a href="{{ route('admin.dashboard') }}" class="nxl-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <span class="nxl-micon"><i class="feather-home"></i></span>
                            <span class="nxl-mtext">Dashboard</span>
                        </a>
                    </li>


                    <!-- Doctor Management -->
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-activity"></i></span>
                            <span class="nxl-mtext">Doctor Management</span>
                            <span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item">
                                <a class="nxl-link {{ request()->routeIs('admin.doctors') ? 'active' : '' }}" href="{{ route('admin.doctors') }}">Doctor List</a>
                            </li>
                        </ul>
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

                @endif
                </ul>
            </div>
        </div>
    </nav>
</div>