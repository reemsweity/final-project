<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialization;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserAuthController extends Controller
{
    // Show the user signup form
    public function showSignupForm()
    {
        $specialties = Specialization::all();
        return view('pages.sign-up' ,compact('specialties'));
    }

    // Handle the user signup request
    public function signup(Request $request)
    {
        // Validate incoming request with custom password requirements
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum 8 characters
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[0-9]/', // At least one number
                'regex:/[@$!%*?&]/', // At least one special character
                'confirmed', // Match with password_confirmation
            ],
        ], [
            // Custom error messages
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone'=>$validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);
    
        // Log the user in
        Auth::login($user);
    
        // Redirect to the user dashboard or desired route
        return redirect()->route('home.specializations')->with('success', 'Account created successfully!');
        
    }
    


    // Show the user login form
    public function showLoginForm()
    {
        $specialties = Specialization::all();
        return view('pages.sign-in',compact('specialties'));
    }

    public function showAbout()
    {
        $specialties = Specialization::all();
        return view('pages.about-us',compact('specialties'));
    }
    public function showServices()
    {
        $specializations = Specialization::where('is_active',1)->get();
        return view('pages.service',compact('specializations'));
    }
    // Handle user login
    public function login(Request $request)
    {
        // Validate incoming request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Check if the authenticated user is active
            $user = Auth::user();
    
            if ($user->is_active == 0) {
                // Logout the inactive user
                Auth::logout();
    
                return back()->withErrors([
                    'email' => 'Your account is inactive. Please contact support.',
                ]);
            }
    
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();
    
            // Redirect to the home page
            return redirect()->route('home.specializations')->with('success', 'Login successfully!');
        }
    
        // Redirect back with error if authentication fails
        return back()->withErrors([
            'email' => 'The email address you entered is incorrect.',
            'password' => 'The password you entered is incorrect.',
        ]);
    }
    

    // User logout
  public function logout(Request $request)
{
    Auth::logout(); // Automatically uses the web guard for user authentication
    $request->session()->forget('user_session');
    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return redirect('home'); // Redirect to the login page
}
  

public function profile(Request $request)
{
    $user = Auth::user(); // Get the authenticated user

    // Get the selected status filter from the request (if any)
    $status = $request->input('status');

    // Query appointments for the authenticated user, applying any status filter
    $appointments = Appointment::where('user_id', $user->id)
                                ->when($status, function($query) use ($status) {
                                    return $query->where('status', $status);
                                })
                                ->orderBy('created_at', 'DESC')
                                ->paginate(10);  // Adjust number as needed
                                $specialties = Specialization::all();
    return view('profile', compact('user', 'appointments','specialties'));
}



public function showEditForm()
{
    $specialties = Specialization::all();
    $user = Auth::user(); // Get the authenticated user
    return view('editprofile', compact('user','specialties'));
}

public function update(Request $request, $id)
{
    // Validate incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'nullable|string|max:20',
        'age' => 'nullable|integer',
        'gender' => 'nullable|string|in:male,female',
        'password' => 'nullable|string|min:8|confirmed',
        'profile_img' => 'nullable|image|max:2048', // Optional image validation
        'current_medications' => 'nullable|string',
        'allergies' => 'nullable|string',
        'medical_history' => 'nullable|string',
    ]);

    // Fetch the user
    $user = User::findOrFail($id);

    // Handle profile image upload
    if ($request->hasFile('profile_img')) {
        // Check if the user already has an image and delete it
        if ($user->profile_img) {
            $imagePath = str_replace('/storage/', '', $user->profile_img);
            Storage::disk('public')->delete($imagePath);
        }

        // Get the new image file
        $profileImage = $request->file('profile_img');
        // Generate a unique name for the new image
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        // Store the new image in 'public/profile_images' directory
        $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
        // Save the new image path in the database (without 'public' prefix)
        $validated['profile_img'] = 'storage/profile_images/' . $imageName;
    }

    // Check if password is provided and hash it
    if (!empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        // Remove password from validated data if it's not being updated
        unset($validated['password']);
    }

    // Update the user with validated data
    $user->fill($validated);
    $user->save();

    return redirect()->route('profile')->with('success', 'User updated successfully.');
}



}

