@extends('dashboard')

@section('title', 'Testimonial Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Testimonial Details</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Testimonial Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">{{ $testimonial->doctor->name }}</h5>
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $testimonial->user->name }}</p>

            <!-- Rating with stars -->
            <p><strong>Rating:</strong>
                <span class="text-warning">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star{{ $i <= $testimonial->rating ? '' : '-o' }}"></i>
                    @endfor
                </span>
            </p>

            <p><strong>Testimonial:</strong> {{ $testimonial->testimonial_text }}</p>
            <p><strong>Status:</strong>
                <span class="badge bg-{{ $testimonial->status == 'approved' ? 'success' : ($testimonial->status == 'pending' ? 'warning' : 'danger') }}">
                    {{ ucfirst($testimonial->status) }}
                </span>
            </p>
        </div>
        <div class="card-footer text-center">
            <!-- Approve and Reject Buttons -->
            <div class="custom-button-group">
                <!-- Approve Button -->
                <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH') 
                    <button type="submit" class="btn btn-success btn-sm me-2" onclick="return confirm('Are you sure you want to approve this testimonial?')">
                        <i class="fas fa-check"></i> Approve
                    </button>
                </form>

                <!-- Reject Button -->
                <form action="{{ route('admin.testimonials.reject', $testimonial->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PATCH') 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to reject this testimonial?')">
                        <i class="fas fa-times"></i> Reject
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-3">
        <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Back to Testimonials List</a>
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
<script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- FontAwesome for star icons -->
@endsection
