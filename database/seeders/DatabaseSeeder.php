<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Nik;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Admin Pajaken',
            'email' => 'admin@pajaken.com',
            'phone' => '081234567890',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@pajaken.com',
            'phone' => '081298765432',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nik' => '1234567890123456', // Terhubung dengan dummy NIK di bawah
        ]);

        // Dummy NIK
        $nik = Nik::create([
            'nik' => '1234567890123456',
            'nama' => 'Budi Santoso'
        ]);

        // Dummy Vehicle
        Vehicle::create([
            'nik_id' => $nik->id,
            'no_polisi' => 'B 1234 ABC',
            'no_mesin' => 'M123456',
            'no_rangka' => 'R123456',
            'warna' => 'Hitam',
            'jenis' => 'motor',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2026-04-21'
        ]);
    }
}
