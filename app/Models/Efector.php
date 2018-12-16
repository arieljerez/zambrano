<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Efector extends Authenticatable
{
  use Notifiable;
  protected $table = 'Efectores';
// The authentication guard for prodiaba
  protected $guard = 'Efector';

  protected $fillable = ['email', 'password','usuario'];

  protected $hidden = ['password', 'remember_token'];
}
