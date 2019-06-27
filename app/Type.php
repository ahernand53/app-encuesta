<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    const OPCIONES = [
        'U' => 'eleccion unica',
        'C' => 'respuesta corta',
        'M' => 'eleccion multiple'
    ];

    protected $table = 'types';
    protected $fillable = [
        'name',
        'max_add'
    ];

}
