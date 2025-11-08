<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Importamos los controladores que usaremos para los dashboards
use App\Http\Controllers\DashboardController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro de un grupo
| que contiene el grupo de middleware "web". ¡Ahora crea algo genial!
|
*/

// RUTA PÚBLICA PRINCIPAL
// Muestra la página principal del gimnasio.
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


// ------------------------------------------------------------------
// RUTAS PROTEGIDAS Y REDIRECCIONADAS POR ROL
// ------------------------------------------------------------------

// Estas rutas aún no tienen el middleware de roles aplicado,
// pero las definimos para que las redirecciones en AuthController funcionen.

Route::middleware('auth')->group(function () {
    
    // Ruta para el Administrador
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard');

    // Ruta para la Recepcionista
    Route::get('/recepcionista/dashboard', [DashboardController::class, 'recepcionistaDashboard'])
        ->name('recepcionista.dashboard');

    // Ruta para el Entrenador
    Route::get('/entrenador/dashboard', [DashboardController::class, 'entrenadorDashboard'])
        ->name('entrenador.dashboard');

    // Ruta para el Usuario/Miembro
    Route::get('/usuario/dashboard', [DashboardController::class, 'usuarioDashboard'])
        ->name('usuario.dashboard');
});

// Nota: Los controladores de DashboardController se crearán en el siguiente paso.