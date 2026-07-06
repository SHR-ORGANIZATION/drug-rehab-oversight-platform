<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Submit Rehabilitation Report</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('caregiver.reports') }}">My Reports</a></li>
                <li class="breadcrumb-item">Submit Report</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('caregiver.reports') }}" class="btn btn-outline-primary">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back to Reports</span>
                </a>
            </div>
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
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <form wire:submit="save">
                            <div class="row">
                                <!-- Patient Selection -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Select Patient <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="patient_id">
                                        <option value="">-- Select Patient --</option>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient['id'] }}">{{ $patient['full_name'] }} ({{ $patient['patient_id'] }})</option>
                                        @endforeach
                                    </select>
                                    @error('patient_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Report Date -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Report Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" wire:model="report_date">
                                    @error('report_date') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Session Type -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Session Type</label>
                                    <select class="form-select" wire:model="session_type">
                                        <option value="">-- Select Session Type --</option>
                                        <option value="Physical Therapy">Physical Therapy</option>
                                        <option value="Occupational Therapy">Occupational Therapy</option>
                                        <option value="Speech Therapy">Speech Therapy</option>
                                        <option value="Counseling">Counseling</option>
                                        <option value="Group Therapy">Group Therapy</option>
                                        <option value="Recreational Therapy">Recreational Therapy</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    @error('session_type') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Functional Status -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Functional Status</label>
                                    <select class="form-select" wire:model="functional_status">
                                        <option value="">-- Select Status --</option>
                                        <option value="improved">Improved</option>
                                        <option value="stable">Stable</option>
                                        <option value="declined">Declined</option>
                                    </select>
                                    @error('functional_status') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Pain Level -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Pain Level (0-10)</label>
                                    <select class="form-select" wire:model="pain_level">
                                        <option value="">-- Select Pain Level --</option>
                                        @for($i = 0; $i <= 10; $i++)
                                            <option value="{{ $i }}">{{ $i }} - {{ $i == 0 ? 'No Pain' : ($i <= 3 ? 'Mild' : ($i <= 6 ? 'Moderate' : 'Severe')) }}</option>
                                        @endfor
                                    </select>
                                    @error('pain_level') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Vital Signs -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Vital Signs</label>
                                    <input type="text" class="form-control" wire:model="vital_signs" placeholder="e.g., BP: 120/80, Pulse: 72, Temp: 36.5°C">
                                    @error('vital_signs') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Symptoms -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Symptoms Observed <span class="text-danger">*</span></label>
                                    <textarea class="form-control" wire:model="symptoms" rows="4" placeholder="Describe the symptoms you observed during the rehabilitation session..."></textarea>
                                    @error('symptoms') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Observations -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Rehabilitation Observations <span class="text-danger">*</span></label>
                                    <textarea class="form-control" wire:model="observations" rows="4" placeholder="Describe your observations about the patient's rehabilitation progress..."></textarea>
                                    @error('observations') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Mood/Behavior -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Mood / Behavioral Observations</label>
                                    <textarea class="form-control" wire:model="mood_behavior" rows="3" placeholder="Describe the patient's mood, behavior, cooperation level, emotional state..."></textarea>
                                    @error('mood_behavior') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('caregiver.reports') }}" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-send me-2"></i> Submit Report
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
