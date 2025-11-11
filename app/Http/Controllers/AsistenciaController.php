<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function registrar(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $user = User::where('name', $request->name)->first();

        if (!$user) {
            return back()->with('error', 'Usuario no encontrado');
        }

        Asistencia::updateOrCreate(
            [
                'user_id' => $user->id,
                'fecha_asistencia' => now()->toDateString()
            ],
            []
        );

        return back()->with('success', 'Asistencia registrada correctamente.');
    }


    public function listar(Request $request)
        {
            $filtro = $request->get('filtro', 'dia');

            $query = Asistencia::with('user');

            switch ($filtro) {
                case 'semana':
                    $query->whereBetween('fecha_asistencia', [now()->startOfWeek(), now()->endOfWeek()]);
                    break;
                case 'mes':
                    $query->whereMonth('fecha_asistencia', now()->month);
                    break;
                default:
                    $query->whereDate('fecha_asistencia', now()->toDateString());
            }

            return response()->json($query->get());
        }



}
