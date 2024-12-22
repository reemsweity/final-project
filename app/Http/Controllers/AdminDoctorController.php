<?php

namespace App\Http\Controllers;
use App\Models\Specialization;
use App\Models\Testimonial;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDoctorController extends Controller
{
    // Display the list of doctors
    public function index()
    {
        $doctors = Doctor::all(); // You can modify this with pagination if needed
        return view('admin.sections.doctors.index', compact('doctors'));
    }

    // Show the create doctor form
   
    public function create()
{
    $specializations = Specialization::all(); // Retrieve all specializations
    return view('admin.sections.doctors.create', compact('specializations'));
}




    // Store a new doctor
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|string|min:8|confirmed',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Profile image validation
            'about' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'year_experience' => 'nullable|integer',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'available_time' => 'nullable|string',
            'specialization_id' => 'nullable|exists:specializations,id',
            'phone' => 'nullable|string',
        ]);

        // Handle the image upload
        if ($request->hasFile('profile_img')) {
            $imagePath = $request->file('profile_img')->store('profile_images', 'public');
        } else {
            $imagePath = null;
        }


        // Create the doctor record
        Doctor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'profile_img' => $imagePath,
            // 'about' => $validated['about'],
            // 'work_experience' => $validated['work_experience'],
            // 'year_experience' => $validated['year_experience'],
            // 'facebook' => $validated['facebook'],
            // 'twitter' => $validated['twitter'],
            // 'available_time' => $validated['available_time'],
            'specialization_id' => $validated['specialization_id'],
            // 'phone' => $validated['phone'],
            'is_admin_added' => true,
            'is_active' => true,
        ]);
        

        return redirect()->route('admin.doctors')->with('success', 'Doctor created successfully!');
    }

    // Show the details of a doctor
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.sections.doctors.show', compact('doctor'));
    }

    // Show the edit doctor form
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);  // Find the doctor by id
        $specializations = Specialization::all(); // Retrieve all specializations
        return view('admin.sections.doctors.edit', compact('doctor', 'specializations'));
    }

    // Update a doctor
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
            'facebook' => $validated['facebook'],
            'twitter' => $validated['twitter'],
            'available_time' => $validated['available_time'],
            'specialization_id' => $validated['specialization_id'],
            'phone' => $validated['phone'],
        ]);

        return redirect()->route('admin.doctors')->with('success', 'Doctor updated successfully!');
    }

    // Delete a doctor
    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);

        // Delete the profile image if it exists
        if ($doctor->profile_img) {
            Storage::disk('public')->delete('profile_images/' . $doctor->profile_img);
        }

        // Delete the doctor record
        $doctor->delete();

        return redirect()->route('admin.doctors')->with('success', 'Doctor deleted successfully!');
    }

    public function getAllDoctors(Request $request)
{
    // Check if a specialization ID is passed
    $specializationId = $request->get('specialization_id');

    // Retrieve doctors based on the selected specialization
    $query = Doctor::where('is_active', 1)->with('availability');

    if ($specializationId) {
        $query->where('specialization_id', $specializationId);
    }

    $doctors = $query->paginate(4); // Paginate doctors

    $specialties = Specialization::all(); // Retrieve all specializations

    return view('pages.doctors', compact('doctors', 'specialties'));
}

    

    
    public function showAllDoctors($id)
    {
        // Retrieve doctor data based on ID
        $doctor = Doctor::findOrFail($id);
        $reviews = $doctor->reviews()->orderBy('created_at', 'DESC')->paginate((8));
        // Return the view with doctor data
        return view('pages.drpage', compact('doctor','reviews'));
    }
 
    public function showSpecialization()
    {
        // Fetch all active specializations ordered by their creation date
        $specializations = Specialization::where('is_active', true)
        ->orderBy('created_at', 'desc')
        ->get();
                            $topDoctors = Doctor::orderBy('rating', 'desc')
                            // Sort by review count for tie-breakers
                            ->take(4) // Limit to 4 doctors
                            ->get();
                            $testimonials = Testimonial::where('is_active', true)
                            ->where('status', 1)  // Assuming 'status' 1 means approved testimonials
                            ->orderBy('rating', 'desc') // You can order by rating if needed
                            ->take(5) // Limiting to top 5 testimonials, change as necessary
                            ->get();

                            $specialties = Specialization::all();
        // Return the view with the specializations
        return view('pages.home-one', compact('specializations','topDoctors','testimonials','specialties'));
    }
    

   

   
  



        
}
