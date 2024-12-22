<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.sections.users.index', compact('users')); // Adjust view path as needed
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.sections.users.create'); // Adjust view path as needed
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.sections.users.edit', compact('user')); // Adjust view path as needed
    }

    /**
     * Update the specified user in the database.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'current_medications' => 'nullable|string',
            'allergies' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer|min:1',
            'is_active' => 'required|boolean',
            'profile_img' => 'nullable|image|max:2048',
        ]);
   
        // Check for image upload
        if ($request->hasFile('profile_img')) {
            $profileImage = $request->file('profile_img');
            $imageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $imagePath = $profileImage->storeAs('public/profile_images', $imageName);
           

            $validatedData['profile_img'] = 'storage/public/profile_images/' . $imageName;
        }
    
        // Create the user
        $user = User::create($validatedData);
    
        // Return success message
        return redirect()->route('admin.users')->with('success', 'User created successfully');
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
            'is_active' => 'required|boolean',
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
    
        // Update other fields
        $user->fill($validated);
        $user->save();
    
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }
    /**
     * Display the specified user.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.sections.users.show', compact('user'));
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy(User $user)
    {
        // Debug: Log or dump the user ID
        logger("Deleting user with ID: {$user->id}");

        // Check if the user has a profile image and delete it
        if ($user->profile_img) {
            $imagePath = str_replace('/storage/', '', $user->profile_img);
            Storage::disk('public')->delete($imagePath);
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', 'User deleted successfully');
    }
}
