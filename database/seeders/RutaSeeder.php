<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rutas')->insert([
            'nombre' => 'NORTE'
        ]);
        DB::table('rutas')->insert([
            'nombre' => 'SUR'
        ]);
        DB::table('rutas')->insert([
            'nombre' => 'ESTE'
        ]);
        DB::table('rutas')->insert([
            'nombre' => 'OESTE'
        ]);
    }
}
