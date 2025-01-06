@extends('pages.app')

@section('content')
    <h1>Appointment Confirmation</h1>
    <p>Your appointment has been successfully confirmed.</p>
    <p>Doctor: {{ $appointment->doctor->name }}</p>
    <p>Specialty: {{ $appointment->doctor->specialization->name }}</p>
    <p>Date and Time: {{ $appointment->date_time }}</p>
   
@endsection
