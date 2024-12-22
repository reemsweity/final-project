<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    public function login(Request $request)
{
    // Validate the incoming request
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Normalize the email to lowercase
    $credentials['email'] = strtolower($credentials['email']);

    // Attempt to authenticate using the 'admin' guard
    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate(); // Regenerate session to prevent session fixation
        
        return redirect()->route('admin.reports'); // Redirect to admin dashboard
    }
   
    
    // Redirect back with error if authentication fails
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin.login');
    }

    
}
