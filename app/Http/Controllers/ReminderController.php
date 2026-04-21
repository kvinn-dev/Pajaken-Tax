<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

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

        Reminder::create([
            'user_id' => Auth::id(),
            'vehicle_id' => $request->vehicle_id,
            'tanggal' => $request->tanggal,
            'reminder_type' => $request->reminder_type
        ]);

        return back()->with('success', 'Pengingat berhasil disimpan!');
    }
}
