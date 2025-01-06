@extends('pages.app')

@section('content')
@section('title','Profile')
@section('breadcrumb', 'User Profile')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-page">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
            <!-- Profile Image Section -->
            <div class="profile-image-section">
                <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('default-profile.jpg') }}" alt="Profile Image">
                <h1>{{ auth()->user()->name }}</h1>
                <p>Email: <strong>{{ auth()->user()->email }}</strong></p>
                <p>Phone: <strong>{{ auth()->user()->phone }}</strong></p>
                <div class="profile-actions">
                    <a href="{{route('profile.edit')}}">Edit Profile</a>
                </div>
            </div>

            <!-- Profile Details Section -->
            <div class="profile-details-section">
                <h2>General Information</h2>
                <p><strong>Gender:</strong> {{ ucfirst(auth()->user()->gender) }}</p>
                <p><strong>Age:</strong> {{ auth()->user()->age }}</p>

                <h2>Medical Information</h2>
                <p><strong>Current Medications:</strong> {{ auth()->user()->current_medications ?? 'Not specified' }}</p>
                <p><strong>Allergies:</strong> {{ auth()->user()->allergies ?? 'Not specified' }}</p>
                <p><strong>Medical History:</strong> {{ auth()->user()->medical_history ?? 'Not specified' }}</p>
            </div>
        </div>

        <!-- Appointments Section -->
        <div class="appointments-section">
            <h2>My Appointments</h2>

            <!-- Filter by Status -->
            <form action="{{ route('profile') }}" method="GET">
                <label for="status">Filter by Status:</label>
                <select name="status" id="status">
                    <option value="">All</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit">Filter</button>
            </form>

            @if($appointments->isEmpty())
                <p>You have no upcoming appointments.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Doctor</th>
                            <th>Date/Time</th>
                            <th>Zoom Link</th>
                            <th>Zoom Password</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($appointment->date_time)->format('l, F j, Y, g:i A') }}</td>
                                <td>{{ $appointment->zoom_link ?? 'Not provided' }}</td>
                                <td>{{ $appointment->zoom_pass ?? 'Not provided' }}</td>
                                <td>
                                    @if($appointment->status == 'confirmed')
                                        <span style="color: green;">Confirmed</span>
                                    @elseif($appointment->status == 'pending')
                                        <span style="color: orange;">Pending</span>
                                    @elseif($appointment->status == 'completed')
                                        <span style="color: blue;">Completed</span>
                                    @else
                                        <span style="color: red;">Cancelled</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination-wrap">
                    {{ $appointments->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
