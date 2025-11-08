<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboards.admin');
    }

    public function recepcionistaDashboard()
    {
        return view('dashboards.recepcionista');
    }

    public function entrenadorDashboard()
    {
        return view('dashboards.entrenador');
    }

    public function usuarioDashboard()
    {
        return view('dashboards.usuario');
    }
}
