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
                <div class="col-md-4">
                    <!-- Profile Image -->
                    @if($doctor->profile_img)
                            <img src="{{ Storage::url($doctor->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            N/A
                        @endif
                </div>
                <div class="col-md-8">
                    <!-- Doctor's Personal Information -->
                    <h5>Email: {{ $doctor->email }}</h5>
                    <p>Phone: {{ $doctor->phone }}</p>
                    <p>Specialization: {{ $doctor->specialization ? $doctor->specialization->name : 'N/A' }}</p>
                    <p>About: {{ $doctor->about }}</p>
                    <p>Work Experience: {{ $doctor->work_experience }}</p>
                    <p>Years of Experience: {{ $doctor->year_experience }}</p>
                    <p>Status: 
                        <span class="badge {{ $doctor->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $doctor->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.doctors') }}" class="btn btn-secondary">Back to Doctors List</a>
    </div>
</div>
@endsection
