<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
  public function usuario()
  {
      switch ($this->usuario_tabla) {
        case 'prodiabas':
          return $this->belongsTo('App\Models\Prodiaba');
          break;
        case 'efectores':
          return $this->belongsTo('App\Models\Efector');
          break;
        case 'usuarios':
          return $this->belongsTo('App\Models\Usuario');
          break;
      }
  }
}
