@extends('dashboard')

@section('title', 'Appointment Details')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Appointment Details</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Appointment Profile Information -->
    <div class="card">
       
        <div class="card-body">
            <!-- User and Doctor Information in 2 Columns -->
            <div class="row">
                <div class="col-md-6">
                    <h5><strong>User:</strong> {{ $appointment->user->name }}</h5>
                    <p><strong>Email:</strong> {{ $appointment->user->email }}</p>
                    <p><strong>Phone:</strong> {{ $appointment->user->phone }}</p>
                </div>
                <div class="col-md-6">
                    <h5><strong>Doctor:</strong> {{ $appointment->doctor->name }}</h5>
                    <p><strong>Email:</strong> {{ $appointment->doctor->email }}</p>
                    <p><strong>Specialization:</strong> {{ $appointment->doctor->specialization->name }}</p>
                </div>
            </div>

            <!-- Appointment Date & Time -->
            <div class="mt-3">
                <h5><strong>Date & Time:</strong> {{ $appointment->date_time }}</h5>
            </div>

            <!-- Appointment Availability -->
            <div class="mt-3">
                <h5><strong>Availability:</strong> {{ $appointment->availability }}</h5>
            </div>

            <!-- Zoom Link -->
            <div class="mt-3">
                <h5><strong>Zoom Link:</strong> <a href="{{ $appointment->zoom_link }}" target="_blank" rel="noopener noreferrer">{{ $appointment->zoom_link }}</a></h5>
            </div>

            <!-- Appointment Status -->
            <div class="mt-3">
                <h5><strong>Status:</strong> 
                    <span class="badge 
                        @if($appointment->status == 'pending') bg-warning 
                        @elseif($appointment->status == 'confirmed') bg-success 
                        @elseif($appointment->status == 'completed') bg-info 
                        @else bg-danger 
                        @endif">
                        {{ ucfirst($appointment->status) }}
                    </span>
                </h5>
            </div>
        </div>

       
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.appointments') }}" class="btn btn-secondary">Back to Appointments</a>
    </div>
</div>
@endsection
