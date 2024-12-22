@extends('pages.app')
@section('content')
@section('title', 'Doctor Profile')
@section('breadcrumb', 'Doctor Profile')

<div class="profile-container" style="background-color: #f8f9fa;  padding: 40px 20px;">
    <div class="profile-content" style="max-width: 1000px; margin: auto; display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Profile Image -->
            <div style="text-align: center; margin-bottom: 25px;">
                <img src="{{ Storage::url($doctor->profile_img) }}" alt="Doctor Profile Picture" 
                    style="width: 150px; height: 150px; border-radius: 50%; border: 5px solid #43ba7f; object-fit:cover">
                <h1 style="font-size: 1.8rem; color: #2d2d2d; margin-top: 15px; margin-bottom: 5px;">{{ $doctor->name }}</h1>
                <p style="color: #43ba7f; font-size: 1.1rem; font-weight: 500;">{{ $doctor->specialization->name }}</p>
            </div>

            <!-- Quick Stats -->
            <a href="{{route('doctor.profile.edit')}}" style="display: block; background-color: #43ba7f; color: #ffffff; text-align: center; padding: 12px; border-radius: 10px; text-decoration: none; font-weight: 500; margin-bottom: 15px; transition: opacity 0.2s;">
               Edit Profile
            </a>
            <form action="{{ route('doctor.logout') }}" method="POST">
                @csrf
                <button type="submit" style="width: 100%; background-color: #e74c3c; color: #ffffff; padding: 12px; border-radius: 10px; border: none; font-weight: 500; cursor: pointer; transition: opacity 0.2s;">
                    Logout
                </button>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content" style="display: flex; flex-direction: column; gap: 25px;">
            <!-- About Section -->
            <div style="background-color: #ffffff; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);">
                <h2 style="color: #2d2d2d; font-size: 1.5rem; margin-bottom: 20px; display: flex; align-items: center;">
                    About
                </h2>
                <p style="color: #666666; line-height: 1.8;">{{ $doctor->about ?? 'No information available' }}</p>
            </div>

            <!-- Work Experience -->
            <div style="background-color: #ffffff; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);">
                <h2 style="color: #2d2d2d; font-size: 1.5rem; margin-bottom: 20px; display: flex; align-items: center;">
                    Work Experience
                </h2>
                <p style="color: #666666; line-height: 1.8;">{{ $doctor->work_experience ?? 'No information available' }}</p>
            </div>

            <!-- Experience Years -->
            <div style="background-color: #ffffff; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);">
                <h2 style="color: #2d2d2d; font-size: 1.5rem; margin-bottom: 20px; display: flex; align-items: center;">
                    Experience Years
                </h2>
                <p style="color: #666666; line-height: 1.8;">{{ $doctor->experience_years ?? 'No information available' }}</p>
            </div>

            <!-- Available Time -->
            <div style="background-color: #ffffff; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);">
                <h2 style="color: #2d2d2d; font-size: 1.5rem; margin-bottom: 20px; display: flex; align-items: center;">
                    Available Time
                </h2>
                <p style="color: #666666; line-height: 1.8;">{{ $doctor->available_time ?? 'Not Provided' }}</p>
            </div>

            <!-- Contact Information -->
            <div style="background-color: #ffffff; border-radius: 20px; padding: 30px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);">
                <h2 style="color: #2d2d2d; font-size: 1.5rem; margin-bottom: 20px; display: flex; align-items: center;">
                    Contact Information
                </h2>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 12px;">
                        <h3 style="color: #43ba7f; font-size: 1.1rem; margin-bottom: 10px;">Phone Number</h3>
                        <p style="color: #2d2d2d;">{{ $doctor->phone ?? 'Not Provided' }}</p>
                    </div>
                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 12px;">
                        <h3 style="color: #43ba7f; font-size: 1.1rem; margin-bottom: 10px;">Email Address</h3>
                        <a href="mailto:{{ $doctor->email }}" style="color: #2d2d2d; text-decoration: none;">{{ $doctor->email }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
