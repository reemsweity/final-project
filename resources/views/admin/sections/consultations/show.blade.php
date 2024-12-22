@extends('dashboard')

@section('title', 'Consultation Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Consultation Details</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Consultation Profile Information -->
    <div class="card">
        <div class="card-header">
            <h4>{{ $consultation->title }} - Consultation Details</h4>
        </div>
        <div class="card-body">
            <!-- User and Doctor Information in 2 Columns -->
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>User:</strong> {{ $consultation->user->name }}</h5>
                    <p><strong>Email:</strong> {{ $consultation->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $consultation->user->phone }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Doctor:</strong> {{ $consultation->doctor->name }}</h5>
                    <p><strong>Email:</strong> {{ $consultation->doctor->email }}</p>
                    <p><strong>Specialization:</strong> {{ $consultation->doctor->specialization->name }}</p>
                </div>
            </div>

            <!-- Consultation Description -->
            <div class="mt-3">
                <h5><strong>Consultation Description:</strong></h5>
                <p>{{ $consultation->description }}</p>
            </div>

            <!-- Consultation Status with Badge -->
            <div class="mt-3">
                <h5><strong>Status:</strong> 
                    <span class="badge 
                        @if($consultation->status == 'pending') bg-warning 
                        @elseif($consultation->status == 'confirmed') bg-success 
                        @elseif($consultation->status == 'completed') bg-info 
                        @else bg-danger 
                        @endif">
                        {{ ucfirst($consultation->status) }}
                    </span>
                </h5>
            </div>

            <!-- Fee Section -->
            <div class="mt-3">
                <h5><strong>Fee:</strong> ${{ number_format($consultation->fee, 2) }}</h5>
            </div>
        </div>

        <!-- Card Footer with Delete Button -->
        <div class="card-footer">
            <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>

  
    <a href="{{ route('admin.consultations') }}" class="btn btn-secondary mt-4">Back to Consultations List</a>
</div>
@endsection
