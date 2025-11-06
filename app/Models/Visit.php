<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  protected $fillable = [
    'visitor_guid',
    'ip_address',
    'user_agent',
    'visited_at',
  ];

  protected $casts = [
    'visited_at' => 'datetime',
  ];
}
