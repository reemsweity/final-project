<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Specialization;
class DoctorAuthController extends Controller
{
    // Show the doctor signup form
    public function showSignupForm()
    {
        return view('pages.doctors.signup'); // Adjust the view path as per your structure
    }

    // Handle the doctor signup request
    public function signup(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|string|min:8|confirmed',
            'specialization' => 'required|string|max:255',
        ]);

        // Create the doctor
        $doctor = Doctor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'specialization' => $validated['specialization'],
        ]);

        // Log the doctor in
        Auth::guard('doctor')->login($doctor);

        // Redirect to the doctor dashboard or desired route
        return redirect()->route('home.specializations')->with('success', 'Signup successful!');
    }

    // Show the doctor login form
    public function showLoginForm()
    {
        return view('pages.doctors.login'); // Adjust the view path as per your structure
    }

    // Handle doctor login
    public function login(Request $request)
    {
        // Validate incoming request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the doctor
        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->route('doctor.pages.doctors.profile')->with('success', 'Login successful!');
        }
    
        // Redirect back with custom error messages if authentication fails
        return back()->withErrors([
            'email' => 'The email address you entered is incorrect.',
            'password' => 'The password you entered is incorrect.',
        ]);
    }
    

    // Doctor logout
    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('doctor/login');
    }
    

    // Show doctor profile
    public function profile()
    {
        $doctor = Auth::guard('doctor')->user(); // Get the authenticated doctor
        return view('pages.doctors.profile', compact('doctor')); // Adjust the view path
    }
    public function showEditForm()
    {
    $doctor = Auth::guard('doctor')->user();
    $specializations = Specialization::all(); // Retrieve all specializations
    return view('pages.doctors.editprofile', compact('doctor', 'specializations'));
}

    
    // Update doctor profile
    public function update(Request $request, $id)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Profile image validation
            'about' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'year_experience' => 'nullable|integer',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'available_time' => 'nullable|string',
            'specialization_id' => 'nullable|exists:specializations,id',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('profile_img')) {
            // Delete the old image if it exists
            if ($doctor->profile_img) {
                Storage::disk('public')->delete('profile_images/' . $doctor->profile_img);
            }

            // Store the new image
            $imagePath = $request->file('profile_img')->store('profile_images', 'public');
        } else {
            $imagePath = $doctor->profile_img; // Retain the old image if no new file is uploaded
        }

        // Update the doctor record
        $doctor->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'profile_img' => $imagePath,
            'about' => $validated['about'],
            'work_experience' => $validated['work_experience'],
            'year_experience' => $validated['year_experience'],
           
            'available_time' => $validated['available_time'],
            'specialization_id' => $validated['specialization_id'],
            'phone' => $validated['phone'],
        ]);
        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            // Remove password from validated data if it's not being updated
            unset($validated['password']);
        }

        return redirect()->route('doctor.pages.doctors.profile')->with('success', 'Doctor updated successfully!');
    }



    public function filterDoctorsBySpecialty($specialty_id)
    {
        
        // Retrieve the specialization by ID
        $specialties = Specialization::find($specialty_id);
    
        // Check if the specialization exists
        if (!$specialties) {
            
            // Handle the case where the specialty does not exist
            return redirect()->route('user.doctors')->with('error', 'Specialization not found.');
        }
    
        // Retrieve doctors that belong to the selected specialization
        $doctors = $specialties->doctors;
    
        // Pass the doctors and the selected specialty to the view
        return view('pages.doctors', compact('doctors', 'specialties'));
    }
  

    

}
