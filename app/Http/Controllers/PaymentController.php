<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Nik;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function create($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        // Cek apakah kendaraan ini milik user yang login (melalui NIK)
        $user = Auth::user();
        $vehicleNik = Nik::find($vehicle->nik_id);
        
        if (!$user->nik || !$vehicleNik || $user->nik !== $vehicleNik->nik) {
            abort(403, 'Anda tidak memiliki akses untuk membayar pajak kendaraan ini.');
        }

        // Hitung denda jika terlambat
        $taxDate = Carbon::parse($vehicle->tanggal_pajak);
        $isOverdue = $taxDate->isPast();
        $daysOverdue = $isOverdue ? now()->diffInDays($taxDate, false) : 0;
        
        // Simulasi perhitungan tagihan pajak
        $baseTax = strtolower($vehicle->jenis) == 'mobil' ? 1500000 : 250000;
        $penalty = $isOverdue ? (abs($daysOverdue) * 2000) : 0;
        $totalAmount = $baseTax + $penalty;

        return view('payment.create', compact('vehicle', 'baseTax', 'penalty', 'totalAmount', 'isOverdue', 'daysOverdue'));
    }

    public function store(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        // Cek autentikasi untuk memastikan keamanan
        $user = Auth::user();
        $vehicleNik = Nik::find($vehicle->nik_id);
        
        if (!$user->nik || !$vehicleNik || $user->nik !== $vehicleNik->nik) {
            abort(403, 'Anda tidak memiliki akses untuk membayar pajak kendaraan ini.');
        }
        
        // Update tanggal pajak (perpanjang 1 tahun)
        $currentTaxDate = Carbon::parse($vehicle->tanggal_pajak);
        $newTaxDate = $currentTaxDate->copy()->addYear();
        
        // Jika pajaknya sudah telat lebih dari setahun, paskan jatuhnya 1 tahun dari sekarang
        if ($newTaxDate->isPast()) {
            $newTaxDate = now()->addYear();
        }

        $vehicle->tanggal_pajak = $newTaxDate->format('Y-m-d');
        $vehicle->save();

        // Buat notifikasi berhasil untuk user
        Notification::create([
            'user_id' => Auth::id(),
            'type' => 'selesai',
            'title' => 'Pembayaran Berhasil',
            'message' => "Pembayaran pajak untuk kendaraan {$vehicle->no_polisi} berhasil. Jatuh tempo berikutnya adalah {$newTaxDate->translatedFormat('d M Y')}.",
            'action_url' => route('tax-check.index'),
            'action_text' => 'Lihat Status',
        ]);

        // Alihkan kembali ke halaman cek pajak dengan pesan sukses
        return redirect()->route('tax-check.index')
            ->with('success', "Pembayaran pajak untuk {$vehicle->no_polisi} berhasil diproses. Jatuh tempo diperpanjang hingga {$newTaxDate->translatedFormat('d M Y')}.");
    }
}
