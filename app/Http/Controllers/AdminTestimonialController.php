<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    { 
        $testimonials = Testimonial::with(['user'])->paginate(10);
        return view('admin.sections.testimonials.index', compact('testimonials'));
    }
    public function show($id)
    {
        // Fetch the review by ID
        $testimonial = Testimonial::with(['user'])->findOrFail($id);

        return view('admin.sections.testimonials.show', compact('testimonial'));
    }
    public function destroy(Testimonial $testimonial)
    {

        $testimonial->delete();
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'is_active' => 'required|in:0,1',
    ]);

    $testimonial = Testimonial::findOrFail($id);
    $testimonial->is_active = $request->is_active;
    $testimonial->save();

    return redirect()->route('admin.testimonials')->with('success', 'Testimonial status updated successfully!');
}





public function create()
    {
        $users = User::all();
        return view('admin.sections.testimonials.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'testimonial_text' => 'required|string',
            'rating' => 'required|integer|between:1,5',
            'is_active' => 'required|in:0,1',
        ]);

        Testimonial::create([
            'user_id' => $request->user_id,
            'testimonial_text' => $request->testimonial_text,
            'rating' => $request->rating,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.testimonials')->with('success', 'Testimonial added successfully!');
    }

}