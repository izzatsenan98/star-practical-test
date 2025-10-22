<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  protected $auditExclude = [
    'remember_token',
  ];
  
  protected $fillable = [
    'name',
    'division_id',
    'role_id',
    'email',
    'password',
    'guid',
    'domain',
    'statusid',
    'created_by',
    'updated_by',
  ];
  
  protected $hidden = [
    'password',
    'remember_token',
  ];
  
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }
}
