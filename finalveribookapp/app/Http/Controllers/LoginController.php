<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (auth()->attempt($credentials)) {
            // Authentication passed
            return redirect()->route('room.index');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout the user
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
