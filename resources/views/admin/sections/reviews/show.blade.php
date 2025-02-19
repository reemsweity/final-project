@extends('dashboard')

@section('title', 'Review Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Review Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Review Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $review->doctor->name }}</h5>
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $review->user->name }}</p>
            
            <!-- Rating with stars -->
            <p><strong>Rating:</strong>
                <span class="text-warning">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                    @endfor
                </span>
            </p>

            <p><strong>Comment:</strong> {{ $review->comment }}</p>
        </div>
        <div class="card-footer text-center">
            <!-- Approve and Reject Buttons -->
            <div class="custom-button-group">
                <!-- Approve Button -->
                <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="d-inline" id="approve{{ $review->id }}">
                    @csrf
                    <button type="button" class="btn btn-success btn-sm me-2" onclick="approveReview({{ $review->id }})">
                        <i class="fas fa-check"></i> Approve
                    </button>
                </form>
 
                <!-- Reject Button -->
                <form action="{{ route('admin.reviews.reject', $review->id) }}" method="POST" class="d-inline" id="reject{{ $review->id }}">
                    @csrf
                    <button type="button" class="btn btn-danger btn-sm" onclick="rejectReview({{ $review->id }})">
                        <i class="fas fa-times"></i> Reject
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('admin.reviews') }}" class="btn btn-secondary">Back to Reviews List</a>
    </div>
</div>
@endsection

@section('styles')
<style>
    .custom-button-group {
        display: inline-flex;
        gap: 10px; /* Adds space between buttons */
    }

    .card-header {
        background-color: #007bff;
        color: white;
    }

    .card-footer {
        background-color: #f8f9fa;
    }

    .btn i {
        margin-right: 5px;
    }

    .card-body {
        font-size: 14px;
    }
</style>
@endsection

@section('scripts')
<script>
function approveReview(reviewId) {
    // SweetAlert confirmation popup
    Swal.fire({
        title: 'Are you sure you want to approve this review?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve',
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, submit the hidden delete form
            document.getElementById(`approve${reviewId}`).submit();

            
        }
    });
}

function rejectReview(reviewId) {
    // SweetAlert confirmation popup
    Swal.fire({
        title: 'Are you sure you want to reject this review?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, reject',
    }).then((result) => {
        if (result.isConfirmed) {
            // If user confirms, submit the hidden delete form
            document.getElementById(`reject${reviewId}`).submit();

            
        }
    });
}
</script>

<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome for star icons -->
@endsection
