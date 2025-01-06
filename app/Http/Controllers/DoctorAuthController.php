<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Specialization;
use App\Models\DoctorAvailability;
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
        $specialties = Specialization::all();
        return view('pages.doctors.login',compact('specialties')); // Adjust the view path as per your structure
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

        return redirect('home');
    }
    

    // Show doctor profile
    public function editprofile()
    {
        $specializations = Specialization::all(); 
       

        $specialties = Specialization::all();
        $doctor = Auth::guard('doctor')->user(); // Get the authenticated doctor
        $availability = $doctor->availability;
        return view('pages.doctors.editprofiledoctor', compact('doctor','specialties','specializations','availability')); // Adjust the view path
    }
    public function profile()
    {
       
        $specialties = Specialization::all();
        $doctor = Auth::guard('doctor')->user(); // Get the authenticated doctor
        return view('pages.doctors.profiledoctor', compact('doctor','specialties')); // Adjust the view path
    }

    public function deleteAvailability($id)
{
    // Find the availability by ID
    $availability = DoctorAvailability::find($id);

    // Check if the availability belongs to the currently logged-in doctor
    if (!$availability || $availability->doctor_id != auth()->guard('doctor')->id()) {
        return redirect()->back()->with('error', 'You are not authorized to delete this availability.');
    }

    // Delete the availability
    $availability->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Availability deleted successfully.');
}

    // Update doctor profile
    public function update(Request $request, $id)
    {
        
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'about' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'year_experience' => 'nullable|integer',
            'specialization_id' => 'nullable|exists:specializations,id',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
            'available_time' => 'nullable|array',
            'available_time.*.day_of_week' => 'nullable|string',
            'available_time.*.start_time' => 'nullable|date_format:H:i',
            'available_time.*.end_time' => 'nullable|date_format:H:i',
            'available_time.*.delete' => 'nullable|in:0,1',
        ]);
    
        // Find the doctor by ID
        $doctor = Doctor::findOrFail($id);
    
        // Handle Profile Image
        if ($request->hasFile('profile_img')) {
            if ($doctor->profile_img) {
                Storage::disk('public')->delete('profile_images/' . $doctor->profile_img);
            }
            $imagePath = $request->file('profile_img')->store('profile_images', 'public');
        } else {
            $imagePath = $doctor->profile_img;
        }
    
        // Update doctor info
        $doctor->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'profile_img' => $imagePath,
            'about' => $validated['about'],
            'work_experience' => $validated['work_experience'],
            'year_experience' => $validated['year_experience'],
            'specialization_id' => $validated['specialization_id'],
            'phone' => $validated['phone'],
        ]);
    
        // Update available times
        if (isset($validated['available_time'])) {
            foreach ($validated['available_time'] as $timeSlot) {
                if (isset($timeSlot['delete']) && $timeSlot['delete'] == '1' && isset($timeSlot['id'])) {
                    // Delete existing availability if marked
                    $doctor->availability()->where('id', $timeSlot['id'])->delete();
                } elseif (!empty($timeSlot['day_of_week']) && !empty($timeSlot['start_time']) && !empty($timeSlot['end_time'])) {
                    if (isset($timeSlot['id']) && !empty($timeSlot['id'])) {
                        // Update existing availability
                        $doctor->availability()->where('id', $timeSlot['id'])->update([
                            'day_of_week' => $timeSlot['day_of_week'],
                            'start_time' => $timeSlot['start_time'],
                            'end_time' => $timeSlot['end_time'],
                        ]);
                    } else {
                        // Add new availability
                        $doctor->availability()->create([
                            'day_of_week' => $timeSlot['day_of_week'],
                            'start_time' => $timeSlot['start_time'],
                            'end_time' => $timeSlot['end_time'],
                        ]);
                    }
                }
            }
        }
    
        // Handle password change if present
        if (!empty($validated['password'])) {
            $doctor->update(['password' => Hash::make($validated['password'])]);
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
    public function showAppointments(Request $request)
    {
        // Get the authenticated doctor
        $doctor = Auth::guard('doctor')->user();
    
        // Check if the doctor is authenticated
        if (!$doctor) {
            return redirect()->route('doctor.login')->with('error', 'Please log in to view your appointments.');
        }
    
        // Get the status from the request, if any
        $status = $request->input('status');
    
        // Build the query to get appointments
        $query = Appointment::where('doctor_id', $doctor->id);
    
        // Apply filter if status is selected
        if ($status) {
            $query->where('status', $status);
        }
    
        // Get the appointments for the authenticated doctor with pagination
        $appointments = $query->orderBy('created_at', 'DESC')->paginate(10);
    
        // Optionally, you can get specialties if needed for the view
        $specialties = Specialization::all();
    
        // Return the view with the doctor's appointments and specialties
        return view('pages.doctors.appointment', compact('doctor', 'appointments', 'specialties'));
    }
    

    public function showUser($id){
        $user = User::findOrFail($id);
        $specialties = Specialization::all();
        return view('pages.doctors.userinfo',compact('user','specialties'));
    }


    public function updateZoom(Request $request)
{
    $request->validate([
        'appointment_id' => 'required|exists:appointments,id',
        'zoom_link' => [
        'nullable',
        'url',
        function ($attribute, $value, $fail) {
            if (!str_starts_with($value, 'https://zoom.us/')) {
                $fail('The Zoom link must start with "https://zoom.us/".');
            }
        },
    ],
        'zoom_pass' => 'nullable|string',
    ]);

    $appointment = Appointment::findOrFail($request->appointment_id);
    $appointment->zoom_link = $request->zoom_link;
    $appointment->zoom_pass = $request->zoom_pass;
    $appointment->save();

    return redirect()->back()->with('success', 'Zoom details updated successfully.');
}

public function updateStatus(Request $request, $id)
{
    // Validate the status input
    $request->validate([
        'status' => 'required|in:pending,confirmed,completed,cancelled',
    ]);

    // Find the appointment
    $appointment = Appointment::findOrFail($id);

    // Update the status
    $appointment->status = $request->input('status');
    $appointment->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Appointment status updated successfully.');
}


public function showAllDoctors($id)
    {
        // Retrieve doctor data based on ID
        $doctor = Doctor::findOrFail($id);
        $specialties =Specialization::all();
        $reviews = $doctor->reviews()->orderBy('created_at', 'DESC')->paginate((8));
        // Return the view with doctor data
        return view('pages.doctors.drpage', compact('doctor','reviews','specialties'));
    }

    public function getUserDetails($id)
{
    $user = User::findOrFail($id);
    return response()->json($user);
}


}