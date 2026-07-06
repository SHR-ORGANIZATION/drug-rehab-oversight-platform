<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Edit Patient</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.patients') }}">Patients</a></li>
                <li class="breadcrumb-item">Edit Patient</li>
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
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" value="Michael Chen">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Patient ID *</label>
                                    <input type="text" class="form-control" value="P-00124" readonly>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Age *</label>
                                    <input type="number" class="form-control" value="45">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Gender *</label>
                                    <select class="form-select">
                                        <option>Male</option>
                                        <option selected>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Phone *</label>
                                    <input type="tel" class="form-control" value="+1 (375) 9632 548">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="michael.chen@example.com">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Caregiver *</label>
                                    <select class="form-select">
                                        <option selected>Sarah Johnson</option>
                                        <option>David Brown</option>
                                        <option>Lisa Anderson</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Admission Date *</label>
                                    <input type="date" class="form-control" value="2023-04-05">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" rows="3">123 Main Street, Dar es Salaam, Tanzania</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="feather-save me-2"></i>
                                        Update Patient
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>