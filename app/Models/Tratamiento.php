<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
  public function usuario()
  {
      return $this->belongsTo('App\Models\Efector');
  }

  public function adjuntos()
  {
      return $this->belongsToMany('App\Models\Adjunto','tratamiento_adjunto','tratamiento_id','adjunto_id');
  }

  public function scopeSolicitado($query)
  {
      return $query->where('estado', 'solicitado');
  }

  public function scopeAprobado($query)
  {
      return $query->where('estado', 'aprobado');
  }
}
