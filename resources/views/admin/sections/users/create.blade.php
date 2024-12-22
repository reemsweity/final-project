@extends('dashboard')

@section('title', 'Add New User')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="current_medications" class="col-sm-2 col-form-label">Current Medications</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="current_medications" name="current_medications">{{ old('current_medications') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="allergies" class="col-sm-2 col-form-label">Allergies</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="allergies" name="allergies">{{ old('allergies') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="medical_history" class="col-sm-2 col-form-label">Medical History</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="medical_history" name="medical_history">{{ old('medical_history') }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <label for="gender" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
                <select class="form-select" id="gender" name="gender">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="age" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="age" name="age" value="{{ old('age') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="profile_img" class="col-sm-2 col-form-label">Profile Image</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="profile_img" name="profile_img">
            </div>
        </div>

        <div class="row mb-3">
            <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
            <div class="col-sm-10">
                <select class="form-select" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save User</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
