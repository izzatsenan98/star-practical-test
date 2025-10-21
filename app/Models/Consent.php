<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consent extends Model
{
  protected $fillable = [
    'guid',
    'ip_address',
    'user_agent',
    'version',
    'accepted_at',
  ];

  protected $casts = [
    'accepted_at' => 'datetime',
  ];
}
