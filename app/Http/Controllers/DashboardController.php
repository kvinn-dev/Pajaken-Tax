<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nik;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vehicles = collect();
        $nikRecord = null;

        // Ambil kendaraan jika NIK sudah terisi dan valid
        if ($user && $user->nik) {
            $nikRecord = Nik::where('nik', $user->nik)->first();
            if ($nikRecord) {
                $vehicles = Vehicle::where('nik_id', $nikRecord->id)->get();
            }
        }

        return view('dashboard.index', compact('vehicles', 'nikRecord'));
    }

    public function taxCheck()
    {
        $user = Auth::user();
        $vehicles = collect();
        $nikRecord = null;

        // Ambil kendaraan jika NIK sudah terisi dan valid
        if ($user && $user->nik) {
            $nikRecord = Nik::where('nik', $user->nik)->first();
            if ($nikRecord) {
                $vehicles = Vehicle::where('nik_id', $nikRecord->id)->get();
            }
        }

        return view('tax-check.index', compact('vehicles', 'nikRecord'));
    }

    public function about()
    {
        return view('about.index');
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

    public function resetNik(Request $request)
    {
        $user = $request->user();
        $user->nik = null;
        $user->save();

        return back()->with('success', 'Data NIK berhasil direset. Silakan verifikasi NIK baru Anda.');
    }
}
