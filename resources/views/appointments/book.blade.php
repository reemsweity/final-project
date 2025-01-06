@extends('pages.app')
@section('content')
@section('title', 'Book Appointment')
@section('breadcrumb', 'Book Appointment')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif




<form class="doctor-appointment-form" action="{{ route('appointments.book', ['doctorId' => $doctor->id]) }}" method="POST">
    @csrf
    
    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">


    <label for="doctor_name">Doctor Name</label>
    <input type="text" name="doctor_name" id="doctor_name" value="{{ $doctor->name }}" readonly>


    <label for="doctor_specialty">Doctor's Specialty</label>
    <input type="text" name="doctor_specialty" id="doctor_specialty" value="{{ $doctor->specialization->name }}" readonly>

    <!-- Name --><label for="consultation_price">Consultation Price</label>
    <input type="text" name="consultation_price" id="consultation_price" value="{{ $doctor->consultation_price }}" readonly>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" >

    <!-- Email -->
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ Auth::user()->email }}">

    <!-- Phone Number -->
    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" id="phone_number" class="form-control text-danger" value="{{ Auth::user()->phone_number ?? '' }}" required>

    <!-- Day of the Week -->
    <label for="day_of_week">Day of the Week</label>
    <select name="day_of_week" id="day_of_week">
        @foreach($availability as $available)
            <option value="{{ $available->day_of_week }}">{{ $available->day_of_week }}</option>
        @endforeach
    </select>

    <!-- Start Time -->
    <label for="start_time">Select Time</label>
    <select name="start_time" id="start_time">
        @foreach($availability as $available)
            <option value="{{ $available->start_time }}">{{ $available->start_time }} - {{ $available->end_time }}</option>
        @endforeach
    </select>
   
    <button type="submit">Book Appointment</button>
    <a href="{{ route('user.doctors') }}" class="cancel-button">Cancel</a>
</form>
@endsection
