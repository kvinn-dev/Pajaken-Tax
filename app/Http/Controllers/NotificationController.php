<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $allNotifications = Notification::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($notification) {
                $config = $this->getTypeConfig($notification->type);
                $notification->type_color = $config['type_color'];
                $notification->type_bg = $config['type_bg'];
                $notification->type_label = $config['type_label'];
                return $notification;
            });

        return view('notifications.index', compact('allNotifications'));
    }

    public function markAllRead()
    {
        Notification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json(['success' => true]);
    }

    private function getTypeConfig($type)
    {
        $configs = [
            'jatuh_tempo' => [
                'type_color' => 'orange',
                'type_bg' => '#f59e0b',
                'type_label' => 'Jatuh Tempo',
            ],
            'selesai' => [
                'type_color' => 'green',
                'type_bg' => '#10b981',
                'type_label' => 'Selesai',
            ],
            'masalah' => [
                'type_color' => 'red',
                'type_bg' => '#ef4444',
                'type_label' => 'Masalah',
            ],
            'konfirmasi' => [
                'type_color' => 'blue',
                'type_bg' => '#2383e3',
                'type_label' => 'Konfirmasi',
            ],
            'info' => [
                'type_color' => 'blue',
                'type_bg' => '#3b82f6',
                'type_label' => 'Informasi',
            ],
            'maintenance' => [
                'type_color' => 'amber',
                'type_bg' => '#f59e0b',
                'type_label' => 'Pemeliharaan',
            ],
            'greeting' => [
                'type_color' => 'pink',
                'type_bg' => '#ec4899',
                'type_label' => 'Ucapan',
            ],
            'event' => [
                'type_color' => 'purple',
                'type_bg' => '#8b5cf6',
                'type_label' => 'Acara',
            ],
            'promo' => [
                'type_color' => 'emerald',
                'type_bg' => '#10b981',
                'type_label' => 'Promo',
            ],
        ];

        return $configs[$type] ?? [
            'type_color' => 'gray',
            'type_bg' => '#6b7280',
            'type_label' => 'Lainnya',
        ];
    }
}