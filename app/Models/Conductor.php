<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = [
        'user_id',
        'ruta_id',
        'nombres',
        'apellidos',
        'foto',
        'estado'
    ];
    public $timestamps = false;
}
