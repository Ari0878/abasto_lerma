<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Usuario;

class ProfileController extends Controller
{
    // Muestra el formulario para editar el perfil del usuario autenticado
    public function edit()
    {
        return view('admin.edit-profile');
    }

    // Actualiza los datos del perfil del usuario
    public function update(Request $request)
    {
        // Busca al usuario autenticado por su ID
        $usuario = Usuario::find(auth()->id());

        // Valida los datos del formulario
        $request->validate([
            'name' => ['required', 'string', 'max:255'], // El nombre es obligatorio, de tipo string y máximo 255 caracteres
            'email' => ['required', 'string', 'email', 'max:255',
                Rule::unique('usuarios')->ignore($usuario->id) // El correo debe ser único, excepto el del usuario actual
            ],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'], // La contraseña actual es requerida si se desea cambiar la contraseña
            'new_password' => ['nullable', 'min:8', 'confirmed'], // La nueva contraseña debe tener al menos 8 caracteres y coincidir con la confirmación
        ]);

        // Actualiza el nombre y correo del usuario
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        // Si se proporcionó una nueva contraseña, la actualiza encriptada
        if ($request->filled('new_password')) {
            $usuario->password = Hash::make($request->new_password);
        }

        // Guarda los cambios en la base de datos
        $usuario->save();

        // Redirige al usuario según su rol, mostrando un mensaje de éxito
        if (auth()->user()->role === 'usuario') {
            return redirect()->route('usuario.welcome')->with('success', 'Perfil actualizado correctamente');
        } else {
            return redirect()->route('dashboard')->with('success', 'Perfil actualizado correctamente');
        }
    }
}
