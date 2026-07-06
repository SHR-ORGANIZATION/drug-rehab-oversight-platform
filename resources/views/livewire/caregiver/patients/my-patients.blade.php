<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">My Patients</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">My Patients</li>
            </ul>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <!-- Search -->
                        <div class="mb-4">
                            <input type="text" class="form-control" wire:model.live="search" placeholder="Search by patient name or ID...">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th>Full Name</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>Phone</th>
                                        <th>Admission Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($patients as $patient)
                                    <tr>
                                        <td><span class="fw-bold">{{ $patient['patient_id'] }}</span></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-text avatar-md bg-soft-primary text-primary rounded-circle">
                                                    {{ strtoupper(substr($patient['full_name'], 0, 1)) }}
                                                </div>
                                                <div>
                                                    <span class="d-block">{{ $patient['full_name'] }}</span>
                                                    @if($patient['email'])
                                                    <span class="fs-12 text-muted">{{ $patient['email'] }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ ucfirst($patient['gender'] ?? 'N/A') }}</td>
                                        <td>{{ $patient['date_of_birth'] ? \Carbon\Carbon::parse($patient['date_of_birth'])->format('d/m/Y') : 'N/A' }}</td>
                                        <td>{{ $patient['phone'] ?? 'N/A' }}</td>
                                        <td>{{ $patient['admission_date'] ? \Carbon\Carbon::parse($patient['admission_date'])->format('d/m/Y') : 'N/A' }}</td>
                                        <td>
                                            @if(($patient['status'] ?? '') === 'active')
                                                <span class="badge bg-soft-success text-success">Active</span>
                                            @else
                                                <span class="badge bg-soft-secondary text-secondary">{{ ucfirst($patient['status'] ?? 'N/A') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            No patients found under your care.
                                        </td>
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
