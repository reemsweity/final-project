@extends('dashboard')

@section('title', 'Specializations')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Specializations Management</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Search and Filter Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchSpecializations" class="form-control w-50" placeholder="Search for specializations...">

        <!-- Filter by Status -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All Status</option>
            <option value=1>Active</option>
            <option value=0>Inactive</option>
        </select>
    </div>

    <a href="{{ route('admin.specializations.create') }}" class="btn btn-primary mb-3">Add Specialization</a>
    <div class="table-responsive">
    <table id="specializationsTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>icon</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Status Value (Hidden)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($specialization as $specializations)
                <tr class="text-center align-middle" data-status="{{ $specializations->is_active }}">
                    <td>{{ $specializations->id }}</td>
                   
                    <td>
                        @if ($specializations->icon)
                        <img src="{{ asset('storage/' . $specializations->icon) }}" alt="Icon" width="50">
                    @else
                        <span>No Icon</span>
                    @endif
                    </td>
                    <td>{{ Str::limit($specializations->name, 20) }}</td>
                    <td>{{ Str::limit($specializations->description, 40) }}</td>
                    <td>
                        @if($specializations->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="d-none">{{ $specializations->is_active }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.specializations.edit', $specializations->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <!-- Delete Button -->
                            
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No specializations found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>
</div>
@endsection

@section('styles')
<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
   $(document).ready(function() {
    // Initialize DataTable
    var table = $('#specializationsTable').DataTable({
        // Enable case-insensitive search
        search: {
            caseInsensitive: true
        },
        columnDefs: [
            {
                targets: 5, // Hidden column with the actual status value
                visible: false // Hide the status column
            }
        ]
    });

    // Search functionality for the table
    $('#searchSpecializations').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Filter by Status functionality
    $('#statusFilter').on('change', function() {
        var status = this.value;
        if (status === '') {
            table.column(5).search('').draw(); // Reset the filter
        } else {
            // Apply filter to the hidden status column (index 5)
            table.column(5).search('^' + status + '$', true, false).draw();
        }
    });
});


    function deleteSpecializations(specializationId) {
    // SweetAlert confirmation popup
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
            // If user confirms, submit the hidden delete form
            document.getElementById(`delete-form-${specializationId}`).submit();

            
        }
    });
}

</script>
@endsection
