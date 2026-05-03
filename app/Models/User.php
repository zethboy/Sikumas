<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;

  protected $fillable = [
    'name',
    'username',
    'email',
    'password',
    'phone',
    'address',
    'type',
    'qris_image',
  ];

  protected $appends = ['first_name']; // auto-include

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

  // Ambil nama depan otomatis
  public function getFirstNameAttribute(): string
  {
    return explode(' ', $this->name)[0] ?? $this->name;
  }
}
