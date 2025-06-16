<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // Redirige según el rol
            if ($user->role === 'administrador') {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('usuario.welcome');
            }
        }
    
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegister()
{
    return view('register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|confirmed',
    ]);

    $user = Usuario::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'usuario', // Puedes cambiar a 'administrador' si quieres
    ]);

    Auth::login($user);

    return redirect('/login');
}

}

