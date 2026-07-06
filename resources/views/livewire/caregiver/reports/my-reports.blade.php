<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">My Reports</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('caregiver.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">My Reports</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <a href="{{ route('caregiver.reports.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Submit New Report</span>
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
                        <!-- Filter -->
                        <div class="d-flex gap-2 mb-4">
                            <button wire:click="$set('filter', 'all')" class="btn btn-sm {{ $filter === 'all' ? 'btn-primary' : 'btn-outline-primary' }}">All</button>
                            <button wire:click="$set('filter', 'pending')" class="btn btn-sm {{ $filter === 'pending' ? 'btn-warning' : 'btn-outline-warning' }}">Pending</button>
                            <button wire:click="$set('filter', 'reviewed')" class="btn btn-sm {{ $filter === 'reviewed' ? 'btn-success' : 'btn-outline-success' }}">Reviewed</button>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Report Date</th>
                                        <th>Patient</th>
                                        <th>Symptoms</th>
                                        <th>Status</th>
                                        <th>Doctor's Notes</th>
                                        <th>Risk Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($reports as $report)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($report['report_date'])->format('d/m/Y') }}</td>
                                        <td>{{ $report['patient']['full_name'] ?? 'N/A' }}</td>
                                        <td><span class="text-truncate-1-line d-inline-block" style="max-width: 200px;">{{ Str::limit($report['symptoms'], 50) }}</span></td>
                                        <td>
                                            @if($report['status'] === 'reviewed')
                                                <span class="badge bg-soft-success text-success">Reviewed</span>
                                            @else
                                                <span class="badge bg-soft-warning text-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($report['review'] && $report['review']['doctor_notes'])
                                                <span class="fs-12 text-muted">{{ Str::limit($report['review']['doctor_notes'], 40) }}</span>
                                            @else
                                                <span class="fs-12 text-muted">—</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($report['review'] && $report['review']['risk_type'])
                                                @php
                                                    $riskName = $report['review']['risk_type']['name'] ?? 'N/A';
                                                    $riskClass = 'bg-soft-info text-info';
                                                    if (stripos($riskName, 'high') !== false) $riskClass = 'bg-soft-danger text-danger';
                                                    elseif (stripos($riskName, 'medium') !== false) $riskClass = 'bg-soft-warning text-warning';
                                                    elseif (stripos($riskName, 'low') !== false) $riskClass = 'bg-soft-success text-success';
                                                @endphp
                                                <span class="badge {{ $riskClass }}">{{ $riskName }}</span>
                                            @else
                                                <span class="fs-12 text-muted">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">
                                            No reports found. <a href="{{ route('caregiver.reports.create') }}">Submit your first report</a>
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
