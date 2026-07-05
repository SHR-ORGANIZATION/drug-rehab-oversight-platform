<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Doctor Reviews</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Doctor Reviews</li>
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
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        <i class="feather-bar-chart"></i>
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

    <div class="bg-white py-3 border-bottom rounded-0 p-md-0 mb-0">
        <div class="d-md-none d-flex">
            <a href="javascript:void(0)" class="page-content-left-open-toggle">
                <i class="feather-align-left fs-20"></i>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="nav-tabs-wrapper page-content-left-sidebar-wrapper">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-content-left-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
                <ul class="nav nav-tabs nav-tabs-custom-style" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profileTab">All Reviews</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('appointments') }}">Appointments</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('patients') }}">Patients</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{ route('caregivers') }}">Care Givers</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="tab-content">
            <!-- All Reviews Tab -->
            <div class="tab-pane fade show active" id="profileTab" role="tabpanel">
                <div class="row">
                    @forelse($reports as $report)
                    <div class="col-lg-4 col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-image avatar-md">
                                        <img src="{{ asset('assets/images/avatar/1.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="mb-1"><a href="{{ route('patients.view', $report->patient->id ?? 0) }}">{{ $report->patient->full_name ?? 'N/A' }}</a></h5>
                                        <p class="text-muted mb-0">Patient</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Caregiver</label>
                                    <p><a href="{{ route('caregivers') }}">{{ $report->caregiver->name ?? 'N/A' }}</a></p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Report Date</label>
                                    <p>{{ $report->report_date }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Symptoms</label>
                                    <p class="text-truncate-2-line">{{ $report->symptoms }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Observations</label>
                                    <p class="text-truncate-2-line">{{ $report->observations }}</p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-soft-warning text-warning">Pending Review</span>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#viewReportModal-{{ $report->id }}">
                                        <i class="feather feather-eye me-1"></i>View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="text-center py-5">
                            <h4 class="fs-16 fw-semibold">No pending reports for review</h4>
                            <p class="fs-12 text-muted">There are no caregiver reports waiting for doctor review.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- View Report Modals -->
    @foreach($reports as $report)
    <div class="modal fade" id="viewReportModal-{{ $report->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Caregiver Report - {{ $report->patient->full_name ?? 'N/A' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Patient</label>
                            <p>{{ $report->patient->full_name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Caregiver</label>
                            <p>{{ $report->caregiver->name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Symptoms</label>
                            <p>{{ $report->symptoms }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Observations</label>
                            <p>{{ $report->observations }}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Doctor Notes</label>
                            <textarea class="form-control" rows="3" placeholder="Enter doctor notes"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Recommendation</label>
                            <textarea class="form-control" rows="3" placeholder="Enter recommendation"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Review</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Move modals to end of body to fix z-index issues
    $('.modal').each(function() {
        $(this).appendTo('body');
    });
});
</script>
@endpush