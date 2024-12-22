<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function users()
    {
        return view('admin.sections.users', ['message' => 'Hello User']);
    }

    public function doctors()
    {
        return view('admin.sections.doctors', ['message' => 'Hello Doctor']);
    }

    public function reviews()
    {
        return view('admin.sections.reviews', ['message' => 'Hello Review']);
    }

    public function payments()
    {
        return view('admin.sections.payments.index', ['message' => 'Hello Payment']);
    }
    public function consultations()
    {
        return view('admin.sections.consultations.index', ['message' => 'Hello consultations']);
    }
    public function testimonials()
    {
        return view('admin.sections.testimonials.index', ['message' => 'Hello testimonials']);
    }
    public function contacts()
    {
        return view('admin.sections.contacts.index', ['message' => 'Hello contacts']);
    }

public function specializations()
{
    return view('admin.sections.specializations.index', ['message' => 'Hello contacts']);
}

public function profile()
{
    $admin = Auth::guard('admin')->user(); // Retrieve the authenticated admin
    return view('admin.profile.index', compact('admin')); // Pass the admin data to the view
}
public function editProfile()
{
    $admin = Auth::guard('admin')->user(); // Get authenticated admin
    return view('admin.profile.editprofile', compact('admin'));
}

public function update(Request $request)
{
    // Get authenticated admin
    $admin = Auth::guard('admin')->user();

    // Validate incoming data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:admins,email,' . $admin->id, 
        'profile_img' => 'nullable|image|max:2048',  
        'current_password' => 'nullable|string|',
        'new_password' => 'nullable|string|min:8',
        'confirm_new_password' => 'nullable|string|same:new_password',
    ]);

    // Handle password update
    if ($request->filled('new_password')) {
        if (Hash::check($request->current_password, $admin->password)) {
            $validated['password'] = Hash::make($request->new_password);
        } else {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
    }
    
    
    

    // Handle profile image upload
    if ($request->hasFile('profile_img')) {
        // Check if the admin already has a profile image and delete it
        if ($admin->profile_img) {
            // Remove the old profile image from storage
            $imagePath = str_replace('/storage/', '', $admin->profile_img);
            Storage::disk('public')->delete($imagePath);
        }

        // Get the uploaded profile image file
        $profileImage = $request->file('profile_img');
        
        // Generate a unique name for the new image
        $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
        
        // Store the new image in the 'public/profile_images' directory
        $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
        
        // Save the new image path in the database (without the 'public' prefix)
        $validated['profile_img'] = 'storage/profile_images/' . $imageName;
    }

    // Update the admin's profile with the validated data (name, email, profile_img, and password)
    $admin->update($validated);

    // Redirect back to the profile page with a success message
    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
}





}
