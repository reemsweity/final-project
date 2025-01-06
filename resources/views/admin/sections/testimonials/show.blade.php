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
                <span class="{{ $testimonial->is_active == 1 ? 'bg-success' : 'bg-danger'}}">
                    {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                </span>
            </p>
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
