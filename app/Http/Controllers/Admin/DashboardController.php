<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function Dashboard()
    {
        $santriId = Auth::id(); // Ambil ID user santri yang sedang login

        // Pastikan relasi santri_id sesuai
        $totalPemasukan = Transaksi::where('santri_id', $santriId)
            ->where('tipe', 'setor')
            ->sum('nominal');

        $totalPengeluaran = Transaksi::where('santri_id', $santriId)
            ->where('tipe', 'tarik')
            ->sum('nominal');

        $saldoTerkini = $totalPemasukan - $totalPengeluaran;

        // Pemasukan hari ini
        $pemasukanHariIni = Transaksi::where('santri_id', $santriId)
            ->where('tipe', 'setor')
            ->whereDate('created_at', Carbon::today())
            ->sum('nominal');

        // Pengeluaran hari ini
        $pengeluaranHariIni = Transaksi::where('santri_id', $santriId)
            ->where('tipe', 'tarik')
            ->whereDate('created_at', Carbon::today())
            ->sum('nominal');

        $totalTransaksiHariIni = $pemasukanHariIni - $pengeluaranHariIni;

        return view('santri.index', compact(
            'saldoTerkini',
            'pemasukanHariIni',
            'pengeluaranHariIni',
            'totalTransaksiHariIni'
        ));
    }
}
