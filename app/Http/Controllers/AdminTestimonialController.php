<?php
namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index()
    { 
        $testimonials = Testimonial::with(['doctor', 'user'])->paginate(10);
        return view('admin.sections.testimonials.index', compact('testimonials'));
    }
    public function show($id)
    {
        // Fetch the review by ID
        $testimonial = Testimonial::with(['doctor', 'user'])->findOrFail($id);

        return view('admin.sections.testimonials.show', compact('testimonial'));
    }
    public function destroy(Testimonial $testimonial)
    {

        $testimonial->delete();
        return redirect()->route('admin.testimonials')->with('success', 'Testimonial deleted successfully');
    }

    
    public function approve($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->status = 'approved';
    $testimonial->save();

    return redirect()->route('admin.testimonials.show', $id)->with('success', 'Testimonial approved successfully.');
}

public function reject($id)
{
    $testimonial = Testimonial::findOrFail($id);
    $testimonial->status = 'rejected';
    $testimonial->save();

    return redirect()->route('admin.testimonials.show', $id)->with('error', 'Testimonial rejected.');
}

}