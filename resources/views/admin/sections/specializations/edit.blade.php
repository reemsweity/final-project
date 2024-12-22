@extends('dashboard')

@section('title', 'Edit Specialization')

@section('content')
<div class="container mt-4">
    <h2>Edit Specialization</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.specializations.update', $specializations->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $specializations->name }}" required>
        </div>

        <div class="mb-3">
            <label for="icon" class="form-label">Profile Image</label>
            @if ($specializations->icon)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $specializations->icon) }}" alt="Current Icon" class="img-thumbnail" style="width: 100px; height: 100px;">
                </div>
            @endif
            <input type="file" class="form-control" id="icon" name="icon">
            <small class="form-text text-muted">Leave empty to keep the current icon.</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control">{{ $specializations->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select id="is_active" name="is_active" class="form-control">
                <option value="1" {{ $specializations->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$specializations->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.specializations') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
