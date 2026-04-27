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
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Data User 1
        $nik1_str = '1111222233334444';
        $name1 = 'Budi Santoso';
        User::create([
            'name' => $name1,
            'email' => 'budi@pajaken.com',
            'phone' => '081111111111',
            'password' => Hash::make('budi1234'),
            'role' => 'user',
            'nik' => $nik1_str,
        ]);

        $nik1 = Nik::create([
            'nik' => $nik1_str,
            'nama' => $name1
        ]);

        Vehicle::create([
            'nik_id' => $nik1->id,
            'no_polisi' => 'B 1111 AAA',
            'no_mesin' => 'M1111',
            'no_rangka' => 'R1111',
            'warna' => 'Hitam',
            'jenis' => 'motor',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2024-05-20'
        ]);

        // Data User 2
        $nik2_str = '5555666677778888';
        $name2 = 'Siti Aminah';
        User::create([
            'name' => $name2,
            'email' => 'siti@pajaken.com',
            'phone' => '082222222222',
            'password' => Hash::make('siti1234'),
            'role' => 'user',
            'nik' => $nik2_str,
        ]);

        $nik2 = Nik::create([
            'nik' => $nik2_str,
            'nama' => $name2
        ]);

        Vehicle::create([
            'nik_id' => $nik2->id,
            'no_polisi' => 'B 2222 BBB',
            'no_mesin' => 'M2222',
            'no_rangka' => 'R2222',
            'warna' => 'Putih',
            'jenis' => 'mobil',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2024-08-15'
        ]);

        Vehicle::create([
            'nik_id' => $nik2->id,
            'no_polisi' => 'B 2223 CCC',
            'no_mesin' => 'M2223',
            'no_rangka' => 'R2223',
            'warna' => 'Merah',
            'jenis' => 'motor',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2024-11-10'
        ]);

        // Data User 3
        $nik3_str = '9999000011112222';
        $name3 = 'Andi Wijaya';
        User::create([
            'name' => $name3,
            'email' => 'andi@pajaken.com',
            'phone' => '083333333333',
            'password' => Hash::make('andi1234'),
            'role' => 'user',
            'nik' => $nik3_str,
        ]);

        $nik3 = Nik::create([
            'nik' => $nik3_str,
            'nama' => $name3
        ]);

        Vehicle::create([
            'nik_id' => $nik3->id,
            'no_polisi' => 'B 3333 DDD',
            'no_mesin' => 'M3333',
            'no_rangka' => 'R3333',
            'warna' => 'Silver',
            'jenis' => 'mobil',
            'bahan_bakar' => 'Solar',
            'tanggal_pajak' => '2026-04-28'
        ]);

        Vehicle::create([
            'nik_id' => $nik3->id,
            'no_polisi' => 'B 3334 EEE',
            'no_mesin' => 'M3334',
            'no_rangka' => 'R3334',
            'warna' => 'Biru',
            'jenis' => 'motor',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2026-06-12'
        ]);

        Vehicle::create([
            'nik_id' => $nik3->id,
            'no_polisi' => 'B 3335 FFF',
            'no_mesin' => 'M3335',
            'no_rangka' => 'R3335',
            'warna' => 'Hijau',
            'jenis' => 'motor',
            'bahan_bakar' => 'Bensin',
            'tanggal_pajak' => '2025-06-30'
        ]);
    }
}
