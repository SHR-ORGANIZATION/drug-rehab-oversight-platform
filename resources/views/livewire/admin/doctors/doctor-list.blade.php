<div>
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Doctors</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Doctors</li>
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
                    <button wire:click="openCreateModal" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Add Doctor</span>
                    </button>
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
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="doctorList">
                                <thead>
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Reviews Done</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($doctors as $doctor)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);" class="hstack gap-3">
                                                <div class="avatar-image avatar-md">
                                                    @if($doctor->profile_image)
                                                        <img src="{{ asset('storage/' . $doctor->profile_image) }}" alt="{{ $doctor->name }}" class="img-fluid rounded-circle">
                                                    @else
                                                        <img src="{{ asset('assets/images/avatar/1.png') }}" alt="" class="img-fluid">
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="text-truncate-1-line">{{ $doctor->name }}</span>
                                                </div>
                                            </a>
                                        </td>
                                        <td><a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></td>
                                        <td><a href="tel:{{ $doctor->phone }}">{{ $doctor->phone ?? 'N/A' }}</a></td>
                                        <td>
                                            <span class="badge bg-soft-primary text-primary">{{ $doctor->reviews_count ?? 0 }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-soft-success text-success">Active</span>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <button wire:click="openEditModal({{ $doctor->id }})" class="avatar-text avatar-md" title="Edit">
                                                    <i class="feather feather-edit-3"></i>
                                                </button>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                        <i class="feather feather-more-horizontal"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <button class="dropdown-item" wire:click="openEditModal({{ $doctor->id }})">
                                                                <i class="feather feather-edit-3 me-3"></i>
                                                                <span>Edit</span>
                                                            </button>
                                                        </li>
                                                        <li class="dropdown-divider"></li>
                                                        <li>
                                                            <button class="dropdown-item text-danger" wire:click="deleteDoctor({{ $doctor->id }})" wire:confirm="Are you sure you want to delete this doctor?">
                                                                <i class="feather feather-trash-2 me-3"></i>
                                                                <span>Delete</span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4 text-muted">No doctors found.</td>
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

    {{-- Doctor Modal --}}
    @if($showModal)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" wire:click.self="closeModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $doctorId ? 'Edit Doctor' : 'Add New Doctor' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form wire:submit="saveDoctor" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Profile Image</label>
                                <div class="d-flex align-items-center gap-3">
                                    @if($profile_image)
                                        <img src="{{ $profile_image->temporaryUrl() }}" alt="Preview" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                                    @elseif($existingImage)
                                        <img src="{{ asset('storage/' . $existingImage) }}" alt="Current" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-soft-primary text-primary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="feather-user" style="font-size: 24px;"></i>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" wire:model="profile_image" accept="image/*">
                                </div>
                                @error('profile_image') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                                <small class="text-muted">Max 2MB. JPG, PNG or GIF.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name *</label>
                                <input type="text" class="form-control" placeholder="Enter doctor full name" wire:model="name">
                                @error('name') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email Address *</label>
                                <input type="email" class="form-control" placeholder="doctor@nexuscare.com" wire:model="email">
                                @error('email') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Enter phone number" wire:model="phone">
                                @error('phone') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Password {{ $doctorId ? '(leave blank to keep current)' : '*' }}</label>
                                <input type="password" class="form-control" placeholder="Enter password" wire:model="password">
                                @error('password') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-outline-secondary" wire:click="closeModal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                {{ $doctorId ? 'Update Doctor' : 'Save Doctor' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#doctorList').DataTable({
        dom: '<"row"<"col-md-6"l><"col-md-6"f>>rt<"row"<"col-md-6"i><"col-md-6"p>>',
        paging: true,
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        responsive: true
    });
});
</script>
@endpush
