<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Muestra la vista del formulario de login.
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Si el usuario ya está autenticado, lo redirigimos a su dashboard.
        if (Auth::check()) {
            return $this->redirectToDashboard(Auth::user());
        }

        // Si no está autenticado, mostramos la vista de login.
        return view('auth.login');
    }

    /**
     * Procesa el intento de login.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validación de credenciales
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Intento de autenticación
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenerar la sesión para prevenir secuestro de sesión (session fixation)
            $request->session()->regenerate();

            // 3. Redirección basada en el rol
            return $this->redirectToDashboard(Auth::user());
        }

        // Si el login falla
        Log::warning('Intento de login fallido para el correo: ' . $request->email);
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Lógica de redirección después del login basada en el rol del usuario.
     * @param \App\Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirectToDashboard($user)
    {
        // El campo 'role' es el que definimos en la migración
        switch ($user->role) {
            case 'administrador':
                return redirect()->intended('/admin/dashboard');
            case 'recepcionista':
                return redirect()->intended('/recepcionista/dashboard');
            case 'entrenador':
                return redirect()->intended('/entrenador/dashboard');
            case 'usuario': // Miembro normal
            default:
                return redirect()->intended('/usuario/dashboard');
        }
    }
}