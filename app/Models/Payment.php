<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'vehicle_id', 'amount', 'bank', 'va_number', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}