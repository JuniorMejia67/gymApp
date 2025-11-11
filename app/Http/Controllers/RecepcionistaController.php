<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RecepcionistaController extends Controller
{
    // Muestra el formulario (si algún día se accede directo a la ruta GET)
    public function showRegistrarCliente()
    {
        return view('recepcionista.registrar-cliente');
    }

    // 🚀 Este es el método que te falta
    public function storeCliente(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Guardamos en la tabla 'users'
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'membership_start_date' => $request->membership_start_date,
            'membership_type' => $request->membership_type,
            'role' => 'usuario', // 👈 importante
        ]);

        // Redirigimos con mensaje de éxito
        return redirect()->back()->with('success', 'Cliente registrado correctamente ✅');
    }
}

