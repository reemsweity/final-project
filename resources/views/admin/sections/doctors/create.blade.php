<!-- resources/views/admin/doctors/create.blade.php -->
@extends('dashboard') <!-- Assuming you have an admin layout -->

@section('content')
    <h1>Create Doctor</h1>

    <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            @error('email') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            @error('password_confirmation') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

       <div class="form-group">
            <label for="profile_img">Profile Image</label>
            <input type="file" name="profile_img" id="profile_img" class="form-control">
            @error('profile_img') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        {{--  <div class="form-group">
            <label for="about">About</label>
            <textarea name="about" id="about" class="form-control">{{ old('about') }}</textarea>
            @error('about') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="work_experience">Work Experience</label>
            <textarea name="work_experience" id="work_experience" class="form-control">{{ old('work_experience') }}</textarea>
            @error('work_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="year_experience">Years of Experience</label>
            <input type="number" name="year_experience" id="year_experience" class="form-control" value="{{ old('year_experience') }}">
            @error('year_experience') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" value="{{ old('facebook') }}">
            @error('facebook') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" name="twitter" id="twitter" class="form-control" value="{{ old('twitter') }}">
            @error('twitter') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="available_time">Available Time</label>
            <input type="text" name="available_time" id="available_time" class="form-control" value="{{ old('available_time') }}">
            @error('available_time') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div> --}}

        <div class="form-group">
            <label for="specialization_id">Specialization</label>
            <select name="specialization_id" id="specialization_id" class="form-control">
                <option value="">Select Specialization</option>
                @foreach($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->name }}
                    </option>
                @endforeach
            </select>
            @error('specialization_id') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        {{-- <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div> --}}
        {{-- <div class="form-group">
            <label for="is_active">Is Active</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1" {{ old('is_active', $doctor->is_active) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active', $doctor->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Save Doctor</button>
        <a href="{{ route('admin.doctors') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
