<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Usuario;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.edit-profile');
    }

    public function update(Request $request)
    {
        $usuario = Usuario::find(auth()->id());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios')->ignore($usuario->id)],
            'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            'new_password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('new_password')) {
            $usuario->password = Hash::make($request->new_password);
        }

        $usuario->save();

        // Redirigir según el rol del usuario
        if (auth()->user()->role === 'usuario') {
            return redirect()->route('usuario.welcome')->with('success', 'Perfil actualizado correctamente');
        } else {
            return redirect()->route('dashboard')->with('success', 'Perfil actualizado correctamente');
        }
    }
} 