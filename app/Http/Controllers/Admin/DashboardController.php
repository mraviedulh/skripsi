<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Santri;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total saldo dari semua santri
        $totalSaldo = Saldo::sum('balance');

        // Jumlah seluruh santri
        $totalSantri = Santri::count();

        // Total uang masuk (tipe setor) hari ini
        $totalMasukHarian = Transaksi::whereDate('created_at', Carbon::today())
            ->where('tipe', 'setor')
            ->sum('nominal');

        // Total uang keluar (tipe tarik) hari ini
        $totalKeluarHarian = Transaksi::whereDate('created_at', Carbon::today())
            ->where('tipe', 'tarik')
            ->sum('nominal');

        // Kirim ke view dashboard
        return view('admin.index', compact(
            'totalSaldo',
            'totalSantri',
            'totalMasukHarian',
            'totalKeluarHarian'
        ));
    }
}
