<?php
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use App\Models\User;

// class AdminLoginController extends Controller
// {
//     public function showLoginForm()
//     {
//         return view('auth.admin-login');
//     }

//     public function login(Request $request)
// {
    
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

   
//     $credentials['email'] = strtolower($credentials['email']);

    
//     if (Auth::guard('admin')->attempt($credentials)) {
//         $request->session()->regenerate(); 
//         return redirect()->intended('/admin/dashboard'); 
//     }

    
//     return back()->withErrors([
//         'email' => 'The provided credentials do not match our records.',
//     ]);
// }


//     public function logout(Request $request)
//     {
//         Auth::guard('admin')->logout();

//         return redirect('/');
//     }
// }
