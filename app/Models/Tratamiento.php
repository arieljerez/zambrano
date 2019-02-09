<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
  public function usuario()
  {
      $guardName = getGuardName();
      switch ($guardName) {
        case 'prodiaba':
          return $this->belongsTo('App\Models\Prodiaba');
          break;
        case 'efector':
          return $this->belongsTo('App\Models\Efector');
          break;
        default:
          return $this->belongsTo('App\Models\Usuario');
          break;
      }
  }
}
