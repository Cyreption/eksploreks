<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration process.
     */
    public function register(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'institution' => 'required|string|max:255',
            'department'  => 'required|string|max:255',
            'birth_date'  => 'required|date',
            'password'    => 'required|string|min:6|confirmed',
        ]);

        // Create new user
        User::create([
            'username'      => explode('@', $validated['email'])[0],
            'email'         => $validated['email'],
            'full_name'     => $validated['name'],
            'institution'   => $validated['institution'],
            'department'    => $validated['department'],
            'birth_date'    => $validated['birth_date'],
            'password_hash' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login dengan email Anda.');
    }

    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle the login process.
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Find user by email
        $user = User::where('email', $validated['email'])->first();

        // Check if user exists and password is correct
        if (!$user || !Hash::check($validated['password'], $user->password_hash)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
        }

        // Store user in session
        session(['user_id' => $user->user_id, 'user' => $user]);

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
    }

    /**
     * Handle the logout process.
     */
    public function logout()
    {
        session()->forget(['user_id', 'user']);
        return redirect()->route('login')->with('success', 'Anda berhasil logout.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
