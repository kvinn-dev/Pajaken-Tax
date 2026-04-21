<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nik extends Model
{
    protected $fillable = ['nik', 'nama'];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}