<!-- resources/views/admin/doctors/edit.blade.php -->
@extends('dashboard')

@section('content')
    <h1>Edit Doctor</h1>

    <form action="{{ route('admin.doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $doctor->name) }}" required>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $doctor->email) }}" required>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="profile_img">Profile Image</label>
            <input type="file" name="profile_img" id="profile_img" class="form-control">
            @error('profile_img') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="about">About</label>
            <textarea name="about" id="about" class="form-control">{{ old('about', $doctor->about) }}</textarea>
            @error('about') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="work_experience">Work Experience</label>
            <textarea name="work_experience" id="work_experience" class="form-control">{{ old('work_experience', $doctor->work_experience) }}</textarea>
            @error('work_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="year_experience">Years of Experience</label>
            <input type="number" name="year_experience" id="year_experience" class="form-control" value="{{ old('year_experience', $doctor->year_experience) }}">
            @error('year_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook', $doctor->facebook) }}">
            @error('facebook') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" name="twitter" id="twitter" class="form-control" value="{{ old('twitter', $doctor->twitter) }}">
            @error('twitter') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="available_time">Available Time</label>
            <input type="text" name="available_time" id="available_time" class="form-control" value="{{ old('available_time', $doctor->available_time) }}">
            @error('available_time') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="specialization_id">Specialization</label>
            <select name="specialization_id" id="specialization_id" class="form-control">
                <option value="">Select Specialization</option>
                @foreach($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->name }}
                    </option>
                @endforeach
            </select>
            @error('specialization_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>
       
       
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.doctors') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
