<?php

namespace App\Http\Controllers;

use App\Models\Nik;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AdminVehicleController extends Controller
{
    public function index()
    {
        // Ambil data kendaraan beserta relasi NIK, urutkan dari yang terbaru
        $vehicles = Vehicle::with('nik')->latest()->paginate(10);
        
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|digits:16',
            'nama' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:20|unique:vehicles,no_polisi',
            'no_mesin' => 'required|string|max:50',
            'no_rangka' => 'required|string|max:50',
            'warna' => 'required|string|max:30',
            'jenis' => 'required|in:motor,mobil',
            'bahan_bakar' => 'required|string|max:30',
            'tanggal_pajak' => 'required|date',
        ]);

        // Cari NIK di database, jika tidak ada maka buat baru
        $nikRecord = Nik::firstOrCreate(
            ['nik' => $request->nik],
            ['nama' => $request->nama]
        );

        // Simpan data kendaraan menggunakan penugasan eksplisit agar tidak terhalang property $fillable
        $vehicle = new Vehicle();
        $vehicle->nik_id = $nikRecord->id;
        $vehicle->no_polisi = strtoupper($request->no_polisi);
        $vehicle->no_mesin = strtoupper($request->no_mesin);
        $vehicle->no_rangka = strtoupper($request->no_rangka);
        $vehicle->warna = $request->warna;
        $vehicle->jenis = $request->jenis;
        $vehicle->bahan_bakar = $request->bahan_bakar;
        $vehicle->tanggal_pajak = $request->tanggal_pajak;
        $vehicle->save();

        return redirect()->route('admin.vehicles.index')->with('success', 'Data kendaraan berhasil ditambahkan!');
    }
}
