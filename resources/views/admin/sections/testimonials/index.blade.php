@extends('dashboard')

@section('title', 'Manage Testimonials')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Testimonials Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Custom Search and Filter -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchTestimonials" class="form-control w-50" placeholder="Search testimonials...">
        
        <!-- Status Filter -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary mb-3">Create New Testimonial</a>
    <div class="table-responsive">
    <table id="testimonialsTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Status</th>
                <th>Status Value (Hidden)</th> <!-- Hidden column for filtering -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->user->name }}</td>
                    <td>
                        <form action="{{ route('admin.testimonials.updateStatus', $testimonial->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="is_active" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="1" {{ $testimonial->is_active == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $testimonial->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </form>
                    </td>
                    <td class="d-none">{{ $testimonial->is_active }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                           
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No testimonials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $testimonials->links() }} <!-- Pagination -->
    </div>
    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        var table = $('#testimonialsTable').DataTable({
            searching: true,
            search: {
                caseInsensitive: true
            },
            columnDefs: [
                { targets: 3, visible: false } // Hide the status filter column
            ]
        });

        // Search functionality
        $('#searchTestimonials').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Status filter functionality
        $('#statusFilter').on('change', function() {
            var status = $(this).val();
            table.column(3).search(status ? '^' + status + '$' : '', true, false).draw();
        });
    });

    function deleteTestimonial(testimonialId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            if (result.isConfirmed) {
                // Find and submit the delete form
                var form = document.getElementById(`delete-form-${testimonialId}`);
                if (form) {
                    form.submit();
                } else {
                    console.error('Delete form not found for ID: ' + testimonialId);
                }
            }
        });
    }
</script>
@endsection
