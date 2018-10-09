<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    protected $fillable = ['diabetologico','medico_id','paciente_id','oftalmologico'];
}
