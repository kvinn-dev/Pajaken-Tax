<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNotificationController extends Controller
{
    public function index()
    {
        // Mengelompokkan notifikasi berdasarkan judul, pesan, dan tipe agar jika 
        // dikirim ke semua user (broadcast), admin hanya melihatnya sebagai 1 grup logis.
        $notifications = Notification::select(
                'title', 
                'message', 
                'type', 
                DB::raw('MAX(created_at) as created_at'), 
                DB::raw('COUNT(*) as total_penerima'), 
                DB::raw('MAX(id) as id')
            )
            ->groupBy('title', 'message', 'type')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.notifications.index', compact('notifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:info,jatuh_tempo,selesai,masalah,maintenance,greeting,event,promo',
        ]);

        // Mengambil semua user untuk dibroadcast
        $users = User::all();
        $notifications = [];
        $now = now();

        foreach ($users as $user) {
            $notifications[] = [
                'user_id' => $user->id,
                'title' => $request->title,
                'message' => $request->message,
                'type' => $request->type,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        // Memasukkan data ke database secara massal dalam potongan (chunk) untuk optimasi memori
        foreach (array_chunk($notifications, 500) as $chunk) {
            Notification::insert($chunk);
        }

        return redirect()->route('admin.notifications.index')
            ->with('success', 'Notifikasi berhasil dikirim (broadcast) ke seluruh pengguna!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'type' => 'required|in:info,jatuh_tempo,selesai,masalah,maintenance,greeting,event,promo',
            'old_title' => 'required|string',
            'old_message' => 'required|string',
        ]);

        // Update seluruh notifikasi di database yang memiliki identitas broadcast yang sama
        Notification::where('title', $request->old_title)
            ->where('message', $request->old_message)
            ->update([
                'title' => $request->title,
                'message' => $request->message,
                'type' => $request->type,
            ]);

        return redirect()->route('admin.notifications.index')->with('success', 'Notifikasi berhasil diperbarui untuk semua penerima.');
    }

    public function destroy(Request $request, $id)
    {
        // Hapus semua notifikasi broadcast yang memiliki signature judul dan pesan identik
        Notification::where('title', $request->delete_title)
            ->where('message', $request->delete_message)
            ->delete();

        return redirect()->route('admin.notifications.index')->with('success', 'Notifikasi berhasil dihapus dari seluruh user.');
    }
}
