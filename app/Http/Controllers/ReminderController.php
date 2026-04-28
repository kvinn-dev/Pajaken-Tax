<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Vehicle;
use Carbon\Carbon;

class ReminderController extends Controller
{
    public function index()
    {
        // Ambil data kendaraan user (berdasarkan NIK)
        $vehicles = Auth::user()->vehicles ?? collect();
        $reminders = Reminder::where('user_id', Auth::user()->id)->with('vehicle')->get();

        return view('reminder.index', compact('vehicles', 'reminders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'tanggal' => 'required|date',
            'reminder_type' => 'required|in:3,7,30'
        ]);

        $reminder = Reminder::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'vehicle_id' => $request->vehicle_id,
                'reminder_type' => $request->reminder_type
            ],
            [
                'tanggal' => $request->tanggal,
            ]
        );

        // Periksa apakah perlu mengirim notifikasi segera.
        $dueDate = Carbon::parse($reminder->tanggal);
        $reminderDays = (int) $reminder->reminder_type;
        $reminderDate = $dueDate->copy()->subDays($reminderDays);

        // Jika tanggal pengingat yang dihitung adalah hari ini, buat notifikasi.
        if ($reminderDate->isToday()) {
            $vehicle = Vehicle::find($reminder->vehicle_id);
            // Hitung sisa hari dari hari ini ke tanggal jatuh tempo
            $daysLeft = Carbon::today()->diffInDays($dueDate, false);

            $message = "Pajak kendaraan {$vehicle->no_polisi} akan jatuh tempo dalam {$daysLeft} hari ({$dueDate->translatedFormat('d M Y')}). Segera lakukan pembayaran.";
            if ($daysLeft === 1) {
                $message = "Pajak kendaraan {$vehicle->no_polisi} akan jatuh tempo besok ({$dueDate->translatedFormat('d M Y')}). Segera lakukan pembayaran.";
            } elseif ($daysLeft === 0) {
                $message = "Pajak kendaraan {$vehicle->no_polisi} jatuh tempo hari ini. Segera lakukan pembayaran.";
            } elseif ($daysLeft < 0) {
                $message = "Pajak kendaraan {$vehicle->no_polisi} telah lewat jatuh tempo. Segera lakukan pembayaran.";
            }

            // Gunakan label 'masalah' jika sudah lewat batas waktu (minus hari)
            $notificationType = $daysLeft < 0 ? 'masalah' : 'jatuh_tempo';

            Notification::create([
                'user_id' => Auth::id(),
                'type' => $notificationType,
                'title' => 'Pengingat Jatuh Tempo Pajak',
                'message' => $message,
                'action_url' => route('tax-check.index'),
                'action_text' => 'Lihat Detail',
            ]);
        }

        return back()->with('success', 'Pengingat berhasil disimpan!');
    }
}
