<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">My Profile</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                        <form wire:submit="updateProfile" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Profile Image</label>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($profile_image)
                                            <img src="{{ $profile_image->temporaryUrl() }}" alt="Preview" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                        @elseif($existingImage)
                                            <img src="{{ asset('storage/' . $existingImage) }}" alt="Current" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-soft-primary text-primary d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                <i class="feather-user" style="font-size: 32px;"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <input type="file" class="form-control" wire:model="profile_image" accept="image/*">
                                            <small class="text-muted">Max 2MB. JPG, PNG or GIF.</small>
                                            @error('profile_image') <span class="text-danger fs-12 d-block">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
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
                                    <input type="text" class="form-control" value="Doctor" disabled>
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
                            @php $doctor = auth()->user(); @endphp
                            @if($doctor && $doctor->profile_image)
                                <img src="{{ asset('storage/' . $doctor->profile_image) }}" alt="Profile" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;" />
                            @else
                                <img src="{{ asset('assets/images/avatar/1.png') }}" alt="Profile" class="img-fluid rounded-circle" />
                            @endif
                        </div>
                        <h5 class="mb-1">Dr. {{ $doctor->name ?? 'Doctor' }}</h5>
                        <span class="badge bg-soft-success text-success mb-2">Doctor</span>
                        <p class="text-muted fs-13">{{ $doctor->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
