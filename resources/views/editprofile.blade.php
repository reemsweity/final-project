@extends('pages.app')
@section('content')
@section('title', 'Edit Profile')
@section('breadcrumb', 'Edit Profile')

<!-- Include the external CSS file -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<div class="edit-profile-page">
    <div class="container">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Personal Information Section -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}" class="form-control">
                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="profile_img">Profile Image</label>
                <input type="file" name="profile_img" id="profile_img" class="form-control">
                @error('profile_img') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="current_medications">Current Medications</label>
                <input type="text" name="current_medications" id="current_medications" value="{{ old('current_medications', $user->current_medications ?? '') }}" class="form-control">
                @error('current_medications') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="allergies">Allergies</label>
                <input type="text" name="allergies" id="allergies" value="{{ old('allergies', $user->allergies ?? '') }}" class="form-control">
                @error('allergies') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea name="medical_history" id="medical_history" class="form-control">{{ old('medical_history', $user->medical_history ?? '') }}</textarea>
                @error('medical_history') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Password Section -->
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ccc;">
                <h4>Change Password</h4>

                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                    @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Leave blank to keep current" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>

            <button type="submit">Save Changes</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
