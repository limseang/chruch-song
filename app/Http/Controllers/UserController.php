<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;  // For password verification
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use function Laravel\Prompts\password;// For authentication session


class UserController extends Controller
{
   // Show login form
    public function showLoginForm()
    {
        return view('login'); // make sure you have login.blade.php
    }

    // Handle login
    public function login(Request $request)
    {
        // dd($request->email);
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        // Attempt login
        $user = User::where('email', $request->email)->first();

        if (!$user) {
        // If user not found
        return back()->withErrors([
            'email' => 'User with this email does not exist',
        ])->withInput();
        }

        // Check password
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password',
            ])->withInput();
        }

        // If both correct → login user
        Auth::login($user);

        return redirect()->route('upload_song')->with('success', 'Login successful!');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    // Handle signup form submission
    public function signup(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // confirm password
        ]);

        // dd("testing $request->name");

        // Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // hash password
        ]); 

        // Auto login after signup (optional)
        Auth::login($user);

        // Redirect to dashboard or anywhere
        return redirect()->route('upload_song')->with('success', 'Account created successfully!');
    }

    public function apiSignup(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Signup successful',
            'user'    => $user,
            'token'   => $token,
        ], 201);
    }

    // ✅ API Login
    public function apiLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user'    => $user,
            'token'   => $token,
        ], 200);
    }

    // ✅ API Logout
    public function apiLogout(Request $request)
    {
        // Revoke all tokens for this user
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ], 200);
    }
}