<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        return view('auth.register');
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

        // Validating the User request
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique'],
            'password' => ['required'],
        ]);

        // Create and storing the User in the Database
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        // Login the User
        Auth::login($user);

        //  Redirect to the main page
        return redirect('/')->with('success', 'Registered in Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request, User $user)
    {
        // Validating the User request
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique'],
            'password' => ['required'],
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/')->with('success', 'Logged in Successfully');
        }

        return back()->withErrors([
            'email ' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return view('auth/login');
    }
}
