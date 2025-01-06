@extends('pages.doctors.layouts.app')
@section('content')
@section('breadcrumb', 'Appointment')
<div class="d-flex flex-column flex-md-row gap-4 bg-light py-5 px-3">
    <!-- Sidebar -->
    <div class="col-12 col-md-3 bg-dark text-white p-4 rounded mb-4 mb-md-0">
        <div class="text-center mb-4">
            <img src="{{ $doctor->profile_img ? Storage::url($doctor->profile_img) : asset('default-profile.jpg') }}" alt="Doctor Profile Picture" 
                class="img-fluid rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
            <h3 class="mt-3">Dr. {{ $doctor->name }}</h3>
            <p class="text-success">{{ $doctor->specialization->name }}</p>
        </div>
        <div class="d-flex flex-column gap-3">
            <a href="{{ route('doctor.pages.doctors.profile') }}" class="btn btn-success text-white py-2 rounded">
                Profile
            </a>
            <a href="{{ url('doctor/appointments') }}" class="btn btn-success text-white py-2 rounded">
                Appointment
            </a>
            <a href="{{ route('doctor.profile.edit') }}" class="btn btn-success text-white py-2 rounded">
                Edit Profile
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="col-12 col-md-8 bg-white p-4 rounded shadow-lg">
        <form action="{{ route('doctor.profile.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="profile_img" class="form-label text-success">Profile Image</label>
                <!-- Display the current profile image -->
                <img src="{{ $doctor->profile_img ? Storage::url($doctor->profile_img) : asset('default-profile.jpg') }}" alt="Doctor Profile Picture" 
                    class="img-fluid rounded-circle" style="width: 120px; height: 120px; object-fit: cover;">
                <input type="file" name="profile_img" id="profile_img" class="form-control mt-3" accept="image/*">
                @error('profile_img')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <!-- Personal Information Section -->
            <div class="mb-3">
                <label for="name" class="form-label text-success">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $doctor->name) }}" class="form-control">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label text-success">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $doctor->email) }}" class="form-control">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label text-success">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control">
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- About Section -->
            <div class="mb-3">
                <label for="about" class="form-label text-success">About</label>
                <textarea name="about" id="about" value="{{ old('about', $doctor->about) }}" class="form-control" placeholder="Write something about yourself">{{ old('about', $doctor->about) }}</textarea>
                @error('about')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Work Experience Section -->
            <div class="mb-3">
                <label for="work_experience" class="form-label text-success">Work Experience</label>
                <textarea name="work_experience" id="work_experience" value="{{ old('work_experience', $doctor->work_experience) }}" class="form-control" placeholder="Describe your work experience">{{ old('work_experience', $doctor->work_experience) }}</textarea>
                @error('work_experience')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Experience Years Section -->
            <div class="mb-3">
                <label for="year_experience" class="form-label text-success">Experience Years</label>
                <input type="number" name="year_experience" id="year_experience" value="{{ old('year_experience', $doctor->year_experience) }}" class="form-control" placeholder="Enter the number of years of experience">
                @error('year_experience')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Specialization -->
            <div class="mb-3">
                <label for="specialization_id" class="form-label text-success">Specialization</label>
                <select name="specialization_id" id="specialization_id" class="form-control">
                    <option value="">Select Specialization</option>
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}" {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                            {{ $specialization->name }}
                        </option>
                    @endforeach
                </select>
                @error('specialization_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div id="available_time_container">
                <label for="specialization_id" class="form-label text-success">Available Times</label>
                <!-- Existing time slots -->
                <div class="available_time_slot">
                    <input type="hidden" name="available_time[0][id]" value="">
                    <input type="hidden" name="available_time[0][delete]" value="0" class="delete-flag">
                    <div class="availability-slot">
                        <select name="available_time[0][day_of_week]" class="form-control">
                            <option value="" selected disabled>Select Day</option>
                            <option value="Sunday">Sunday</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                        </select>
                    
                        <input type="time" name="available_time[0][start_time]" placeholder="Start Time">
                        <input type="time" name="available_time[0][end_time]" placeholder="End Time">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-2">
                <button type="submit" class="btn btn-success text-white py-2 px-4 rounded">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
