<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import your User model if you're using Eloquent

class CustomerRegisterController extends Controller
{
    // Method to show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register'); // Make sure 'auth.register' corresponds to your registration form view
    }

    // Method to handle registration submission
    public function register(Request $request)
    {
        // Validate the registration request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user (assuming you are using Eloquent)
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), // Hash the password
        ]);

        // Optionally, you can automatically log in the user here if needed
        // Auth::login($user);

        // Redirect to a success page or any other appropriate action
        return redirect()->route('dashboard')->with('success', 'Registration successful!');
    }
}
