<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Patients</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Patients</li>
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
                    <div class="dropdown">
                        <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                            <i class="feather-filter"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-eye me-3"></i>
                                <span>All</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-users me-3"></i>
                                <span>Group</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-flag me-3"></i>
                                <span>Status</span>
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <i class="feather-calendar me-3"></i>
                                <span>Appointment</span>
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('admin.patients.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Add Patient</span>
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
    <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
        <div class="accordion-body pb-2">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-xl rounded">
                                        <i class="feather-users"></i>
                                    </div>
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="text-truncate-1-line">Total Patients</span>
                                        <span class="fs-24 fw-bolder d-block">{{ $patients->count() }}</span>
                                    </a>
                                </div>
                                <div class="badge bg-soft-success text-success">
                                    <i class="feather-arrow-up fs-10 me-1"></i>
                                    <span>36.85%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-xl rounded">
                                        <i class="feather-user-check"></i>
                                    </div>
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="text-truncate-1-line">Active Patients</span>
                                        <span class="fs-24 fw-bolder d-block">{{ $patients->where('status', 'Active')->count() }}</span>
                                    </a>
                                </div>
                                <div class="badge bg-soft-danger text-danger">
                                    <i class="feather-arrow-down fs-10 me-1"></i>
                                    <span>24.56%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-xl rounded">
                                        <i class="feather-user-plus"></i>
                                    </div>
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="text-truncate-1-line">New Patients</span>
                                        <span class="fs-24 fw-bolder d-block">12</span>
                                    </a>
                                </div>
                                <div class="badge bg-soft-success text-success">
                                    <i class="feather-arrow-up fs-10 me-1"></i>
                                    <span>33.29%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-text avatar-xl rounded">
                                        <i class="feather-alert-triangle"></i>
                                    </div>
                                    <a href="javascript:void(0);" class="fw-bold d-block">
                                        <span class="text-truncate-1-line">High Risk</span>
                                        <span class="fs-24 fw-bolder d-block">8</span>
                                    </a>
                                </div>
                                <div class="badge bg-soft-danger text-danger">
                                    <i class="feather-arrow-down fs-10 me-1"></i>
                                    <span>42.47%</span>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="patientList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="btn-group mb-1">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="custom-control-input" id="checkAllPatient">
                                                    <label class="custom-control-label" for="checkAllPatient"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Patient</th>
                                        <th>ID</th>
                                        <th>Age</th>
                                        <th>Caregiver</th>
                                        <th>Phone</th>
                                        <th>Admission Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patients as $patient)
                                    <tr class="single-item">
                                        <td>
                                            <div class="item-checkbox ms-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkbox" id="checkBox_{{ $patient->id }}">
                                                    <label class="custom-control-label" for="checkBox_{{ $patient->id }}"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.patients.view', $patient->id) }}" class="hstack gap-3">
                                                <div class="avatar-image avatar-md">
                                                    <img src="{{ asset('assets/images/avatar/1.png') }}" alt="" class="img-fluid">
                                                </div>
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $patient->full_name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><span class="text-truncate-1-line">{{ $patient->patient_id }}</span></td>
                                        <td>{{ $patient->age ?? \Carbon\Carbon::parse($patient->date_of_birth)->age ?? 'N/A' }}</td>
                                        <td>{{ $patient->caregiver->name ?? 'N/A' }}</td>
                                        <td><a href="tel:{{ $patient->phone }}">{{ $patient->phone }}</a></td>
                                        <td>{{ $patient->admission_date }}</td>
                                        <td>
                                            <span class="badge bg-soft-{{ $patient->status == 'Active' ? 'success' : 'danger' }} text-{{ $patient->status == 'Active' ? 'success' : 'danger' }}">{{ $patient->status }}</span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="{{ route('admin.patients.view', $patient->id) }}" class="avatar-text avatar-md">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.patients.edit', $patient->id) }}">
                                                                <i class="feather feather-edit-3 me-3"></i>
                                                                <span>Edit</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                <i class="feather feather-printer me-3"></i>
                                                                <span>Print</span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                <i class="feather feather-clock me-3"></i>
                                                                <span>Remind</span>
                                                            </a>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0)">
                                                                <i class="feather feather-trash-2 me-3"></i>
                                                                <span>Delete</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No patients found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/select2-active.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#patientList').DataTable({
        dom: '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
        paging: true,
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        responsive: true
    });
});
</script>
@endpush