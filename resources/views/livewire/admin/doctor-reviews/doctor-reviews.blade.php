<div>
    <!-- Page Header -->
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
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted fs-12 mb-1">Total Reports</h6>
                            <h4 class="fw-bold mb-0">{{ $stats['total'] }}</h4>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-primary text-primary rounded-circle fs-20">
                                <i class="feather-file-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted fs-12 mb-1">Pending Review</h6>
                            <h4 class="fw-bold mb-0 text-warning">{{ $stats['pending'] }}</h4>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-warning text-warning rounded-circle fs-20">
                                <i class="feather-clock"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted fs-12 mb-1">Reviewed</h6>
                            <h4 class="fw-bold mb-0 text-success">{{ $stats['reviewed'] }}</h4>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-success text-success rounded-circle fs-20">
                                <i class="feather-check-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="text-muted fs-12 mb-1">High/Critical Risk</h6>
                            <h4 class="fw-bold mb-0 text-danger">{{ $stats['high_risk'] }}</h4>
                        </div>
                        <div class="avatar-md">
                            <div class="avatar-title bg-soft-danger text-danger rounded-circle fs-20">
                                <i class="feather-alert-triangle"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="card stretch stretch-full mb-4">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="d-flex gap-2">
                        <button wire:click="$set('filter', 'all')" class="btn btn-sm {{ $filter === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">
                            All ({{ $stats['total'] }})
                        </button>
                        <button wire:click="$set('filter', 'pending')" class="btn btn-sm {{ $filter === 'pending' ? 'btn-warning' : 'btn-outline-secondary' }}">
                            Pending ({{ $stats['pending'] }})
                        </button>
                        <button wire:click="$set('filter', 'reviewed')" class="btn btn-sm {{ $filter === 'reviewed' ? 'btn-success' : 'btn-outline-secondary' }}">
                            Reviewed ({{ $stats['reviewed'] }})
                        </button>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="input-group">
                        <span class="input-group-text"><i class="feather-search"></i></span>
                        <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Search by patient name or ID...">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-md-end">
                        <select class="form-select w-auto" wire:model="perPage">
                            <option value="10">10 per page</option>
                            <option value="25">25 per page</option>
                            <option value="50">50 per page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports Table -->
    <div class="card stretch stretch-full">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4" wire:click="sortBy('report_date')" style="cursor: pointer;">
                                Report Date
                                @if($sortField === 'report_date')
                                    <i class="feather-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @endif
                            </th>
                            <th wire:click="sortBy('patient_id')" style="cursor: pointer;">
                                Patient
                                @if($sortField === 'patient_id')
                                    <i class="feather-arrow-{{ $sortDirection === 'asc' ? 'up' : 'down' }} ms-1"></i>
                                @endif
                            </th>
                            <th>Caregiver</th>
                            <th>Session Type</th>
                            <th>Pain Level</th>
                            <th>Functional Status</th>
                            <th>Risk</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold">{{ $report->report_date->format('d M Y') }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-image avatar-sm me-2">
                                        <img src="{{ asset('assets/images/avatar/1.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-0 fs-13">{{ $report->patient->full_name ?? 'N/A' }}</p>
                                        <small class="text-muted">{{ $report->patient->patient_id ?? '' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $report->caregiver->name ?? 'N/A' }}</td>
                            <td>
                                @if($report->session_type)
                                    <span class="badge bg-soft-secondary text-secondary">{{ $report->session_type }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($report->pain_level !== null)
                                    @php
                                        $painColor = $report->pain_level <= 3 ? 'success' : ($report->pain_level <= 6 ? 'warning' : 'danger');
                                    @endphp
                                    <span class="badge bg-soft-{{ $painColor }} text-{{ $painColor }}">
                                        {{ $report->pain_level }}/10
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($report->functional_status)
                                    @php
                                        $statusColors = ['improved' => 'success', 'stable' => 'info', 'declined' => 'danger'];
                                        $color = $statusColors[$report->functional_status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-soft-{{ $color }} text-{{ $color }}">
                                        {{ ucfirst($report->functional_status) }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($report->review && $report->review->risk_severity)
                                    @php
                                        $riskColors = ['low' => 'success', 'medium' => 'info', 'high' => 'warning', 'critical' => 'danger'];
                                        $riskColor = $riskColors[$report->review->risk_severity] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-soft-{{ $riskColor }} text-{{ $riskColor }}">
                                        {{ ucfirst($report->review->risk_severity) }}
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($report->status === 'pending')
                                    <span class="badge bg-soft-warning text-warning">Pending</span>
                                @else
                                    <span class="badge bg-soft-success text-success">Reviewed</span>
                                    @if($report->review && $report->review->review_status === 'draft')
                                        <br><small class="text-muted">(Draft)</small>
                                    @endif
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('admin.reports.review', $report->id) }}" class="btn btn-sm btn-{{ $report->status === 'pending' ? 'primary' : 'outline-primary' }}">
                                    <i class="feather-{{ $report->status === 'pending' ? 'eye' : 'edit' }} me-1"></i>
                                    {{ $report->status === 'pending' ? 'Review' : 'View' }}
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-5">
                                <div class="text-center">
                                    <i class="feather-file-text fs-1 text-muted mb-3" style="font-size: 48px;"></i>
                                    <h5 class="fs-16 fw-semibold">No reports found</h5>
                                    <p class="fs-12 text-muted">
                                        @if($search)
                                            No reports match your search "{{ $search }}".
                                        @else
                                            There are no caregiver reports waiting for review.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
        <div class="card-footer">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">
                    Showing {{ $reports->firstItem() }} to {{ $reports->lastItem() }} of {{ $reports->total() }} reports
                </small>
                {{ $reports->links() }}
            </div>
        </div>
        @endif
    </div>
</div>
