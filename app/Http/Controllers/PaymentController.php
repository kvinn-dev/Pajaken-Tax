<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
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
        $request->validate([
            'payment_method' => 'required|in:va', // Hanya 'va' yang diizinkan untuk saat ini
            'bank' => 'required_if:payment_method,va|in:bca,mandiri,bni,bri',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $user = Auth::user();
        $vehicleNik = Nik::find($vehicle->nik_id);
        
        if (!$user->nik || !$vehicleNik || $user->nik !== $vehicleNik->nik) {
            abort(403, 'Anda tidak memiliki akses untuk membayar pajak kendaraan ini.');
        }

        // Kalkulasi ulang biaya pajak untuk memastikan data akurat
        $taxDate = Carbon::parse($vehicle->tanggal_pajak);
        $isOverdue = $taxDate->isPast();
        $daysOverdue = $isOverdue ? now()->diffInDays($taxDate, false) : 0;
        $baseTax = strtolower($vehicle->jenis) == 'mobil' ? 1500000 : 250000;
        $penalty = $isOverdue ? (abs($daysOverdue) * 2000) : 0;
        $totalAmount = $baseTax + $penalty;

        // Generate Nomor Virtual Account (VA) secara acak
        $vaNumber = '88' . rand(1000000000, 9999999999);

        // Simpan sebagai Pending di tabel Payment
        $payment = Payment::create([
            'user_id' => $user->id,
            'vehicle_id' => $vehicle->id,
            'amount' => $totalAmount,
            'bank' => strtoupper($request->bank),
            'va_number' => $vaNumber,
            'status' => 'pending',
        ]);

        // Redirect ke halaman invoice/VA
        return redirect()->route('payment.show', $payment->id);
    }

    public function show($id)
    {
        $payment = Payment::with('vehicle')->findOrFail($id);
        
        if ($payment->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return view('payment.show', compact('payment'));
    }
}
