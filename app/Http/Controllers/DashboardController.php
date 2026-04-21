<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nik;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vehicles = collect();

        // Ambil kendaraan jika NIK sudah terisi dan valid
        if ($user->nik) {
            $vehicles = $user->vehicles;
        }

        return view('dashboard.index', compact('vehicles'));
    }

    public function taxCheck()
    {
        $user = Auth::user();
        $vehicles = collect();

        // Ambil kendaraan jika NIK sudah terisi dan valid
        if ($user->nik) {
            $vehicles = $user->vehicles;
        }

        return view('tax-check.index', compact('vehicles'));
    }

    public function verifyNik(Request $request)
    {
        $request->validate(['nik' => 'required|digits:16']);

        // Validasi apakah NIK ada di database Admin
        $isValid = Nik::where('nik', $request->nik)->exists();

        if ($isValid) {
            $user = $request->user();
            $user->nik = $request->nik;
            $user->save();
            return back()->with('success', 'NIK berhasil diverifikasi. Kendaraan Anda telah disinkronisasi.');
        }

        return back()->withErrors(['nik' => 'NIK tidak ditemukan di sistem kami.']);
    }
}
