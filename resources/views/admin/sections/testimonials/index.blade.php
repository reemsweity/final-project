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
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
            <option value="pending">Pending</option>
        </select>
    </div>

    <table id="testimonialsTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Doctor Name</th>
                <th>Testimonial</th>
                <th>Rating</th>
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
                    <td>{{ $testimonial->doctor->name }}</td>
                    <td>{{ Str::limit($testimonial->testimonial_text, 50) }}</td>
                    <td>{{ $testimonial->rating }}</td>
                    <td class="text-center">
                        <span class="badge bg-{{ $testimonial->status == 'approved' ? 'success' : ($testimonial->status == 'pending' ? 'warning' : 'danger') }}">
                            {{ ucfirst($testimonial->status) }}
                        </span>
                    </td>
                    <td class="d-none">{{ $testimonial->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.testimonials.show', $testimonial->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No testimonials found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $testimonials->links() }} <!-- Pagination -->
    </div>
</div>
@endsection

@section('styles')
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#testimonialsTable').DataTable({
            searching: true,
            search: {
                caseInsensitive: true
            },
            columnDefs: [
                { targets: 6, visible: false } // Hide the status filter column
            ]
        });

        // Search functionality
        $('#searchTestimonials').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Status filter functionality
        $('#statusFilter').on('change', function() {
            var status = $(this).val();
            table.column(6).search(status ? '^' + status + '$' : '', true, false).draw();
        });
    });
</script>
@endsection
