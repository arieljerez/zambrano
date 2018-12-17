<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Efector extends Authenticatable
{
  use Notifiable;
<<<<<<< HEAD
  protected $table = 'efectores';
// The authentication guard for prodiaba
  protected $guard = 'efector';
=======
  protected $table = 'Efectores';
// The authentication guard for prodiaba
  protected $guard = 'Efector';
>>>>>>> a00a3f49ac34d463dfd323131d5b5b1bcafd514d

  protected $fillable = ['email', 'password','usuario'];

  protected $hidden = ['password', 'remember_token'];
}
