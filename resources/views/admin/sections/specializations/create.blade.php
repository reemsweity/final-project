@extends('dashboard')

@section('title', 'Add Specialization')

@section('content')
<div class="container mt-4">
    <h2>Add Specialization</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.specializations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Specialization</label>
            <div class="col-sm-10">
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="is_active" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select id="is_active" name="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
            <div class="col-sm-10">
                <input type="file" id="icon" name="icon" class="form-control">
                <small class="form-text text-muted">Supported formats: PNG, JPG, JPEG (max 2MB).</small>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.specializations') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
