<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Caregiver Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Dashboard</li>
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

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-primary text-primary">
                                    <i class="feather-users"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">{{ $myPatientsCount }}</div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">My Patients</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <span class="fs-12 fw-medium text-muted">Patients under my care</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-success text-success">
                                    <i class="feather-file-text"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">{{ $myReportsCount }}</div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Reports Submitted</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <span class="fs-12 fw-medium text-muted">Total reports submitted</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-warning text-warning">
                                    <i class="feather-clock"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">{{ $pendingReportsCount }}</div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Pending Reports</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <span class="fs-12 fw-medium text-muted">Awaiting doctor review</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-info text-info">
                                    <i class="feather-calendar"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">{{ $upcomingAppointmentsCount }}</div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Upcoming Appointments</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <span class="fs-12 fw-medium text-muted">Scheduled appointments</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Reports + Quick Actions -->
        <div class="row">
            <div class="col-xxl-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">My Recent Reports</h5>
                        <div class="card-header-action">
                            <a href="{{ route('caregiver.reports') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th>Patient</th>
                                        <th>Report Date</th>
                                        <th>Status</th>
                                        <th>Doctor's Feedback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentReports as $report)
                                    <tr>
                                        <td>{{ $report['patient']['full_name'] ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($report['report_date'])->format('d/m/Y') }}</td>
                                        <td>
                                            @if($report['status'] === 'reviewed')
                                                <span class="badge bg-soft-success text-success">Reviewed</span>
                                            @else
                                                <span class="badge bg-soft-warning text-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($report['review'])
                                                <span class="fs-12 text-muted">{{ Str::limit($report['review']['doctor_notes'] ?? 'No notes', 40) }}</span>
                                            @else
                                                <span class="fs-12 text-muted">Awaiting review</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No reports submitted yet. <a href="{{ route('caregiver.reports.create') }}">Submit your first report</a></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            <a href="{{ route('caregiver.reports.create') }}" class="btn btn-primary">
                                <i class="feather-plus me-2"></i> Submit New Report
                            </a>
                            <a href="{{ route('caregiver.patients') }}" class="btn btn-outline-primary">
                                <i class="feather-users me-2"></i> View My Patients
                            </a>
                            <a href="{{ route('caregiver.appointments') }}" class="btn btn-outline-secondary">
                                <i class="feather-calendar me-2"></i> View Appointments
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Appointments -->
                <div class="card stretch stretch-full mt-4">
                    <div class="card-header">
                        <h5 class="card-title">Upcoming Appointments</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th>Patient</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($upcomingAppointments as $appt)
                                    <tr>
                                        <td>{{ $appt['patient']['full_name'] ?? 'N/A' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appt['appointment_date'])->format('d/m/Y H:i') }}</td>
                                        <td><span class="badge bg-soft-primary text-primary">{{ ucfirst($appt['status'] ?? 'pending') }}</span></td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-3 text-muted">No upcoming appointments</td>
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
