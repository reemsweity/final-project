@extends('dashboard') <!-- or your main layout file -->

@section('title', 'User Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">User Details</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- User Profile Information -->
    <div class="card">
        <div class="card-header">
            <h4>{{ $user->name }}'s Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-4">
                    
                    @if(Auth::user()->profile_img )
                    <img src="{{ asset($user->profile_img) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                   <img src="{{asset('default-profile.jpg') }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                @endif
                </div>
                <div class="col-md-8">
                    <h5>Email: {{ $user->email }}</h5>
                    <p>Phone: {{ $user->phone }}</p>
                   
                    <p>Status: 
                        <span class="badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
        
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back to Users List</a>
    </div>
</div>
@endsection
