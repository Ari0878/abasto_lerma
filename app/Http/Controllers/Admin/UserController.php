<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
{
    $users = Usuario::paginate(10);
    $logs = LoginLog::with('user')->latest()->take(10)->get(); // o lo que necesites

    return view('admin.users.index', compact('users', 'logs'));
}
    // Mostrar formulario para crear
    public function create()
    {
        return view('admin.users.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'administrador',
            'password' => Hash::make($request->password),
        ]);

       return redirect()->route('users.index')->with('success', 'Administrador creado correctamente.');

    }

    // Mostrar formulario para editar
    public function edit(Usuario $user)
    {
        // Opcional: verifica que sea administrador
        if ($user->role !== 'administrador') {
            abort(403);
        }
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, Usuario $user)
    {
        if ($user->role !== 'administrador') {
            abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Administrador actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy(Usuario $user)
    {
        if ($user->role !== 'administrador') {
            abort(403);
        }

        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Administrador eliminado correctamente.');
    }


}
