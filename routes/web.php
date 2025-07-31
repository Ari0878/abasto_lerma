<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\VisitaController;
use App\Models\Visita;
use App\Models\Expediente;
use App\Models\Usuario;

// Página pública (inicio)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Autenticación
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// Cierre de sesión (logout)
Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate(); // Invalida sesión
    $request->session()->regenerateToken(); // Regenera token CSRF

    return redirect()->route('login'); // Redirige a login
})->name('logout');

// Redirección común post-login (según rol)
Route::middleware(['auth'])->get('/dashboard', function () {
    $visitas = Visita::all(); // Lista completa de visitas
    $expedientes = Expediente::all(); // Lista completa de expedientes
    $usuarios = Usuario::all(); // Lista completa de usuarios
    return view('admin.welcome', compact('visitas', 'expedientes', 'usuarios'));
})->name('dashboard');

// ==========================
// RUTAS PARA ADMINISTRADORES
// ==========================
Route::middleware(['auth', 'nocache', 'role:administrador'])->group(function () {

    // Redirección del administrador al dashboard
    Route::get('/admin', function () {
        return redirect()->route('dashboard');
    })->name('admin.welcome');

    // Perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Regiones
    Route::get('/region', [RegionController::class, 'region'])->name('region');
    Route::get('/region_alta', [RegionController::class, 'region_alta'])->name('region_alta');
    Route::post('/region_registrar', [RegionController::class, 'region_registrar'])->name('region_registrar');
    Route::get('/region_detalle/{id}', [RegionController::class, 'region_detalle'])->name('region_detalle');
    Route::get('/region_editar/{id}', [RegionController::class, 'region_editar'])->name('region_editar');
    Route::put('/region_salvar/{id}', [RegionController::class, 'region_salvar'])->name('region_salvar');
    Route::get('/region_borrar/{id}', [RegionController::class, 'region_borrar'])->name('region_borrar');

    // Expedientes
    Route::get('/expediente', [ExpedienteController::class, 'expediente'])->name('expediente');
    Route::get('/expediente/alta', [ExpedienteController::class, 'expediente_alta'])->name('expediente_alta');
    Route::post('/expediente/registrar', [ExpedienteController::class, 'expediente_registrar'])->name('expediente_registrar');
    Route::get('/expediente/detalle/{id}', [ExpedienteController::class, 'expediente_detalle'])->name('expediente_detalle');
    Route::get('/expediente/editar/{id}', [ExpedienteController::class, 'expediente_editar'])->name('expediente_editar');
    Route::put('/expediente/salvar/{id}', [ExpedienteController::class, 'expediente_salvar'])->name('expediente_salvar');
    Route::delete('/expediente/borrar/{id}', [ExpedienteController::class, 'expediente_borrar'])->name('expediente_borrar');
    Route::get('/expedientes/buscar', [ExpedienteController::class, 'expediente_buscar'])->name('expediente_buscar');
    Route::post('/expediente/eliminar-archivo/{id}', [ExpedienteController::class, 'eliminarArchivo'])->name('expediente_eliminar_archivo');
    Route::get('/expediente/archivar/{id}', [ExpedienteController::class, 'expediente_archivar'])->name('expediente_archivar');
    Route::get('/expediente/desarchivar/{id}', [ExpedienteController::class, 'expediente_desarchivar'])->name('expediente_desarchivar');
    Route::get('/expedientes/archivados', [ExpedienteController::class, 'expediente_archivados'])->name('expediente_archivados');
    Route::get('/expedientes/busqueda', [ExpedienteController::class, 'expediente_ajax'])->name('expediente_ajax');
    Route::get('/reporte-expedientes/excel', [ExpedienteController::class, 'exportarReporteGeneral']);
    Route::get('/expedientes/archivo/{filename}', [ExpedienteController::class, 'mostrarArchivo'])->name('expedientes.archivo');

    // Estadísticas
    Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas');

    // Gestión de usuarios
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
    Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Ingresos
    Route::get('/ingresos', [IngresoController::class, 'index'])->name('ingresos.index');
    Route::get('/ingresos/create', [IngresoController::class, 'create'])->name('ingresos.create');
    Route::post('/ingresos', [IngresoController::class, 'store'])->name('ingresos.store');
    Route::get('/ingresos/comparar', [IngresoController::class, 'comparar'])->name('ingresos.comparar');

    // Visitas
    Route::get('/visitas', [VisitaController::class, 'index'])->name('visitas.index');
    Route::get('/visitas/crear', [VisitaController::class, 'create'])->name('visitas.create');
    Route::get('/visitas/{id}/edit', [VisitaController::class, 'edit'])->name('visitas.edit');
    Route::put('/visitas/{id}', [VisitaController::class, 'update'])->name('visitas.update');
    Route::post('/visitas', [VisitaController::class, 'store'])->name('visitas.store');
    Route::delete('/visitas/{visita}', [VisitaController::class, 'destroy'])->name('visitas.destroy');
    Route::get('/visitas/exportar-csv', [VisitaController::class, 'exportarCSV'])->name('visitas.exportar.csv');
});

// ==================================
// RUTAS PARA USUARIOS REGULARES
// (y también para administradores)
// ==================================
Route::middleware(['auth', 'nocache', 'role:usuario,administrador'])->group(function () {

    // Vista de bienvenida para el rol usuario
    Route::get('/usuario', function () {
        return view('admin.welcome');
    })->name('usuario.welcome');

    // Perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Búsqueda de expedientes
    Route::get('/expediente/search', [ExpedienteController::class, 'search'])->name('expediente.search');
});
