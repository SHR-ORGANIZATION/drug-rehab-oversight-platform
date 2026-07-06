<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Appointments Management</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Appointments</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <button wire:click="openCreate" class="btn btn-primary">
                    <i class="feather-plus me-1"></i> New Appointment
                </button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Create/Edit Form -->
        @if($showForm)
        <div class="card stretch stretch-full mb-4">
            <div class="card-header">
                <h5 class="card-title">
                    <i class="feather-{{ $editingId ? 'edit' : 'calendar' }} me-2 text-primary"></i>
                    {{ $editingId ? 'Edit Appointment' : 'Schedule New Appointment' }}
                </h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Patient <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="patient_id">
                                <option value="">-- Select Patient --</option>
                                @foreach($patients as $patient)
                                    <option value="{{ $patient['id'] }}">{{ $patient['full_name'] }} ({{ $patient['patient_id'] }})</option>
                                @endforeach
                            </select>
                            @error('patient_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Caregiver <span class="text-danger">*</span></label>
                            <select class="form-select" wire:model="caregiver_id">
                                <option value="">-- Select Caregiver --</option>
                                @foreach($caregivers as $caregiver)
                                    <option value="{{ $caregiver['id'] }}">{{ $caregiver['name'] }}</option>
                                @endforeach
                            </select>
                            @error('caregiver_id') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Date & Time <span class="text-danger">*</span></label>
                            <input type="datetime-local" class="form-control" wire:model="appointment_date">
                            @error('appointment_date') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select" wire:model="status">
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="completed">Completed</option>
                            </select>
                            @error('status') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label fw-semibold">Purpose <span class="text-danger">*</span></label>
                            <textarea class="form-control" wire:model="purpose" rows="3" placeholder="Describe the purpose of this appointment..."></textarea>
                            @error('purpose') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="feather-save me-1"></i> {{ $editingId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <!-- Filters & Search -->
        <div class="card stretch stretch-full mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-5 mb-3 mb-md-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <button wire:click="$set('filter', 'all')" class="btn btn-sm {{ $filter === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">All</button>
                            <button wire:click="$set('filter', 'pending')" class="btn btn-sm {{ $filter === 'pending' ? 'btn-warning' : 'btn-outline-secondary' }}">Pending</button>
                            <button wire:click="$set('filter', 'upcoming')" class="btn btn-sm {{ $filter === 'upcoming' ? 'btn-info' : 'btn-outline-secondary' }}">Upcoming</button>
                            <button wire:click="$set('filter', 'completed')" class="btn btn-sm {{ $filter === 'completed' ? 'btn-success' : 'btn-outline-secondary' }}">Completed</button>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="input-group">
                            <span class="input-group-text"><i class="feather-search"></i></span>
                            <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Search by patient...">
                        </div>
                    </div>
                    <div class="col-md-3 text-md-end">
                        <span class="text-muted fs-13">{{ $appointments->total() }} appointment(s)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments Table -->
        <div class="card stretch stretch-full">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Patient</th>
                                <th>Caregiver</th>
                                <th>Date & Time</th>
                                <th>Purpose</th>
                                <th>Status</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($appointments as $apt)
                            <tr>
                                <td class="ps-4">{{ $appointments->firstItem() + $loop->index }}</td>
                                <td>
                                    <div>
                                        <p class="fw-bold mb-0 fs-13">{{ $apt->patient->full_name ?? 'N/A' }}</p>
                                        <small class="text-muted">{{ $apt->patient->patient_id ?? '' }}</small>
                                    </div>
                                </td>
                                <td>{{ $apt->caregiver->name ?? 'N/A' }}</td>
                                <td>
                                    <span class="fw-bold">{{ $apt->appointment_date->format('d M Y') }}</span>
                                    <br><small class="text-muted">{{ $apt->appointment_date->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <span class="text-truncate-1-line" style="max-width: 200px; display: inline-block;">{{ $apt->purpose }}</span>
                                </td>
                                <td>
                                    @php
                                        $statusColors = ['pending' => 'warning', 'approved' => 'primary', 'rejected' => 'danger', 'completed' => 'success'];
                                        $color = $statusColors[$apt->status] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-soft-{{ $color }} text-{{ $color }}">{{ ucfirst($apt->status) }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-1">
                                        @if($apt->status === 'pending')
                                        <button wire:click="updateStatus({{ $apt->id }}, 'approved')" class="btn btn-sm btn-outline-success" title="Approve">
                                            <i class="feather-check"></i>
                                        </button>
                                        <button wire:click="updateStatus({{ $apt->id }}, 'rejected')" class="btn btn-sm btn-outline-danger" title="Reject">
                                            <i class="feather-x"></i>
                                        </button>
                                        @endif
                                        @if($apt->status === 'approved')
                                        <button wire:click="updateStatus({{ $apt->id }}, 'completed')" class="btn btn-sm btn-outline-success" title="Mark Completed">
                                            <i class="feather-check-circle"></i>
                                        </button>
                                        @endif
                                        <button wire:click="openEdit({{ $apt->id }})" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="feather-edit"></i>
                                        </button>
                                        <button wire:click="delete({{ $apt->id }})" wire:confirm="Are you sure you want to delete this appointment?" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="feather-trash-2"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-center">
                                        <i class="feather-calendar fs-1 text-muted mb-3" style="font-size: 48px;"></i>
                                        <h5 class="fs-16 fw-semibold">No appointments found</h5>
                                        <p class="fs-12 text-muted">
                                            @if($search)
                                                No appointments match your search "{{ $search }}".
                                            @else
                                                Click "New Appointment" to schedule one.
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

            @if($appointments->hasPages())
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Showing {{ $appointments->firstItem() }} to {{ $appointments->lastItem() }} of {{ $appointments->total() }}</small>
                    {{ $appointments->links() }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
