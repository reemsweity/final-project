@extends('pages.app')
@section('content')
@section('title', 'Doctor Profile')
@section('breadcrumb', 'Doctor Profile')

<!-- resources/views/appointments/doctorAppointments.blade.php -->

<div class="doctor-appointments-page">
    <h1 class="mb-4 display-4">My Appointments - Dr. {{ $doctor->name }}</h1>

    <!-- Display success or error messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Show doctor appointments -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-lg">
            <thead class="thead-dark">
                <tr>
                    <th class="h5">Patient Name</th>
                    <th class="h5">Appointment Date & Time</th>
                    <th class="h5">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr>
                        <td class="font-weight-bold">{{ $appointment->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('l, F j, Y g:i A') }}</td>
                        <td>
                            <span class="badge 
                                @if($appointment->status == 'confirmed') 
                                    badge-success 
                                @elseif($appointment->status == 'pending') 
                                    badge-warning 
                                @else 
                                    badge-danger 
                                @endif
                                badge-pill badge-lg">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
