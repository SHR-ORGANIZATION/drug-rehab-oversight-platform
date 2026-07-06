<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">My Appointments</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Appointments</li>
            </ul>
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Appointment Date</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appt)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar-text avatar-md bg-soft-primary text-primary rounded-circle">
                                                    {{ strtoupper(substr($appt['patient']['full_name'] ?? '?', 0, 1)) }}
                                                </div>
                                                <span>{{ $appt['patient']['full_name'] ?? 'N/A' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            @if($appt['doctor'])
                                                Dr. {{ $appt['doctor']['name'] }}
                                            @else
                                                <span class="text-muted">Not assigned</span>
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($appt['appointment_date'])->format('d/m/Y H:i') }}</td>
                                        <td>{{ $appt['purpose'] ?? 'N/A' }}</td>
                                        <td>
                                            @php
                                                $statusClass = match($appt['status'] ?? '') {
                                                    'approved' => 'bg-soft-primary text-primary',
                                                    'completed' => 'bg-soft-success text-success',
                                                    'rejected' => 'bg-soft-danger text-danger',
                                                    default => 'bg-soft-warning text-warning',
                                                };
                                            @endphp
                                            <span class="badge {{ $statusClass }}">{{ ucfirst($appt['status'] ?? 'pending') }}</span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No appointments found.
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
