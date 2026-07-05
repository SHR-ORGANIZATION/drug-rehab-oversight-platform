<x-app-layout>
    <div class="nxl-content">
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
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Welcome, Caregiver!</h4>
                            <p>You are now logged in. You can manage your patients and submit reports from here.</p>
                            <div class="mt-4">
                                <a href="{{ route('caregiver.patients') }}" class="btn btn-primary">View My Patients</a>
                                <a href="{{ route('caregiver.reports') }}" class="btn btn-secondary">Submit Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>