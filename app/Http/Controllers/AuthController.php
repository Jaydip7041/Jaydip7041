<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Use the User model instead of Auth
use Illuminate\Support\Facades\Auth; // Use the Auth facade
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the login page
    public function index()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home'); // Redirect to home page after successful login
        }

        // Flash error message
        session()->flash('error', 'Invalid credentials');

        return back(); // Redirect back with error message
    }

    // Show the registration page
    public function registr_view()
    {
        return view('auth.register');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate registration input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users', // Check against 'users' table
            'password' => 'required|confirmed|min:6' // Ensure password confirmation
        ]);

        // Save the user to the 'users' table
        $user = User::create([ // Use User::create instead of Auth::create
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Hash the password
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to home page after successful registration and login
        return redirect()->route('home');
    }

    // Home page after successful login
    public function home()
    {
        return view('home');
    }
    public function logout()
    {
        session()->flash('success', 'You have been logged out successfully.');
        Auth::logout();
        return redirect()->route('login');
    }
}
