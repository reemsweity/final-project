@extends('pages.app')
@section('content')
@section('title','Profile')
@section('breadcrumb', 'User Profile')

<div class="profile-page" style="background-color: #fbfbfb; padding: 40px 20px; font-family: Arial, sans-serif;">
    <div class="container" style="max-width: 900px; margin: auto;">
        <div style="display: flex; flex-wrap: wrap; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
            <!-- Profile Image Section -->
            <div class="profile-image-section" style="flex: 1; text-align: center; padding: 20px;">
                <img src="{{ Auth::user()->profile_img ? asset(Auth::user()->profile_img) : asset('default-profile.jpg') }}" alt="Profile Image" style="width: 150px; height: 150px; border-radius: 50%; border: 5px solid #43ba7f;">
                <h1 style="color: #193126; font-size: 26px; margin-top: 20px;">{{ auth()->user()->name }}</h1>
                <p style="color: #585858; font-size: 14px;">Email: <strong>{{ auth()->user()->email }}</strong></p>
                <p style="color: #585858; font-size: 14px;">Phone: <strong>{{ auth()->user()->phone }}</strong></p>
                <div class="profile-actions" style="text-align: center; margin-top: 20px;">
    <a href="{{route('profile.edit')}}" style="background-color: #43ba7f; color: #ffffff; padding: 12px 25px; font-size: 16px; border-radius: 5px; text-decoration: none; box-shadow: 0px 4px 8px rgba(67, 186, 127, 0.3); transition: all 0.3s ease;">
        Edit Profile
    </a>
</div>
            </div>

            <!-- Profile Details Section -->
            <div class="profile-details-section" style="flex: 2; padding: 20px; border-left: 2px solid #238f5a;">
                <h2 style="color: #43ba7f; font-size: 22px; border-bottom: 2px solid #238f5a; padding-bottom: 5px;">General Information</h2>
                <p style="color: #585858; margin: 15px 0;"><strong>Gender:</strong> {{ ucfirst(auth()->user()->gender) }}</p>
                <p style="color: #585858; margin: 15px 0;"><strong>Age:</strong> {{ auth()->user()->age }}</p>

                <h2 style="color: #43ba7f; font-size: 22px; margin-top: 30px; border-bottom: 2px solid #238f5a; padding-bottom: 5px;">Medical Information</h2>
                <p style="color: #585858; margin: 15px 0;"><strong>Current Medications:</strong> {{ auth()->user()->current_medications ?? 'Not specified' }}</p>
                <p style="color: #585858; margin: 15px 0;"><strong>Allergies:</strong> {{ auth()->user()->allergies ?? 'Not specified' }}</p>
                <p style="color: #585858; margin: 15px 0;"><strong>Medical History:</strong> {{ auth()->user()->medical_history ?? 'Not specified' }}</p>
            </div>
        </div>
<!-- Edit Button Section -->

        <!-- Appointments Section -->
        <div class="appointments-section" style="margin-top: 40px; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
            <h2 style="color: #43ba7f; font-size: 22px; margin-bottom: 20px; border-bottom: 2px solid #238f5a; padding-bottom: 5px;">My Appointments</h2>
        
            <!-- Filter by Status -->
            <form action="{{ route('profile') }}" method="GET" style="margin-bottom: 20px;">
                <label for="status" style="color: #43ba7f; font-weight: bold;">Filter by Status:</label>
                <select name="status" id="status" style="padding: 10px; margin-left: 10px; width:300px;">
                    <option value="">All</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                <button type="submit" style="background-color: #43ba7f; color: #ffffff; padding: 10px 20px; border-radius: 5px; border: none;">Filter</button>
            </form>
        
            @if($appointments->isEmpty())
                <p style="color: #585858;">You have no upcoming appointments.</p>
            @else
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Doctor</th>
                            <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Date/Time</th>
                            <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Zoom Link</th>
                            <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Zoom Password</th>
                            <th style="text-align: left; padding: 10px; font-weight: bold; color: #43ba7f;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                            <tr>
                                <td style="padding: 10px;">{{ $appointment->doctor->name }}</td>
                                <td style="padding: 10px;">{{ \Carbon\Carbon::parse($appointment->date_time)->format('l, F j, Y, g:i A') }}</td>
                                <td style="padding: 10px;">{{ $appointment->zoom_link ?? 'Not provided' }}</td>
                                <td style="padding: 10px;">{{ $appointment->zoom_pass ?? 'Not provided' }}</td>
                                <td style="padding: 10px;">
                                    @if($appointment->status == 'confirmed')
                                        <span style="color: green; font-weight: bold;">Confirmed</span>
                                    @elseif($appointment->status == 'pending')
                                        <span style="color: orange; font-weight: bold;">Pending</span>
                                    @elseif($appointment->status == 'completed')
                                        <span style="color: blue; font-weight: bold;">Completed</span>
                                    @else
                                        <span style="color: red; font-weight: bold;">Cancelled</span>
                                    @endif
                                </td>
                                <td style="padding: 10px;">
                                    @if($appointment->status != 'completed' && $appointment->status != 'cancelled')
                                        <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH') <!-- Use PATCH to update the status -->
                                            <button type="submit" class="btn btn-sm btn-danger">Cancel</button>
                                        </form>
                                   
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
