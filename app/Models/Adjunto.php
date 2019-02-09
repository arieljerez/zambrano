<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adjunto extends Model
{
    public function usuario()
    {
        $guardName = $this->nombre_tabla;
        switch ($guardName) {
          case 'prodiabas':
            return $this->belongsTo('App\Models\Prodiaba');
            break;
          case 'efectores':
            return $this->belongsTo('App\Models\Efector');
            break;
          default:
            return $this->belongsTo('App\Models\Usuario');
            break;
        }
    }
}
