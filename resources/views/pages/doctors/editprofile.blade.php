@extends('pages.app')
@section('content')
@section('title', 'Edit Doctor Profile')
@section('breadcrumb', 'Edit Doctor Profile')

<div class="edit-profile-page" style="background-color: #fbfbfb; padding: 40px 20px; font-family: Arial, sans-serif;">
    <div class="container" style="max-width: 800px; margin: auto;">
        <form action="{{ route('doctor.profile.update', $doctor->id) }}" method="POST" enctype="multipart/form-data" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
            @csrf
            @method('PUT') <!-- Spoofing the PUT method -->

            <!-- Personal Information Section -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="color: #43ba7f;">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $doctor->name) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="color: #43ba7f;">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $doctor->email) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="phone" style="color: #43ba7f;">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $doctor->phone) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
<!-- About Section -->
<div class="form-group" style="margin-bottom: 20px;">
    <label for="about" style="color: #43ba7f;">About</label>
    <textarea name="about" id="about" 
              class="form-control" 
              style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
              placeholder="Write something about yourself">{{ old('about', $user->about ?? '') }}</textarea>
    @error('about') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<!-- Work Experience Section -->
<div class="form-group" style="margin-bottom: 20px;">
    <label for="work_experience" style="color: #43ba7f;">Work Experience</label>
    <textarea name="work_experience" id="work_experience" 
              class="form-control" 
              style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
              placeholder="Describe your work experience">{{ old('work_experience', $user->work_experience ?? '') }}</textarea>
    @error('work_experience') <span class="text-danger">{{ $message }}</span> @enderror
</div>

<!-- Experience Years Section -->
<div class="form-group" style="margin-bottom: 20px;">
    <label for="year_experience" style="color: #43ba7f;">Experience Years</label>
    <input type="number" name="year_experience" id="year_experience" 
           value="{{ old('year_experience', $user->experience_years ?? '') }}" 
           class="form-control" 
           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"
           placeholder="Enter the number of years of experience">
    @error('year_experience') <span class="text-danger">{{ $message }}</span> @enderror
</div>

            <!-- Specialization -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="specialization_id" style="color: #43ba7f;">Specialization</label>
                <select name="specialization_id" id="specialization_id" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="">Select Specialization</option>
                    @foreach($specializations as $specialization)
                        <option value="{{ $specialization->id }}" {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                            {{ $specialization->name }}
                        </option>
                    @endforeach
                </select>
                @error('specialization_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
<!-- Available Time Section -->
<div class="form-group" style="margin-bottom: 20px;">
    <label for="available_time" style="color: #43ba7f;">Available Time</label>
    <input type="text" name="available_time" id="available_time" 
           value="{{ old('available_time', $user->available_time ?? '') }}" 
           class="form-control" 
           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    @error('available_time') <span class="text-danger">{{ $message }}</span> @enderror
</div>

            <!-- Additional Information -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="experience" style="color: #43ba7f;">Years of Experience</label>
                <input type="number" name="experience" id="experience" value="{{ old('experience', $doctor->experience) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('experience') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="profile_img" style="color: #43ba7f;">Profile Image</label>
                <input type="file" name="profile_img" id="profile_img" class="form-control">
                @error('profile_img') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <!-- Password Section -->
            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #ccc;">
                <h4 style="color: #43ba7f;">Change Password</h4>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="current_password" style="color: #43ba7f;">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    @error('current_password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="password" style="color: #43ba7f;">New Password</label>
                    <input type="password" name="password" id="password" placeholder="Leave blank to keep current" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="password_confirmation" style="color: #43ba7f;">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
            </div>

            <button type="submit" style="background-color: #43ba7f; color: #ffffff; padding: 7px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Save Changes
            </button>
            <a href="{{ route('doctor.pages.doctors.profile') }}" class="btn btn-secondary" style="background-color: #ccc; padding: 7px; border-radius: 5px; color: #fff;">Cancel</a>
        </form>
    </div>
</div>

@endsection
