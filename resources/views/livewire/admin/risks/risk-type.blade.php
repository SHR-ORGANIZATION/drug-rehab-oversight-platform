<div>
    <!-- Page Header -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Risk Type Management</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Risk Types</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <button wire:click="openCreate" class="btn btn-primary">
                    <i class="feather-plus me-1"></i> Add Risk Type
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
                    <i class="feather-{{ $editingId ? 'edit' : 'plus' }} me-2 text-primary"></i>
                    {{ $editingId ? 'Edit Risk Type' : 'Add New Risk Type' }}
                </h5>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="name" placeholder="e.g., Fall Risk, Relapse Risk">
                            @error('name') <span class="text-danger fs-12">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" wire:model="description" placeholder="Brief description of this risk type">
                            @error('description') <span class="text-danger fs-12">{{ $message }}</span> @enderror
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

        <!-- Search -->
        <div class="card stretch stretch-full mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-text"><i class="feather-search"></i></span>
                            <input type="text" class="form-control" wire:model.debounce.300ms="search" placeholder="Search risk types...">
                        </div>
                    </div>
                    <div class="col-md-6 text-md-end mt-3 mt-md-0">
                        <span class="text-muted fs-13">{{ $riskTypes->total() }} risk type(s) found</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Risk Types Table -->
        <div class="card stretch stretch-full">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Reviews Used In</th>
                                <th>Created</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riskTypes as $risk)
                            <tr>
                                <td class="ps-4">{{ $riskTypes->firstItem() + $loop->index }}</td>
                                <td>
                                    <span class="fw-bold">{{ $risk->name }}</span>
                                </td>
                                <td>{{ $risk->description }}</td>
                                <td>
                                    <span class="badge bg-soft-primary text-primary">{{ $risk->reviews_count }} review(s)</span>
                                </td>
                                <td>{{ $risk->created_at->format('d M Y') }}</td>
                                <td class="text-end pe-4">
                                    <button wire:click="openEdit({{ $risk->id }})" class="btn btn-sm btn-outline-primary me-1">
                                        <i class="feather-edit"></i>
                                    </button>
                                    <button wire:click="delete({{ $risk->id }})" wire:confirm="Are you sure you want to delete this risk type?" class="btn btn-sm btn-outline-danger">
                                        <i class="feather-trash-2"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <div class="text-center">
                                        <i class="feather-alert-triangle fs-1 text-muted mb-3" style="font-size: 48px;"></i>
                                        <h5 class="fs-16 fw-semibold">No risk types found</h5>
                                        <p class="fs-12 text-muted">Click "Add Risk Type" to create your first risk type.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if($riskTypes->hasPages())
            <div class="card-footer">
                {{ $riskTypes->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
