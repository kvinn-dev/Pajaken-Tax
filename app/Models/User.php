<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'phone', 'password', 'role', 'nik'];

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
    
    // Relasi untuk menarik data kendaraan langsung dari NIK user
    public function vehicles()
    {
        return $this->hasManyThrough(Vehicle::class, Nik::class, 'nik', 'nik_id', 'nik', 'id');
    }
}