<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">RehabCare Dashboard</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Doctor Portal</li>
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
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <span class="reportrange-picker-field"></span>
                    </div>
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

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <!--! [Start] Statistic Cards - 4 Cards Only !-->
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-primary text-primary">
                                    <i class="feather-users"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $stats['totalPatients'] }}</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Patients</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fs-12 fw-medium text-muted">Registered patients in the system</span>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">+12%</span>
                                    <span class="fs-11 text-muted">from last month</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"></div>
                            </div>
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
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $stats['pendingReports'] }}</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Pending Reports</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fs-12 fw-medium text-muted">Reports awaiting doctor review</span>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">5</span>
                                    <span class="fs-11 text-muted">urgent</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%"></div>
                            </div>
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
                                    <i class="feather-check-circle"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $stats['completedReviews'] }}</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Completed Reviews</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fs-12 fw-medium text-muted">Reports reviewed this month</span>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">85%</span>
                                    <span class="fs-11 text-muted">completion rate</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xxl-3 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-soft-danger text-danger">
                                    <i class="feather-alert-triangle"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">{{ $stats['highRiskPatients'] }}</span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">High Risk Patients</h3>
                                </div>
                            </div>
                            <a href="javascript:void(0);" class="">
                                <i class="feather-more-vertical"></i>
                            </a>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="fs-12 fw-medium text-muted">Patients requiring immediate attention</span>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark">2</span>
                                    <span class="fs-11 text-muted">critical</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 60%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] Statistic Cards !-->
        </div>

        <div class="row">
            <!-- [Payment Records] start -->
            <div class="col-xxl-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Reports Submitted per Week</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips & Tricks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div id="payment-records-chart"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">This Week</div>
                                    <h6 class="fw-bold text-dark">24</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Last Week</div>
                                    <h6 class="fw-bold text-dark">18</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 55%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Total</div>
                                    <h6 class="fw-bold text-dark">156</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Payment Records] end -->
            
            <!-- [Total Sales] start -->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full overflow-hidden">
                    <div class="bg-primary text-white">
                        <div class="p-4">
                            <span class="badge bg-light text-primary text-dark float-end">12%</span>
                            <div class="text-start">
                                <h4 class="text-reset">{{ $stats['totalReports'] }}</h4>
                                <p class="text-reset m-0">Total Reports</p>
                            </div>
                        </div>
                        <div id="total-sales-color-graph"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3">
                                <div class="avatar-image avatar-lg p-2 rounded">
                                    <img class="img-fluid" src="{{ asset('assets/images/brand/shopify.png') }}" alt="" />
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="d-block">Reports Reviewed</a>
                                    <span class="fs-12 text-muted">This Month</span>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">{{ $stats['completedReviews'] }}</div>
                                <div class="fs-12 text-end">Completed</div>
                            </div>
                        </div>
                        <hr class="border-dashed my-3" />
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3">
                                <div class="avatar-image avatar-lg p-2 rounded">
                                    <img class="img-fluid" src="{{ asset('assets/images/brand/app-store.png') }}" alt="" />
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="d-block">Pending Review</a>
                                    <span class="fs-12 text-muted">Awaiting</span>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">{{ $stats['pendingReports'] }}</div>
                                <div class="fs-12 text-end">Reports</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center py-4">View Report Statistics</a>
                </div>
            </div>
            <!-- [Total Sales] end -->
        </div>

        <div class="row">
            <!--! [Start] Recent Caregiver Reports !-->
            <div class="col-xxl-4 col-lg-6">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Recent Caregiver Reports</h5>
                        <div class="card-header-action">
                            <a href="{{ route('admin.reports') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th scope="row">Patient</th>
                                        <th>Caregiver</th>
                                        <th>Report Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($recentReports as $report)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.reports.review', $report->id) }}">
                                                <span class="d-block">{{ $report->patient->full_name ?? 'N/A' }}</span>
                                                <span class="fs-12 d-block fw-normal text-muted">ID: {{ $report->patient->patient_id ?? 'N/A' }}</span>
                                            </a>
                                        </td>
                                        <td>{{ $report->caregiver->name ?? 'N/A' }}</td>
                                        <td>{{ $report->report_date->format('d/m/Y') }}</td>
                                        <td>
                                            <span class="badge bg-soft-{{ $report->status === 'pending' ? 'warning' : 'success' }} text-{{ $report->status === 'pending' ? 'warning' : 'success' }}">
                                                {{ ucfirst($report->status) }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.reports.review', $report->id) }}" class="btn btn-sm btn-{{ $report->status === 'pending' ? 'primary' : 'outline-primary' }}">
                                                {{ $report->status === 'pending' ? 'Review' : 'View' }}
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No reports yet</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] Recent Caregiver Reports !-->

            <!--! [Start] High Risk Patients !-->
            <div class="col-xxl-4 col-lg-6">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">High Risk Patients</h5>
                        <div class="card-header-action">
                            <a href="{{ route('admin.risks') }}" class="btn btn-sm btn-danger">Manage Risks</a>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th scope="row">Patient</th>
                                        <th>Risk Type</th>
                                        <th>Assigned Date</th>
                                        <th>Doctor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($highRiskReviews as $review)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.reports.review', $review->report->id ?? 0) }}">
                                                <span class="d-block">{{ $review->report->patient->full_name ?? 'N/A' }}</span>
                                                <span class="fs-12 d-block fw-normal text-muted">ID: {{ $review->report->patient->patient_id ?? 'N/A' }}</span>
                                            </a>
                                        </td>
                                        <td>
                                            @php
                                                $riskColors = ['low' => 'success', 'medium' => 'info', 'high' => 'warning', 'critical' => 'danger'];
                                                $riskColor = $riskColors[$review->risk_severity] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-soft-{{ $riskColor }} text-{{ $riskColor }}">{{ ucfirst($review->risk_severity) }}</span>
                                        </td>
                                        <td>{{ $review->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $review->doctor->name ?? 'N/A' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No high risk patients</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] High Risk Patients !-->

            <!--! [Start] Upcoming Appointments !-->
            <div class="col-xxl-4 col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Upcoming Appointments</h5>
                        <div class="card-header-action">
                            <a href="{{ route('admin.appointments') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th scope="row">Patient</th>
                                        <th>Caregiver</th>
                                        <th>Appointment Date</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($upcomingAppointments as $apt)
                                    <tr>
                                        <td>
                                            <div>
                                                <span class="d-block">{{ $apt->patient->full_name ?? 'N/A' }}</span>
                                                <span class="fs-12 d-block fw-normal text-muted">ID: {{ $apt->patient->patient_id ?? 'N/A' }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $apt->caregiver->name ?? 'N/A' }}</td>
                                        <td>{{ $apt->appointment_date->format('d/m/Y h:i A') }}</td>
                                        <td>
                                            @php
                                                $aptColors = ['pending' => 'warning', 'approved' => 'primary', 'rejected' => 'danger', 'completed' => 'success'];
                                                $aptColor = $aptColors[$apt->status] ?? 'secondary';
                                            @endphp
                                            <span class="badge bg-soft-{{ $aptColor }} text-{{ $aptColor }}">{{ ucfirst($apt->status) }}</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('admin.appointments') }}" class="btn btn-sm btn-outline-primary">View</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No upcoming appointments</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--! [End] Upcoming Appointments !-->
        </div>

        <div class="row">
            <!--! [Start] Recent Activity !-->
            <div class="col-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Recent Activity</h5>
                    </div>
                    <div class="card-body custom-card-action">
                        <ul class="list-unstyled activity-feed">
                            <li class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-text avatar-md bg-soft-primary text-primary rounded">
                                    <i class="feather-file-text"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Caregiver submitted report</div>
                                    <div class="fs-12 text-muted">Sarah Johnson submitted a report for patient Michael Chen</div>
                                    <div class="fs-11 text-muted">10 minutes ago</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-text avatar-md bg-soft-success text-success rounded">
                                    <i class="feather-check-circle"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Doctor reviewed report</div>
                                    <div class="fs-12 text-muted">Dr. {{ auth()->user()->name ?? 'John Smith' }} reviewed report for Emma Wilson</div>
                                    <div class="fs-11 text-muted">1 hour ago</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-text avatar-md bg-soft-info text-info rounded">
                                    <i class="feather-calendar"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Appointment scheduled</div>
                                    <div class="fs-12 text-muted">New appointment scheduled for James Miller with Lisa Anderson</div>
                                    <div class="fs-11 text-muted">2 hours ago</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3 mb-4">
                                <div class="avatar-text avatar-md bg-soft-danger text-danger rounded">
                                    <i class="feather-alert-triangle"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">Risk assigned</div>
                                    <div class="fs-12 text-muted">High risk assigned to patient John Smith for fall risk</div>
                                    <div class="fs-11 text-muted">3 hours ago</div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center gap-3">
                                <div class="avatar-text avatar-md bg-soft-warning text-warning rounded">
                                    <i class="feather-user-plus"></i>
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">New caregiver added</div>
                                    <div class="fs-12 text-muted">Robert Davis added to patient care team</div>
                                    <div class="fs-11 text-muted">5 hours ago</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--! [End] Recent Activity !-->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Reports per Week Chart (Bar Chart)
    if (document.getElementById('payment-records-chart')) {
        var options = {
            chart: {
                type: 'bar',
                height: 250,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Reports',
                data: [12, 18, 15, 22, 17, 25, 24]
            }],
            xaxis: {
                categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
            },
            colors: ['#3454d1'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false
                }
            }
        };
        var chart = new ApexCharts(document.querySelector("#payment-records-chart"), options);
        chart.render();
    }
    
    // Total Sales Chart (Area Chart - Blue)
    if (document.getElementById('total-sales-color-graph')) {
        var areaOptions = {
            chart: {
                type: 'area',
                height: 100,
                sparkline: {
                    enabled: true
                }
            },
            series: [{
                data: [12, 18, 15, 22, 17, 25, 24]
            }],
            colors: ['#ffffff'],
            stroke: {
                curve: 'smooth',
                width: 2
            }
        };
        var areaChart = new ApexCharts(document.querySelector("#total-sales-color-graph"), areaOptions);
        areaChart.render();
    }
});
</script>
@endpush