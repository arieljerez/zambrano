<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Prodiaba extends Authenticatable
{
  use Notifiable;
// The authentication guard for prodiaba
  protected $guard = 'prodiaba';

  protected $fillable = ['email', 'password'];

  protected $hidden = ['password', 'remember_token'];
}
