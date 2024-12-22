@extends('pages.app')
@section('content')
@section('title', 'Edit Profile')
@section('breadcrumb', 'Edit Profile')

<div class="edit-profile-page" style="background-color: #fbfbfb; padding: 40px 20px; font-family: Arial, sans-serif;">
    <div class="container" style="max-width: 800px; margin: auto;">
        <form action="{{ route('profile.update',$user->id) }}" method="POST" enctype="multipart/form-data" style="background: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);">
            @csrf

            <!-- Personal Information Section -->
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="color: #43ba7f;">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="color: #43ba7f;">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="phone" style="color: #43ba7f;">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="gender" style="color: #43ba7f;">Gender</label>
                <select name="gender" id="gender" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                    <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="age" style="color: #43ba7f;">Age</label>
                <input type="number" name="age" id="age" value="{{ old('age', $user->age) }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="profile_img" style="color: #43ba7f;">Profile Image</label>
                <input type="file" name="profile_img" id="profile_img" class="form-control">
                @error('profile_img') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="current_medications" style="color: #43ba7f;">Current Medications</label>
                <input type="text" name="current_medications" id="current_medications" 
                       value="{{ old('current_medications', $user->current_medications ?? '') }}" 
                       class="form-control" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('current_medications') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="allergies" style="color: #43ba7f;">Allergies</label>
                <input type="text" name="allergies" id="allergies" 
                       value="{{ old('allergies', $user->allergies ?? '') }}" 
                       class="form-control" 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                @error('allergies') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="medical_history" style="color: #43ba7f;">Medical History</label>
                <textarea name="medical_history" id="medical_history" 
                          class="form-control" 
                          style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">{{ old('medical_history', $user->medical_history ?? '') }}</textarea>
                @error('medical_history') <span class="text-danger">{{ $message }}</span> @enderror
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

            <button type="submit" style="background-color: #43ba7f; color: #ffffff; padding: 7px ; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                Save Changes
            </button>
            <a href="{{ route('profile') }}" class="btn btn-secondary" style="background-color: #ccc; padding: 7px; border-radius: 5px; color: #fff;">Cancel</a>
        </form>
    </div>
</div>

@endsection
