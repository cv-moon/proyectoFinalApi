<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutaController extends Controller
{
    public function index()
    {
        $rutas = DB::table('rutas')
            ->join('conductores', 'conductores.id_ruta', '=', 'rutas.id_ruta')
            ->select('rutas.nombre', 'conductores.id_conductor', 'rutas.id_ruta')
            ->get();

        return response()->json($rutas, 200);
    }

    public function showStudents($id)
    {
        $students = DB::table('reservas')
            ->join('estudiantes', 'reservas.id_estudiante', '=', 'reservas.id_estudiante')
            ->select('reservas.id_conductor', 'estudiantes.nombres', 'estudiantes.apellidos', 'estudiantes.cedula')
            ->where('reservas.id_conductor', $id)
            ->get();

        return response()->json($students, 200);
    }
}
