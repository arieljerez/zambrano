<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Efector extends Authenticatable
{
  use Notifiable;
  protected $table = 'efectores';
// The authentication guard for prodiaba
  protected $guard = 'efector';

  protected $fillable = ['email', 'password','usuario'];

  protected $hidden = ['password', 'remember_token'];
}
