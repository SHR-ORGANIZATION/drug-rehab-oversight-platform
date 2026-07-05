<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Add Caregiver</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('caregivers') }}">Caregivers</a></li>
                <li class="breadcrumb-item">Add Caregiver</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="{{ route('caregivers') }}" class="btn btn-outline-primary">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back to Caregivers</span>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <form wire:submit="save">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" wire:model="name" placeholder="Enter full name">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" wire:model="email" placeholder="Enter email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" wire:model="phone" placeholder="Enter phone number">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Password *</label>
                                    <input type="password" class="form-control" wire:model="password" placeholder="Enter password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('caregivers') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Caregiver</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>