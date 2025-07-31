<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    // Define los campos que se pueden asignar de forma masiva
    protected $fillable = ['mes', 'año', 'cantidad'];
}
