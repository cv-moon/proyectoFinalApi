<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conductor;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $cedula = $request->input('cedula');
        $password = $request->input('password');

        $estudiante = Estudiante::where('cedula', $cedula)->first();
        $conductor = Conductor::where('cedula', $cedula)->first();

        if ($estudiante && Hash::check($password, $estudiante->password)) {
            return response()->json(['id' => $estudiante->id_estudiante, 'status' => 1], 200);
        } elseif ($conductor && Hash::check($password, $conductor->password)) {
            return response()->json(['id' => $conductor->id_conductor, 'status' => 0], 200);
        } else {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }
    }
}
