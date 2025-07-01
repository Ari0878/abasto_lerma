<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role !== 'administrador') {
            abort(403);
        }
        return $next($request);
    });
}


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
            'role' => 'required|in:usuario,administrador',

        ]);

        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // dinámico
            'password' => Hash::make($request->password),
        ]);        

       return redirect()->route('users.index')->with('success', 'Administrador creado correctamente.');

    }

    // Mostrar formulario para editar
    public function edit(Usuario $user)
    {
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, Usuario $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:usuario,administrador',

        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }
    

    // Eliminar usuario
    public function destroy(Usuario $user)
    {
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
    


}
