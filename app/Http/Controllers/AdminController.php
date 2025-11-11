<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        // Fechas para filtros
        $fechaInicio = $request->fecha_inicio ?? Carbon::now()->startOfMonth();
        $fechaFin = $request->fecha_fin ?? Carbon::now()->endOfMonth();

        // Obtener usuarios por rango de fechas
        $usuarios = User::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();

        // Calcular sumatoria de membresías
        $totales = [
            'Mensual' => $usuarios->where('membership_type', 'Mensual')->count() * 25,
            'Trimestral' => $usuarios->where('membership_type', 'Trimestral')->count() * 60,
            'Anual' => $usuarios->where('membership_type', 'Anual')->count() * 220,
        ];
        $totales['Total'] = array_sum($totales);

        return view('dashboards.admin', compact('usuarios', 'totales', 'fechaInicio', 'fechaFin'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
            'phone' => 'nullable',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Usuario registrado correctamente.');
    }
}
