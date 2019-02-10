<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
  public function usuario()
  {
      return $this->belongsTo('App\Models\Efector');
  }

}
