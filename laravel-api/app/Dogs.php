<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dogs extends Model
{

    protected $fillable = [
        'nombre', 'raza', 'size', 'color', 'foto'
    ];
}
