<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\RecepcionistaController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// RUTAS DE AUTENTICACIÓN (LOGIN Y LOGOUT)
Route::controller(AuthController::class)->group(function () {
    // Muestra el formulario de login (GET)
    Route::get('/login', 'showLoginForm')->name('login');
    
    // Procesa el formulario de login (POST)
    Route::post('/login', 'login')->name('login.attempt'); 
    
    // Cierra la sesión
    Route::post('/logout', 'logout')->name('logout'); 
});



Route::post('/contacto/guardar', [ContactoController::class, 'guardar'])
    ->name('contacto.guardar');
//rutas de los roles

Route::middleware('auth')->group(function () {
    
    //ruta para el administrador
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    //ruta para la recepcionista
    Route::get('/recepcionista/dashboard', [DashboardController::class, 'recepcionistaDashboard'])
        ->name('recepcionista.dashboard');

    //ruta para el entrenador
    Route::get('/entrenador/dashboard', [DashboardController::class, 'entrenadorDashboard'])
        ->name('entrenador.dashboard');

    //ruta para el usuario/miembro
    Route::get('/usuario/dashboard', [DashboardController::class, 'usuarioDashboard'])
        ->name('usuario.dashboard');





    //contacto recepcionista
    Route::get('/recepcionista/contactos', [ContactoController::class, 'ver'])
        ->name('recepcionista.contactos');

    //recepcionista agregar cliente
    Route::get('/recepcionista/registrar-cliente', [RecepcionistaController::class, 'showRegistrarCliente'])
        ->name('recepcionista.registrarCliente');

    Route::post('/recepcionista/registrar-cliente', [RecepcionistaController::class, 'storeCliente'])
        ->name('recepcionista.storeCliente');



    //registro asistencia

    Route::post('/registrar-asistencia', [AsistenciaController::class, 'registrar'])
        ->name('asistencia.registrar');


    //mostrar asistencias
    Route::get('/asistencias/listar', [AsistenciaController::class, 'listar'])
        ->name('asistencias.listar');


    //vista de usuario


    Route::get('/usuario/dashboard', [UserController::class, 'dashboard'])
        ->middleware('auth')
        ->name('usuario.dashboard');


    //registro de admin
    Route::prefix('admin')->group(function() {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('usuarios/guardar', [AdminController::class, 'storeUser'])->name('admin.storeUser');
    });

});





