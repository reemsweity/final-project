@extends('dashboard') <!-- or your main layout file -->

@section('title', 'Doctor Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Doctor Details</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Doctor Profile Information -->
    <div class="card">
        <div class="card-header">
            <h4>{{ $doctor->name }}'s Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    <!-- Profile Image -->
                    @if($doctor->profile_img)
                        <img src="{{ Storage::url($doctor->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <p class="text-muted">No Image Available</p>
                    @endif

                    <!-- Doctor's Personal Information Below the Image -->
                    <div class="mt-3">
                        <p><strong>Email:</strong> {{ $doctor->email }}</p>
                        <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
                        <p><strong>Rating:</strong> {{ $doctor->rating }} / 5</p>
                        <p><strong>Years of Experience:</strong> {{ $doctor->year_experience }}</p>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- Other Doctor's Details -->
                    <h5><strong>Specialization:</strong> {{ $doctor->specialization ? $doctor->specialization->name : 'N/A' }}</h5>
                    <p><strong>About:</strong> {{ $doctor->about }}</p>
                    <p><strong>Work Experience:</strong> {{ $doctor->work_experience }}</p>
                    <p><strong>Status:</strong>
                        <span class="badge {{ $doctor->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $doctor->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
       
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.doctors') }}" class="btn btn-secondary">Back to Doctors List</a>
    </div>
</div>
@endsection
