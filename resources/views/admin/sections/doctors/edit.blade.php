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
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
            @error('phone') <div class="alert alert-danger">{{ $message }}</div> @enderror
        </div>

        <div class="row mb-3">
            <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
            <div class="col-sm-10">
                <select class="form-select" id="is_active" name="is_active">
                    <option value="1" {{ old('is_active', $doctor->is_active) ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !old('is_active', $doctor->is_active) ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('admin.doctors') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
