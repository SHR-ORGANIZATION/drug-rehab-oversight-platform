<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Add Patient</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('patients') }}">Patients</a></li>
                <li class="breadcrumb-item">Add Patient</li>
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
                    <a href="{{ route('patients') }}" class="btn btn-outline-primary">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back to Patients</span>
                    </a>
                </div>
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
                                    <input type="text" class="form-control" placeholder="Enter patient full name" wire:model="full_name">
                                    @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Patient ID *</label>
                                    <input type="text" class="form-control" placeholder="Enter patient ID" wire:model="patient_id">
                                    @error('patient_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Age *</label>
                                    <input type="number" class="form-control" placeholder="Enter age" wire:model="age">
                                    @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Gender *</label>
                                    <select class="form-select" wire:model="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Phone *</label>
                                    <input type="tel" class="form-control" placeholder="Enter phone number" wire:model="phone">
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Enter email" wire:model="email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Caregiver *</label>
                                    <select class="form-select" wire:model="caregiver_id">
                                        <option value="">Select Caregiver</option>
                                        @foreach($caregivers as $caregiver)
                                            <option value="{{ $caregiver->id }}">{{ $caregiver->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('caregiver_id') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Admission Date *</label>
                                    <input type="date" class="form-control" wire:model="admission_date">
                                    @error('admission_date') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter address" wire:model="address"></textarea>
                                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="feather-save me-2"></i>
                                        Save Patient
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>