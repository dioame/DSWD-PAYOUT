<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication was successful...
            $request->session()->regenerate();

            return redirect()->intended('index'); // Change to your intended route
        }

        // Authentication failed...
        return back()->withErrors([
            'error_message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Validate the request
        $data = $request->validate([
            'id_number' => ['required', 'string', 'unique:users,username'],
            'name' => ['required', 'string'],
        ]);

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'username' => $data['id_number'],
            'password' => Hash::make('kcpdspassword'), // Default password
        ]);

        // Optionally, log the user in after registration
        Auth::login($user);

        return redirect()->intended('index'); // Change to your intended route
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    
}