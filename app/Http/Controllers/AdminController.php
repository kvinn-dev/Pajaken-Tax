<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Reminder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Basic stats
        $totalUsers = User::where('role', 'user')->count();
        $totalVehicles = Vehicle::count();
        $activeReminders = Reminder::count();
        $overdueVehicles = Vehicle::where('tanggal_pajak', '<', now())->count();
        $usersThisMonth = User::where('role', 'user')->whereMonth('created_at', now()->month)->count();
        
        // Monthly stats for last 6 months (for bar chart)
        $monthlyStats = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $monthlyStats[] = [
                'month' => $month->translatedFormat('M'),
                'year' => $month->year,
                'new_users' => User::where('role', 'user')
                    ->whereMonth('created_at', $month->month)
                    ->whereYear('created_at', $month->year)
                    ->count(),
                'new_vehicles' => Vehicle::whereMonth('created_at', $month->month)
                    ->whereYear('created_at', $month->year)
                    ->count(),
                'paid_taxes' => Reminder::whereMonth('created_at', $month->month)
                    ->whereYear('created_at', $month->year)
                    ->count(),
            ];
        }

        // Vehicle type distribution
        $vehiclesByType = Vehicle::select('jenis', DB::raw('count(*) as total'))
            ->groupBy('jenis')
            ->get()
            ->map(function ($item) use ($totalVehicles) {
                return [
                    'type' => $item->jenis,
                    'total' => $item->total,
                    'percentage' => $totalVehicles > 0 ? round(($item->total / $totalVehicles) * 100, 1) : 0,
                ];
            });

        // Tax due status distribution (for donut chart)
        $taxStatus = [
            'active' => Vehicle::where('tanggal_pajak', '>', now()->addDays(30))->count(),
            'warning' => Vehicle::whereBetween('tanggal_pajak', [now(), now()->addDays(30)])->count(),
            'overdue' => Vehicle::where('tanggal_pajak', '<', now())->count(),
        ];

        // Users growth rate
        $lastMonthUsers = User::where('role', 'user')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->count();
        $thisMonthUsers = User::where('role', 'user')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $userGrowth = $lastMonthUsers > 0 
            ? round((($thisMonthUsers - $lastMonthUsers) / $lastMonthUsers) * 100, 1) 
            : 100;

        // All stats in one array
        $stats = [
            'total_users' => $totalUsers,
            'users_this_month' => $usersThisMonth,
            'total_vehicles' => $totalVehicles,
            'active_reminders' => $activeReminders,
            'overdue_vehicles' => $overdueVehicles,
            'vehicles_by_type' => $vehiclesByType,
            'recent_users' => User::where('role', 'user')->latest()->take(5)->get(),
            'recent_vehicles' => Vehicle::with('nik')->latest()->take(5)->get(),
            'monthlyStats' => $monthlyStats,
            'taxStatus' => $taxStatus,
            'userGrowth' => $userGrowth,
            'lastMonthUsers' => $lastMonthUsers,
            'thisMonthUsers' => $thisMonthUsers,
            'totalNotifications' => \App\Models\Notification::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}