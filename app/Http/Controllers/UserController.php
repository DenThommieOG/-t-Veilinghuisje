<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('user.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens komen niet overeen met onze gegevens.',
        ]);
    }
    public function registerForm()
    {
        return view('user.register');
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (User::where('email', $credentials['email'])->first() != null) {
            return back()->withErrors([
                'email' => 'Het opgegeven email adres bestaat al.',
            ]);
        }

        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password'])
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens komen niet overeen met onze gegevens.',
        ]);
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('homepage');
    }
}
