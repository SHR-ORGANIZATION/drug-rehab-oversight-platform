<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

@php
    $isCaregiver = \Illuminate\Support\Facades\Auth::guard('caregiver')->check();
    $user = $isCaregiver
        ? \Illuminate\Support\Facades\Auth::guard('caregiver')->user()
        : auth()->user();
    $userTitle = $isCaregiver ? 'Caregiver' : 'Doctor';
    $userPrefix = $isCaregiver ? '' : 'Dr. ';
@endphp

<div>
   <header class="nxl-header">
        <div class="header-wrapper">
            <!--! [Start] Header Left !-->
            <div class="header-left d-flex align-items-center gap-4">
                <!--! [Start] nxl-head-mobile-toggler !-->
                <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <!--! [Start] nxl-head-mobile-toggler !-->
                <!--! [Start] nxl-navigation-toggle !-->
                <div class="nxl-navigation-toggle">
                    <a href="javascript:void(0);" id="menu-mini-button">
                        <i class="feather-align-left"></i>
                    </a>
                    <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
                <!--! [End] nxl-navigation-toggle !-->
                <!--! [Start] nxl-lavel-mega-menu-toggle !-->
                <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                    <a href="javascript:void(0);" id="nxl-lavel-mega-menu-open">
                        <i class="feather-align-left"></i>
                    </a>
                </div>
                <!--! [End] nxl-lavel-mega-menu-toggle !-->
                <div class="nxl-lavel-mega-menu">
                    <div class="nxl-lavel-mega-menu-toggle d-flex d-lg-none">
                        <a href="javascript:void(0)" id="nxl-lavel-mega-menu-hide">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--! [End] Header Left !-->
            
            <!--! [Start] Header Right !-->
            <div class="header-right ms-auto">
                <div class="d-flex align-items-center">
                    <!--! [Start] User Name !-->
                    <div class="dropdown nxl-h-item nxl-header-search">
                        <a href="javascript:void(0);" class="nxl-head-link me-0" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <span class="fs-14 fw-bold text-dark">{{ $userPrefix }}{{ $user->name ?? 'User' }}</span>
                        </a>
                    </div>
                    <!--! [End] User Name !-->
                    
                    <!--! [Start] Notifications !-->
                    <div class="dropdown nxl-h-item">
                        <a class="nxl-head-link me-3" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                            <i class="feather-bell"></i>
                            <span class="badge bg-danger nxl-h-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-notifications-menu">
                            <div class="d-flex justify-content-between align-items-center notifications-head">
                                <h6 class="fw-bold text-dark mb-0">Notifications</h6>
                                <a href="javascript:void(0);" class="fs-11 text-success text-end ms-auto" data-bs-toggle="tooltip" title="Mark all as Read">
                                    <i class="feather-check"></i>
                                    <span>Mark as Read</span>
                                </a>
                            </div>
                            <div class="notifications-item">
                                <div class="avatar-text avatar-md bg-soft-primary text-primary border-soft-primary rounded">
                                    <i class="feather-file-text"></i>
                                </div>
                                <div class="notifications-desc">
                                    <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">New caregiver report</span> Sarah Johnson submitted a new patient report for review.</a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notifications-date text-muted border-bottom border-bottom-dashed">10 minutes ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="notifications-item">
                                <div class="avatar-text avatar-md bg-soft-warning text-warning border-soft-warning rounded">
                                    <i class="feather-clock"></i>
                                </div>
                                <div class="notifications-desc">
                                    <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">Pending review</span> 2 reports waiting for your review.</a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notifications-date text-muted border-bottom border-bottom-dashed">1 hour ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="notifications-item">
                                <div class="avatar-text avatar-md bg-soft-info text-info border-soft-info rounded">
                                    <i class="feather-calendar"></i>
                                </div>
                                <div class="notifications-desc">
                                    <a href="javascript:void(0);" class="font-body text-truncate-2-line"> <span class="fw-semibold text-dark">Upcoming appointment</span> Patient consultation scheduled for tomorrow at 10:00 AM.</a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="notifications-date text-muted border-bottom border-bottom-dashed">2 hours ago</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center notifications-footer">
                                <a href="javascript:void(0);" class="fs-13 fw-semibold text-dark">View All Notifications</a>
                            </div>
                        </div>
                    </div>
                    <!--! [End] Notifications !-->
                    
                    <!--! [Start] Profile Menu !-->
                    <div class="dropdown nxl-h-item">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" role="button" data-bs-auto-close="outside">
                            <img src="{{ asset('assets/images/avatar/1.png') }}" alt="user-image" class="img-fluid user-avtar me-0" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end nxl-h-dropdown nxl-user-dropdown">
                            <div class="dropdown-header">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/avatar/1.png') }}" alt="user-image" class="img-fluid user-avtar" />
                                    <div>
                                        <h6 class="text-dark mb-0">{{ $userPrefix }}{{ $user->name ?? 'User' }} <span class="badge bg-soft-{{ $isCaregiver ? 'info' : 'success' }} text-{{ $isCaregiver ? 'info' : 'success' }} ms-1">{{ $userTitle }}</span></h6>
                                        <span class="fs-12 fw-medium text-muted">{{ $user->email ?? 'user@rehabcare.com' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            @if($isCaregiver)
                            <a href="{{ route('caregiver.profile') }}" class="dropdown-item">
                                <i class="feather-user"></i>
                                <span>Profile</span>
                            </a>
                            @else
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-user"></i>
                                <span>Profile</span>
                            </a>
                            @endif
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-settings"></i>
                                <span>Settings</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" wire:click="$dispatch('logout')" class="dropdown-item">
                                <i class="feather-log-out"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    <!--! [End] Profile Menu !-->
                </div>
            </div>
            <!--! [End] Header Right !-->
        </div>
    </header>
</div>