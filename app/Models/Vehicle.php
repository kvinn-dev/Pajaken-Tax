<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'nik_id', 'no_polisi', 'no_mesin', 'no_rangka', 
        'warna', 'jenis', 'bahan_bakar', 'tanggal_pajak'
    ];

    public function nik()
    {
        return $this->belongsTo(Nik::class);
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class);
    }
}