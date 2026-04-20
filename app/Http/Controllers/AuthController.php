<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
            'email' => ['required', 'email', Rule::unique('users', 'email')],
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

        // @dd($user);

        //  Redirect to the main page
        return redirect('/')->with('success', 'Registered in Successfully');

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
                ->withErrors(['password' => 'Invalid Credentials'])->withInput();
            // return redirect('/hello')->with('success', 'Logged in Successfully');
        }
        $request->session()->regenerate();

        return redirect('/ideas')->with('success', '');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('login');
    }

    public function view(Request $request)
    {
        return view('auth.login');
    }
}
