@extends('dashboard')

@section('title', 'Add New Testimonial')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Testimonial</h2>

    <form action="{{ route('admin.testimonials.store') }}" method="POST">
        @csrf

        <!-- User Selection -->
        <div class="row mb-3">
            <label for="user_id" class="col-sm-2 col-form-label">User</label>
            <div class="col-sm-10">
                <select class="form-select" id="user_id" name="user_id" required>
                    <option value="">Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Testimonial Text -->
        <div class="row mb-3">
            <label for="testimonial_text" class="col-sm-2 col-form-label">Testimonial Text</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="3" required>{{ old('testimonial_text') }}</textarea>
                @error('testimonial_text')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Rating -->
        <div class="row mb-3">
            <label for="rating" class="col-sm-2 col-form-label">Rating</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ old('rating') }}" required>
                @error('rating')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Is Active -->
        <div class="row mb-3">
            <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
            <div class="col-sm-10">
                <select class="form-select" id="is_active" name="is_active" required>
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Testimonial</button>
        <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
