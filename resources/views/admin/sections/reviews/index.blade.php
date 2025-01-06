@extends('dashboard')

@section('title', 'Manage Reviews')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Reviews Management</h2>

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
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
            <option value="pending">Pending</option>
        </select>
    </div>
    <div class="table-responsive">
    <table id="reviewsTable" class="table table-sm table-striped table-bordered">
        <thead class="table-dark text-center">
            <tr>
                <th>Review ID</th>
                <th>User</th>
                <th>Doctor</th>
               
                
                <th>Status</th> 
                <th>Status Value (Hidden)</th> 
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->id }}</td>
                    <td>{{ $review->user->name }}</td>
                    <td>{{ $review->doctor->name }}</td>
                   
                    <td class="text-center">
                        <!-- Status Badge -->
                        @if($review->status == 'approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($review->status == 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @elseif($review->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <!-- Hidden status column for filtering -->
                    <td class="d-none">{{ $review->status }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <!-- Show Button -->
                            <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="fas fa-eye"></i>
                            </a>
                            <!-- Delete Button -->
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" id="delete-form-{{$review->id}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteReview({{$review->id}})">
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
        // Initialize DataTable with custom search column for status
        var table = $('#reviewsTable').DataTable({
            searching: true, // Enable global search
            search: {
                caseInsensitive: true // Make search case-insensitive
            },
            columnDefs: [
                {
                    targets: 4, // Target the hidden status column (index 6)
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
                table.column(4).search('^' + selectedStatus + '$', true, false).draw(); // Filter based on the raw status value
            } else {
                table.column(4).search('').draw(); // Show all if no status is selected
            }
        });
    });
    function deleteReview(reviewId) {
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
            document.getElementById(`delete-form-${reviewId}`).submit();

            
        }
    });
}

</script>
@endsection
