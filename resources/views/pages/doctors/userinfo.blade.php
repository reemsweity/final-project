@extends('pages.doctors.layouts.app')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">User Details</h2>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- User Profile Information -->
    <div class="card">
       
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5>Email: {{ $user->email }}</h5>

                </div>
                <div class="col-md-8">
                    <h5>Email: {{ $user->email }}</h5>
                    <p>Phone: {{ $user->phone }}</p>
                    <p>Gender: {{ ucfirst($user->gender) }}</p>
                    <p>Age: {{ $user->age }}</p>
                    <p>Current Medications: {{ $user->current_medications }}</p>
                    <p>Allergies: {{ $user->allergies }}</p>
                    <p>Medical History: {{ $user->medical_history }}</p>
                   
                </div>
            </div>
        </div>
      
    </div>

    <div class="mt-3">
        <a href="{{ route('doctor.appointments') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection