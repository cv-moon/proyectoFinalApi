<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Reserva;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    public function index()
    {
        $students = Estudiante::all();

        $data = [
            'students' => $students,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $student = new Estudiante();
        $student->cedula = $request->cedula;
        $student->password = Hash::make($request->password);
        $student->nombres = $request->nombres;
        $student->apellidos = $request->apellidos;
        $student->save();
        $reserva = new Reserva();
        $reserva->id_estudiante = $student->id;
        $reserva->id_conductor = $request->id_conductor;
        $reserva->save();

        if (!$student) {
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        return response()->json($student, 201);
    }

    public function show($id)
    {
        $student = DB::table('estudiantes')
            ->join('reservas', 'estudiantes.id_estudiante', '=', 'reservas.id_estudiante')
            ->join('conductores', 'reservas.id_conductor', '=', 'conductores.id_conductor')
            ->join('rutas', 'conductores.id_conductor', '=', 'reservas.id_conductor')
            ->select(
                'estudiantes.id_estudiante',
                'estudiantes.nombres',
                'estudiantes.apellidos',
                'estudiantes.cedula',
                'estudiantes.foto',
                'conductores.id_conductor',
                'rutas.id_ruta',
                'rutas.nombre as ruta'
            )
            ->where('estudiantes.id_estudiante', '=', $id)
            ->first();

        if (!$student) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Estudiante::find($id);

        if (!$student) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $student->delete();

        $data = [
            'message' => 'Estudiante eliminado',
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function updatePassword(Request $request, $id_estudiante)
    {
        // $student = DB::table('estudiantes')->where('id_estudiante', '=', $id_estudiante)->first();
        $student = DB::table('estudiantes')->where('id_estudiante', '=', $id_estudiante)->first();
        $student->password = Hash::make($request->password);
        $student->save();

        // $data = [
        //     'message' => 'Estudiante actualizado',
        //     'student' => $student,
        //     'status' => 200
        // ];

        // return response()->json($data, 200);
        return $student;
    }
}
