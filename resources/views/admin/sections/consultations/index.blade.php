@extends('dashboard')

@section('title', 'Manage Consultations')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Consultations Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Custom Search Input -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Search Input -->
        <input type="text" id="searchReviews" class="form-control w-50" placeholder="Search for reviews...">
        
        <!-- Status Filter -->
        <select id="statusFilter" class="form-select w-25">
            <option value="">All</option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
            <option value="confirmed">confirmed</option>
        </select>
    </div>

    
    <table id="example" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>Title</th>
                <th>User</th>
                <th>Doctor</th>
                <th>Status</th>
                <th>Fee</th>
                <th>Status Value (Hidden)</th> <!-- Hidden column for filtering -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consultations as $consultation)
                <tr class="text-center align-middle">
                    <td>{{ Str::limit($consultation->title, 20) }}</td>
                    <td>{{ $consultation->user->name }}</td>
                    <td>{{ $consultation->doctor->name }}</td>
                    <td>
                        <span class="badge 
                            @if($consultation->status == 'pending') bg-warning 
                            @elseif($consultation->status == 'confirmed') bg-success 
                            @elseif($consultation->status == 'completed') bg-info 
                            @else bg-danger 
                            @endif">
                            {{ ucfirst($consultation->status) }}
                        </span>
                    </td>
                    <td>${{ number_format($consultation->fee, 2) }}</td>
                    <!-- Hidden column with the actual status value -->
                    <td class="d-none">{{ $consultation->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.consultations.show', $consultation->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection

@section('scripts')
<!-- Include DataTables Library -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize DataTable with custom search column for status
        var table = $('#example').DataTable({
            searching: true, // Enable global search
            search: {
                caseInsensitive: true // Make search case-insensitive
            },
            columnDefs: [
                {
                    targets: 5, // Target the hidden status column (index 5)
                    visible: false // Hide the status column
                }
            ]
        });

        // Custom Search Functionality
        $('#searchReviews').on('keyup', function() {
            table.search(this.value).draw(); // Perform search on table
        });

        // Custom Status Filter Functionality
        $('#statusFilter').on('change', function() {
            var selectedStatus = $(this).val();
            if (selectedStatus) {
                table.column(5).search('^' + selectedStatus + '$', true, false).draw(); // Filter based on the raw status value
            } else {
                table.column(5).search('').draw(); // Show all if no status is selected
            }
        });
    });
</script>

@endsection
