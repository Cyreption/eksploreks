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
     * Display dashboard with user data.
     */
    public function dashboard()
    {
        // Check if user is logged in
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Get user from session
        $user = session('user');

        // Sample recommended places
        $recommendedPlaces = [
            [
                'id' => 1,
                'name' => 'Aroma Deli Coffee',
                'address' => 'Jalan Raya Puputan No. 88',
                'image' => 'https://images.unsplash.com/photo-1495521821757-a1efb6729352?w=200&h=200&fit=crop',
                'initial' => 'AD'
            ],
            [
                'id' => 2,
                'name' => 'The Daily Grind',
                'address' => 'Jalan Diponegoro No. 45',
                'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b3f7?w=200&h=200&fit=crop',
                'initial' => 'DG'
            ],
            [
                'id' => 3,
                'name' => 'Coffee House Corner',
                'address' => 'Jalan Ahmad Yani No. 23',
                'image' => 'https://images.unsplash.com/photo-1501339847302-ac426a36c86d?w=200&h=200&fit=crop',
                'initial' => 'CC'
            ],
            [
                'id' => 4,
                'name' => 'Bean Street Cafe',
                'address' => 'Jalan Sudirman No. 67',
                'image' => 'https://images.unsplash.com/photo-1442512595331-e89e6e893643?w=200&h=200&fit=crop',
                'initial' => 'BS'
            ],
            [
                'id' => 5,
                'name' => 'Latte Art Studio',
                'address' => 'Jalan Gatot Subroto No. 12',
                'image' => 'https://images.unsplash.com/photo-1453614512568-c4024d13c247?w=200&h=200&fit=crop',
                'initial' => 'LA'
            ],
            [
                'id' => 6,
                'name' => 'Brew & Bloom',
                'address' => 'Jalan Merdeka No. 99',
                'image' => 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200&h=200&fit=crop',
                'initial' => 'BB'
            ],
        ];

        return view('dashboard.dashboard', compact('user', 'recommendedPlaces'));
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
