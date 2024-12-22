<?php

namespace App\Http\Controllers;

use App\Models\Contact_msg;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    // Show contact form
    public function showForm()
    {
        return view('pages/contact-us');
    }

    // Store a new message
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'msg' => 'required|string',
        ]);

        // Save the contact message
        Contact_msg::create([
            'user_id' => auth()->check() ? auth()->id() : null, // Null for unauthenticated users
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'msg' => $request->msg,
            'status' => 'unread', // Default status
            'is_active' => 1,
        ]);

        // Redirect or respond with success
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
