@extends('dashboard')

@section('title', 'Edit Admin Profile')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 mx-auto" style="max-width: 600px;">
            <h2 class="mb-4">Edit Profile</h2>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
                </div>

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
                </div>

                <!-- Profile Image Input -->
                <div class="mb-3">
                    <label for="profile_img" class="form-label">Profile Image</label>
                    <input type="file" name="profile_img" id="profile_img" class="form-control">
                    <div class="mt-2">
                        <img src="{{ $admin->profile_img ? asset($admin->profile_img) : asset('default-profile.png') }}" alt="Current Profile Image" class="img-fluid rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                </div>

                <!-- Current Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                </div>

                <!-- New Password Input -->
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-control">
                </div>

                <!-- Confirm New Password Input -->
                <div class="mb-3">
                    <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm_new_password" id="confirm_new_password" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.profile') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
