<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto; 

class ContactoController extends Controller
{
    public function guardar(Request $request)
    {
        Contacto::create([
            'nombre'   => $request->nombre,
            'telefono' => $request->telefono,
            'objetivo' => $request->objetivo
        ]);

        return redirect()->back()->with('success', 'Formulario enviado ✅');
    }

    public function ver()
    {
        $contactos = Contacto::all();
        return view('recepcionista.contactos', compact('contactos'));
    }

}
