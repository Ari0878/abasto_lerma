<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Facade para autenticación
use Illuminate\Support\Facades\Hash;  // Facade para hashear contraseñas
use App\Models\Usuario;               // Modelo Usuario

class AuthController extends Controller
{
    // Muestra la vista del formulario de login
    public function showLogin()
    {
        return view('login');
    }

    // Maneja la acción de inicio de sesión
    public function login(Request $request)
    {
        // Obtener solo email y password del request
        $credentials = $request->only('email', 'password');

        // Intentar autenticar con las credenciales
        if (Auth::attempt($credentials)) {
            // Regenerar sesión para prevenir ataques de fijación de sesión
            $request->session()->regenerate();

            // Obtener usuario autenticado
            $user = Auth::user();

            // Redirigir según el rol del usuario
            if ($user->role === 'administrador') {
                return redirect()->route('dashboard'); // Admin va al dashboard
            } else {
                return redirect()->route('usuario.welcome'); // Usuario normal va a su bienvenida
            }
        }

        // Si falla la autenticación, regresar al login con error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // Cierra sesión del usuario actual
    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión de Laravel

        $request->session()->invalidate(); // Invalida la sesión actual
        $request->session()->regenerateToken(); // Regenera el token CSRF para seguridad

        // Redirige a la página de login
        return redirect('/login');
    }

    // Muestra la vista del formulario de registro
    public function showRegister()
    {
        return view('register');
    }

    // Maneja la acción de registro de un nuevo usuario
    public function register(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'name' => 'required', // Nombre obligatorio
            'email' => 'required|email|unique:usuarios,email', // Email obligatorio, válido y único en tabla usuarios
            'password' => 'required|confirmed', // Contraseña obligatoria y confirmada
        ]);

        // Crear el nuevo usuario en la base de datos con contraseña hasheada
        $user = Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'usuario', // Rol asignado por defecto, se puede cambiar si se desea
        ]);

        // Loguear automáticamente al usuario recién creado
        Auth::login($user);

        // Redirigir al login después de registro
        return redirect('/login');
    }
}
