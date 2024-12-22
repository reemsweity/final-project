<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['doctor', 'user'])->get();
        
        return view('admin.sections.reviews.index', compact('reviews'));
    }

    // Show reviews for a doctor
    
    public function show($id)
    {
        // Fetch the review by ID
        $review = Review::with(['doctor', 'user'])->findOrFail($id);

        return view('admin.sections.reviews.show', compact('review'));
    }
    // Store a new review
    public function store(Request $request, $doctorId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review = new Review();
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->user_id = auth()->id();  // Assuming user is logged in
        $review->doctor_id = $doctorId;
        $review->status = 'pending'; // Review is pending until admin approves it
        $review->is_active = 1;

        $review->save();

        return redirect()->route('reviews.show', $doctorId)->with('success', 'Review submitted successfully and is awaiting approval.');
    }

    public function approve($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->status = 'approved';
        $review->save();
    
        return redirect()->route('admin.reviews')->with('success', 'Review approved successfully.');
    }
    
    public function reject($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->status = 'rejected';
        $review->save();
    
        return redirect()->route('admin.reviews')->with('error', 'Review rejected.');
    }
    public function destroy(Review $review)
    {

        $review->delete();
        return redirect()->route('admin.reviews')->with('success', 'Review deleted successfully');
    }
    // Controller to Store Reviews
public function storeDetails(Request $request, $doctorId)
{
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    // Check if the user is logged in
    if (!auth()->check()) {
        return redirect()->route('user.login.form')->with('error', 'You must be logged in to submit a review.');
    }

    // Save review
    $review = new Review();
    $review->rating = $request->input('rating');
    $review->comment = $request->input('comment');
    $review->user_id = auth()->id();  // Use logged in user's ID
    $review->doctor_id = $doctorId;
    $review->status = 'pending';  // Default status as pending until admin approval
    $review->is_active = 1; // Active by default
    $review->save();

    // Redirect back with success message
    return redirect()->route('user.doctorsdetailes', $doctorId)->with('success', 'Your review has been submitted and is awaiting approval.');
}
public function destroys($reviewId)
{
    $review = Review::findOrFail($reviewId);

    // Ensure the review belongs to the logged-in user
    if ($review->user_id != auth()->id()) {
        return redirect()->route('user.doctorsdetailes', $review->doctor_id)->with('error', 'Unauthorized access.');
    }

    $doctorId = $review->doctor_id; // Store doctor ID for redirection
    $review->delete();

    return redirect()->route('user.doctorsdetailes', $doctorId)->with('success', 'Review deleted successfully.');
}

public function updates(Request $request, $id)
{
    $review = Review::findOrFail($id);

    // Ensure the logged-in user owns the review
    if ($review->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Unauthorized action.');
    }

    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    $review->rating = $request->input('rating');
    $review->comment = $request->input('comment');
    $review->save();

    return redirect()->back()->with('success', 'Review updated successfully.');
}
public function edits($reviewId)
{
    $review = Review::findOrFail($reviewId);

    // Ensure the review belongs to the logged-in user
    if ($review->user_id != auth()->id()) {
        return redirect()->route('user.doctorsdetailes', $review->doctor_id)->with('error', 'Unauthorized access.');
    }

    return view('pages.reviews.edit', compact('review'));
}

}
