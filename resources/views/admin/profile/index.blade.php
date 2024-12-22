@extends('dashboard')

@section('title', 'Admin Profile')

@section('content')
<div class="container mt-5">
    <!-- Profile Card -->
    <div class="card mx-auto" style="max-width: 900px;">
        <div class="card-header text-center">
            <h2>Admin Profile</h2>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        </div>
        <div class="card-body">
            <div class="row">
                <!-- Profile Image Column -->
                <div class="col-md-4 text-center">
                    <img src="{{ $admin->profile_img ? asset($admin->profile_img) : asset('default-profile.png') }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">

                </div>
                <!-- Profile Data Column -->
                <div class="col-md-8">
                    <div class="mb-3">
                        <strong>Name:</strong> {{ $admin->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $admin->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Role:</strong> Admin
                    </div>
                    <div class="text-center mt-3">
                        <!-- Edit Profile Button -->
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
