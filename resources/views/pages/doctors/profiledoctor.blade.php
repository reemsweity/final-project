@extends('pages.doctors.layouts.app')
@section('content')
@section('breadcrumb', 'Appointment')
<div style="display: flex; background-color: #f8f9fa; min-height: 100vh; padding: 40px 20px;">
    <!-- Sidebar -->
    <div style="width: 250px; background-color: #2d2d2d; color: white; padding: 20px; border-radius: 8px; margin-right: 20px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ Storage::url($doctor->profile_img) }}" alt="Doctor Profile Picture" 
                style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
            <h3 style="color: white; margin-top: 10px;">Dr.{{ $doctor->name }}</h3>
            <p style="color: #43ba7f;">{{ $doctor->specialization->name }}</p>
            
        </div>
        <div style="display: flex; flex-direction: column; gap: 15px;">
        <a href="{{route('doctor.profile.edit')}}" style="background-color: #43ba7f; color: white; padding: 12px; border-radius: 6px; text-decoration: none; text-align: center;">
            Edit Profile
        </a>
        </div>
        {{-- <div style="display: flex; flex-direction: column; gap: 15px;">
            <a href="{{ url('doctor/profile') }}" style="background-color: #444; color: white; padding: 12px; border-radius: 6px; text-decoration: none; text-align: center;">
                My Profile
            </a>
            <a href="{{ url('doctor/appointments') }}" style="background-color: #444; color: white; padding: 12px; border-radius: 6px; text-decoration: none; text-align: center;">
                My Appointments
            </a>
        </div> --}}
    </div>

    <!-- Main Content -->
    <div style="flex-grow: 1; max-width: 1000px;">
        
        <!-- Main Content Sections -->
        <div style="display: grid; gap: 40px;">
            <section>
                <h2 style="color: #43ba7f; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;">About</h2>
                <p style="color: #666; line-height: 1.6;">{{ $doctor->about ?? 'No information available' }}</p>
            </section>

            <section>
                <h2 style="color: #43ba7f; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;">Work Experience</h2>
                <p style="color: #666; line-height: 1.6;">{{ $doctor->work_experience ?? 'No information available' }}</p>
            </section>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
                <section>
                    <h2 style="color: #43ba7f; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;">Experience Years</h2>
                    <p style="color: #666;">{{ $doctor->experience_years ?? 'No information available' }}</p>
                </section>

                <section>
                    <h2 style="color: #43ba7f; font-size: 1.3rem; margin-bottom: 15px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px;">Available Time</h2>
                    <p style="color: #666;">{{ $doctor->available_time ?? 'Not Provided' }}</p>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection