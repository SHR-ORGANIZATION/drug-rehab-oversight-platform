<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Patient Details</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.patients') }}">Patients</a></li>
                <li class="breadcrumb-item">Patient Details</li>
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
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="modal" data-bs-target="#editPatientModal">
                        <i class="feather-edit"></i>
                    </a>
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="modal" data-bs-target="#deletePatientModal">
                        <i class="feather-trash-2"></i>
                    </a>
                    <a href="{{ route('admin.patients') }}" class="btn btn-outline-primary">
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
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <div class="avatar-image avatar-xxl mb-3">
                                    <img src="{{ asset('assets/images/avatar/1.png') }}" alt="" class="img-fluid">
                                </div>
                                <h4 class="mb-1">{{ $patient->full_name }}</h4>
                                <p class="text-muted">ID: {{ $patient->patient_id }}</p>
                                <span class="badge bg-soft-success text-success">{{ $patient->status }}</span>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Age</label>
                                        <p>{{ \Carbon\Carbon::parse($patient->date_of_birth)->age }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Gender</label>
                                        <p>{{ $patient->gender }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Phone</label>
                                        <p>{{ $patient->phone }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Email</label>
                                        <p>{{ $patient->email }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Caregiver</label>
                                        <p>{{ $patient->caregiver->name ?? 'N/A' }}</p>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Admission Date</label>
                                        <p>{{ $patient->admission_date }}</p>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Address</label>
                                        <p>{{ $patient->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Edit Patient Modal -->
    <div class="modal fade" id="editPatientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" value="{{ $patient->full_name }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Patient ID *</label>
                                <input type="text" class="form-control" value="{{ $patient->patient_id }}" readonly>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Age *</label>
                                <input type="number" class="form-control" value="{{ \Carbon\Carbon::parse($patient->date_of_birth)->age }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Gender *</label>
                                <select class="form-select">
                                    <option {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone *</label>
                                <input type="tel" class="form-control" value="{{ $patient->phone }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $patient->email }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Caregiver *</label>
                                <select class="form-select">
                                    <option selected>{{ $patient->caregiver->name ?? 'N/A' }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" value="{{ $patient->admission_date }}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" rows="3">{{ $patient->address }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Update Patient</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Patient Modal -->
    <div class="modal fade" id="deletePatientModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Patient</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete patient <strong>{{ $patient->full_name }}</strong>?</p>
                    <p class="text-danger">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete Patient</button>
                </div>
            </div>
        </div>
    </div>
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