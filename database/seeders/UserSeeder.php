<?php

namespace Database\Seeders;

use App\Models\Conductor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conductor = new Conductor();
        $conductor->cedula = '1721897765';
        $conductor->password = Hash::make('Conductor1');
        $conductor->nombres = "Cristian Vinicio";
        $conductor->apellidos = "Chuquitarco Pila";
        $conductor->id_ruta = 1;
        $conductor->save();

        $conductor2 = new Conductor();
        $conductor2->cedula = '1723945612';
        $conductor2->password = Hash::make('Conductor2');
        $conductor2->nombres = "Erik Mauricio";
        $conductor2->apellidos = "Vega Morillo";
        $conductor2->id_ruta = 2;
        $conductor2->save();

        $conductor3 = new Conductor();
        $conductor3->cedula = '0501653943';
        $conductor3->password = Hash::make('Conductor3');
        $conductor3->nombres = "Luis David";
        $conductor3->apellidos = "Perez Narvaez";
        $conductor3->id_ruta = 3;
        $conductor3->save();

        $conductor4 = new Conductor();
        $conductor4->cedula = '0501908842';
        $conductor4->password = Hash::make('Conductor4');
        $conductor4->nombres = "Josue Daniel";
        $conductor4->apellidos = "Rodriguez Nolivos";
        $conductor4->id_ruta = 4;
        $conductor4->save();
    }
}
