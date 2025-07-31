<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;        // Modelo Usuario
use App\Models\LoginLog;       // Modelo LoginLog para los registros de inicio de sesión
use Illuminate\Support\Facades\Hash; // Facade para hashear contraseñas

class UserController extends Controller
{

    // Constructor para aplicar middlewares
    public function __construct()
    {
        // Middleware que requiere que el usuario esté autenticado
        $this->middleware('auth');

        // Middleware anónimo que restringe acceso solo a usuarios con rol 'administrador'
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'administrador') {
                abort(403); // Acceso prohibido si no es administrador
            }
            return $next($request); // Continuar con la petición si es admin
        });
    }


    // Método para listar usuarios paginados junto con últimos logs de inicio de sesión
    public function index()
    {
        $users = Usuario::paginate(10); // Obtener usuarios paginados 10 por página
        $logs = LoginLog::with('user')->latest()->take(10)->get(); // Obtener últimos 10 logs con relación a usuario

        // Retornar la vista 'admin.users.index' enviando usuarios y logs
        return view('admin.users.index', compact('users', 'logs'));
    }

    // Mostrar formulario para crear un nuevo usuario
    public function create()
    {
        return view('admin.users.create'); // Vista con formulario de creación
    }

    // Guardar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        // Validar los datos enviados
        $request->validate([
            'name' => 'required|string|max:255', // Nombre requerido y máximo 255 caracteres
            'email' => 'required|email|unique:users,email', // Email requerido, válido y único en la tabla users
            'password' => 'required|string|min:6|confirmed', // Contraseña requerida, mínimo 6 caracteres y confirmación coincidente
            'role' => 'required|in:usuario,administrador', // Rol obligatorio, solo puede ser 'usuario' o 'administrador'
        ]);

        // Crear el usuario con los datos validados y contraseña hasheada
        Usuario::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // Puede ser 'usuario' o 'administrador'
            'password' => Hash::make($request->password), // Hashear la contraseña
        ]);

        // Redirigir a la lista de usuarios con mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Administrador creado correctamente.');
    }

    // Mostrar formulario para editar un usuario existente
    public function edit(Usuario $user)
    {
        // Retorna la vista para editar usuario enviando el usuario encontrado
        return view('admin.users.edit', compact('user'));
    }

    // Actualizar los datos del usuario
    public function update(Request $request, Usuario $user)
    {
        // Validar datos enviados para actualización
        $request->validate([
            'name' => 'required|string|max:255', // Nombre obligatorio
            // Email obligatorio, válido y único en tabla usuarios exceptuando el propio usuario
            'email' => 'required|email|unique:usuarios,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed', // Contraseña opcional, si viene debe tener mínimo 6 caracteres y confirmarse
            'role' => 'required|in:usuario,administrador', // Rol obligatorio, solo valores permitidos
        ]);

        // Actualizar campos nombre y email
        $user->name = $request->name;
        $user->email = $request->email;

        // Si se envió una contraseña nueva, se hashea y actualiza
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Guardar cambios en la base de datos
        $user->save();

        // Redireccionar a la lista de usuarios con mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario de la base de datos
    public function destroy(Usuario $user)
    {
        // Ejecuta el borrado
        $user->delete();

        // Redireccionar con mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
