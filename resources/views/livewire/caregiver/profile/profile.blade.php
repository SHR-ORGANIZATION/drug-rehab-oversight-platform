<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">My Profile</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Profile</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit="updateProfile">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" wire:model="name" placeholder="Enter your full name">
                                    @error('name') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" wire:model="email" placeholder="Enter your email">
                                    @error('email') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Phone</label>
                                    <input type="tel" class="form-control" wire:model="phone" placeholder="Enter your phone number">
                                    @error('phone') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Role</label>
                                    <input type="text" class="form-control" value="Caregiver" disabled>
                                    <span class="fs-11 text-muted">Role cannot be changed</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-save me-2"></i> Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card stretch stretch-full">
                    <div class="card-body text-center">
                        <div class="avatar-image avatar-xl mb-3">
                            <img src="{{ asset('assets/images/avatar/1.png') }}" alt="Profile" class="img-fluid rounded-circle" />
                        </div>
                        <h5 class="mb-1">{{ \Illuminate\Support\Facades\Auth::guard('caregiver')->user()->name ?? 'Caregiver' }}</h5>
                        <span class="badge bg-soft-info text-info mb-2">Caregiver</span>
                        <p class="text-muted fs-13">{{ \Illuminate\Support\Facades\Auth::guard('caregiver')->user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
