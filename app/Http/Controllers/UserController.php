<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Login formulier
     */
    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * login controleren
     */
    public function login(Request $request)
    {
        //Validatie
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Als authoriseren lukt, hergenereer sessie met inlog
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }

        //Als login niet correct is, ga terug met een error
        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens komen niet overeen met onze gegevens.',
        ]);
    }
    /**
     * Registreer formulier
     */
    public function registerForm()
    {
        return view('user.register');
    }

    /**
     * Regristratie
     */
    public function register(Request $request)
    {

        // Valideer input
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Controlleer of de email al bestaat, ja? geef error
        if (User::where('email', $credentials['email'])->first() != null) {
            return back()->withErrors([
                'email' => 'Het opgegeven email adres bestaat al.',
            ]);
        }

        //Maak gebruiker
        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password'])
        ]);

        //Login met nieuwe gebruiker
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }

        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens komen niet overeen met onze gegevens.',
        ]);
    }

    /**
     * Uitloggen
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('homepage');
    }
}
