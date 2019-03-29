<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected  $fillable = ['dni','apellidos','nombres',
        'fecha_nacimiento','domicilio','telefono','telefono_familiar','sexo','region_sanitaria'];

    public function getEdadAttribute()
    {
        if( isset($this->fecha_nacimiento)){
            return edad($this->fecha_nacimiento);
        }
    }
}
