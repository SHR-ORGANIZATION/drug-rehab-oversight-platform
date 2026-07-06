<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Clinical Review</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.reports') }}">Reports</a></li>
                <li class="breadcrumb-item">Review</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('admin.reports') }}" class="btn btn-outline-primary">
                    <i class="feather-arrow-left me-2"></i>
                    <span>Back to Reports</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <form wire:submit.prevent="finalizeReview">
            <!-- Patient & Report Info -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="feather-user me-2 text-primary"></i>Patient Information
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Patient ID</label>
                                    <p class="fw-bold mb-0">{{ $report->patient->patient_id ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Full Name</label>
                                    <p class="fw-bold mb-0">{{ $report->patient->full_name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Gender</label>
                                    <p class="fw-bold mb-0 text-capitalize">{{ $report->patient->gender ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Date of Birth</label>
                                    <p class="fw-bold mb-0">{{ $report->patient->date_of_birth ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Caregiver</label>
                                    <p class="fw-bold mb-0">{{ $report->caregiver->name ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Admission Date</label>
                                    <p class="fw-bold mb-0">{{ $report->patient->admission_date ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Report Date</label>
                                    <p class="fw-bold mb-0">{{ $report->report_date->format('d M Y') }}</p>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label text-muted fs-12">Report Status</label>
                                    <p class="mb-0">
                                        <span class="badge bg-soft-{{ $report->status === 'pending' ? 'warning' : 'success' }} text-{{ $report->status === 'pending' ? 'warning' : 'success' }}">
                                            {{ ucfirst($report->status) }}
                                        </span>
                                    </p>
                                </div>
                                @if($report->patient->medical_history)
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted fs-12">Medical History</label>
                                    <p class="mb-0">{{ $report->patient->medical_history }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caregiver Report Details -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="feather-file-text me-2 text-info"></i>Caregiver Report
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if($report->session_type)
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted fs-12">Session Type</label>
                                    <p class="fw-bold mb-0">{{ $report->session_type }}</p>
                                </div>
                                @endif
                                @if($report->functional_status)
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted fs-12">Functional Status</label>
                                    <p class="mb-0">
                                        @php
                                            $statusColors = ['improved' => 'success', 'stable' => 'info', 'declined' => 'danger'];
                                            $color = $statusColors[$report->functional_status] ?? 'secondary';
                                        @endphp
                                        <span class="badge bg-soft-{{ $color }} text-{{ $color }} fs-12">
                                            {{ ucfirst($report->functional_status) }}
                                        </span>
                                    </p>
                                </div>
                                @endif
                                @if($report->pain_level !== null)
                                <div class="col-md-4 mb-3">
                                    <label class="form-label text-muted fs-12">Pain Level</label>
                                    <p class="mb-0">
                                        @php
                                            $painColor = $report->pain_level <= 3 ? 'success' : ($report->pain_level <= 6 ? 'warning' : 'danger');
                                        @endphp
                                        <span class="badge bg-soft-{{ $painColor }} text-{{ $painColor }} fs-12">
                                            {{ $report->pain_level }}/10 -
                                            {{ $report->pain_level == 0 ? 'No Pain' : ($report->pain_level <= 3 ? 'Mild' : ($report->pain_level <= 6 ? 'Moderate' : 'Severe')) }}
                                        </span>
                                    </p>
                                </div>
                                @endif
                                @if($report->vital_signs)
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted fs-12">Vital Signs</label>
                                    <p class="fw-bold mb-0">{{ $report->vital_signs }}</p>
                                </div>
                                @endif
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted fs-12">Symptoms Observed</label>
                                    <div class="p-3 bg-light rounded">
                                        {{ $report->symptoms }}
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted fs-12">Rehabilitation Observations</label>
                                    <div class="p-3 bg-light rounded">
                                        {{ $report->observations }}
                                    </div>
                                </div>
                                @if($report->mood_behavior)
                                <div class="col-md-12 mb-3">
                                    <label class="form-label text-muted fs-12">Mood / Behavioral Observations</label>
                                    <div class="p-3 bg-light rounded">
                                        {{ $report->mood_behavior }}
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SOAP Notes Section -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="feather-edit-3 me-2 text-success"></i>Clinical Assessment (SOAP Notes)
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Subjective -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">
                                        <span class="badge bg-soft-primary text-primary me-1">S</span>
                                        Subjective Notes
                                        <small class="text-muted d-block mt-1">Patient's own account of their condition, symptoms, and concerns</small>
                                    </label>
                                    <textarea class="form-control" wire:model="subjective_notes" rows="3" placeholder="What the patient reports about their condition, pain, sleep, mood, etc..."></textarea>
                                    @error('subjective_notes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Objective -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">
                                        <span class="badge bg-soft-info text-info me-1">O</span>
                                        Objective Notes
                                        <small class="text-muted d-block mt-1">Clinical findings, observable data, examination results</small>
                                    </label>
                                    <textarea class="form-control" wire:model="objective_notes" rows="3" placeholder="Clinical findings, physical examination results, measurable observations..."></textarea>
                                    @error('objective_notes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Assessment -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">
                                        <span class="badge bg-soft-warning text-warning me-1">A</span>
                                        Assessment
                                        <small class="text-muted d-block mt-1">Your clinical assessment and diagnosis <span class="text-danger">*</span></small>
                                    </label>
                                    <textarea class="form-control" wire:model="assessment_notes" rows="4" placeholder="Clinical impression, diagnosis, progress evaluation, risk factors identified..."></textarea>
                                    @error('assessment_notes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Plan -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-bold">
                                        <span class="badge bg-soft-success text-success me-1">P</span>
                                        Treatment Plan
                                        <small class="text-muted d-block mt-1">Planned interventions and next steps <span class="text-danger">*</span></small>
                                    </label>
                                    <textarea class="form-control" wire:model="treatment_plan" rows="4" placeholder="Treatment approach, therapy modifications, interventions planned, referrals needed..."></textarea>
                                    @error('treatment_plan') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Risk Assessment & Classification -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="feather-alert-triangle me-2 text-danger"></i>Risk Assessment & Classification
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Risk Severity -->
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-semibold">Risk Severity <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="risk_severity">
                                        <option value="">-- Select Severity --</option>
                                        <option value="low">Low Risk</option>
                                        <option value="medium">Medium Risk</option>
                                        <option value="high">High Risk</option>
                                        <option value="critical">Critical Risk</option>
                                    </select>
                                    @error('risk_severity') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Risk Type -->
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-semibold">Risk Type</label>
                                    <select class="form-select" wire:model="risk_type_id">
                                        <option value="">-- Select Risk Type --</option>
                                        @foreach($riskTypes as $riskType)
                                            <option value="{{ $riskType['id'] }}">{{ $riskType['name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('risk_type_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- ICD-10 Code -->
                                <div class="col-md-4 mb-4">
                                    <label class="form-label fw-semibold">ICD-10 Code</label>
                                    <input type="text" class="form-control" wire:model="icd10_code" placeholder="e.g., F10.2, G80.0, M54.5">
                                    <small class="text-muted">International Classification of Diseases code</small>
                                    @error('icd10_code') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Doctor Notes -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">General Doctor Notes</label>
                                    <textarea class="form-control" wire:model="doctor_notes" rows="3" placeholder="Any additional clinical notes..."></textarea>
                                    @error('doctor_notes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Treatment Goals & Medication -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-header">
                            <h5 class="card-title">
                                <i class="feather-target me-2 text-primary"></i>Treatment Goals & Medication
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Treatment Goals -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Treatment Goals</label>
                                    <textarea class="form-control" wire:model="treatment_goals" rows="3" placeholder="Short-term and long-term rehabilitation goals..."></textarea>
                                    @error('treatment_goals') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Medication Changes -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Medication Changes</label>
                                    <textarea class="form-control" wire:model="medication_changes" rows="3" placeholder="Any adjustments to current medications, new prescriptions, or discontinuations..."></textarea>
                                    @error('medication_changes') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Recommendation -->
                                <div class="col-md-12 mb-4">
                                    <label class="form-label fw-semibold">Recommendation</label>
                                    <textarea class="form-control" wire:model="recommendation" rows="3" placeholder="Overall recommendation for the patient's rehabilitation plan..."></textarea>
                                    @error('recommendation') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>

                                <!-- Follow-up Date -->
                                <div class="col-md-6 mb-4">
                                    <label class="form-label fw-semibold">Follow-up Date</label>
                                    <input type="date" class="form-control" wire:model="follow_up_date" min="{{ date('Y-m-d') }}">
                                    @error('follow_up_date') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    @if($report->review && $report->review->review_status === 'finalized')
                                        <span class="badge bg-soft-success text-success fs-14 px-3 py-2">
                                            <i class="feather-check-circle me-1"></i> Finalized on {{ $report->review->reviewed_at->format('d M Y h:i A') }}
                                        </span>
                                    @elseif($report->review && $report->review->review_status === 'draft')
                                        <span class="badge bg-soft-warning text-warning fs-14 px-3 py-2">
                                            <i class="feather-edit me-1"></i> Draft saved
                                        </span>
                                    @endif
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('admin.reports') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="button" wire:click="saveDraft" class="btn btn-outline-primary">
                                        <i class="feather-save me-1"></i> Save Draft
                                    </button>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="feather-check-circle me-1"></i> Finalize Review
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
