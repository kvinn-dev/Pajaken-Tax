<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    public function index()
    {
        // Mengambil semua payment, diurutkan dari yang terbaru
        $payments = Payment::with(['user', 'vehicle'])->latest()->paginate(15);
        return view('admin.payments.index', compact('payments'));
    }

    public function approve($id)
    {
        $payment = Payment::findOrFail($id);
        
        if($payment->status !== 'pending') {
            return back()->withErrors('Pembayaran ini sudah diverifikasi sebelumnya.');
        }
        
        // Update status pembayaran
        $payment->update(['status' => 'approved']);

        // Update tanggal pajak (perpanjang 1 tahun)
        $vehicle = $payment->vehicle;
        $currentTaxDate = Carbon::parse($vehicle->tanggal_pajak);
        $newTaxDate = $currentTaxDate->copy()->addYear();
        
        if ($newTaxDate->isPast()) {
            $newTaxDate = now()->addYear();
        }

        $vehicle->tanggal_pajak = $newTaxDate->format('Y-m-d');
        $vehicle->save();

        // Kirim notifikasi persetujuan ke user
        Notification::create([
            'user_id' => $payment->user_id,
            'type' => 'selesai',
            'title' => 'Pembayaran Berhasil',
            'message' => "Pembayaran pajak melalui {$payment->bank} untuk kendaraan {$vehicle->no_polisi} berhasil diverifikasi admin. Jatuh tempo diperpanjang hingga {$newTaxDate->translatedFormat('d M Y')}.",
            'action_url' => route('tax-check.index'),
            'action_text' => 'Lihat Status',
        ]);

        return back()->with('success', "Pembayaran untuk {$vehicle->no_polisi} berhasil disetujui!");
    }

    public function reject($id)
    {
        $payment = Payment::findOrFail($id);
        
        if($payment->status !== 'pending') {
            return back()->withErrors('Pembayaran ini sudah diverifikasi sebelumnya.');
        }

        // Update status pembayaran menjadi ditolak
        $payment->update(['status' => 'rejected']);

        // Kirim notifikasi gagal ke user
        Notification::create([
            'user_id' => $payment->user_id,
            'type' => 'masalah',
            'title' => 'Pembayaran Ditolak',
            'message' => "Pembayaran pajak melalui {$payment->bank} untuk kendaraan {$payment->vehicle->no_polisi} ditolak. Pastikan nominal pembayaran sesuai. Silakan hubungi admin.",
            'action_url' => route('payment.create', $payment->vehicle_id),
            'action_text' => 'Bayar Ulang',
        ]);

        return back()->with('success', "Pembayaran untuk {$payment->vehicle->no_polisi} berhasil ditolak.");
    }
}
