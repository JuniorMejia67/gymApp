<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\ContactoController;


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
});





