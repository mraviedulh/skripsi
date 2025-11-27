<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class SaldoController extends Controller
{
    public function index(Request $request)
    {
        $query = Santri::with('saldo');

        // Tambahkan fitur pencarian berdasarkan nama atau NIS
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('nis', 'like', '%' . $search . '%');
            });
        }

        $santris = $query->paginate(10);
        return view('admin.data-saldo.index', compact('santris'));
    }

    public function show($id)
    {
        $santri = Santri::with('transaksis')->findOrFail($id);

        $transaksis = $santri->transaksis()->orderBy('created_at')->get();

        $dataRiwayat = [];
        $saldoBerjalan = 0;

        foreach ($transaksis as $trx) {
            if ($trx->tipe === 'setor') {
                $saldoBerjalan += $trx->nominal;
            } elseif ($trx->tipe === 'tarik') {
                $saldoBerjalan -= $trx->nominal;
            }

            $dataRiwayat[] = [
                'tanggal' => $trx->created_at->format('d-M-y H:i:s'),
                'pemasukan' => $trx->tipe === 'setor' ? $trx->nominal : null,
                'pengeluaran' => $trx->tipe === 'tarik' ? $trx->nominal : null,
                'total' => $saldoBerjalan,
            ];
        }

        return view('admin.data-saldo.detail', [
            'santri' => $santri,
            'dataRiwayat' => $dataRiwayat,
        ]);
    }

    public function cetakRiwayat($id)
    {
        $santri = Santri::findOrFail($id);
        $transaksis = $santri->transaksis()->orderBy('created_at')->get();

        $dataRiwayat = [];
        $saldoBerjalan = 0;

        foreach ($transaksis as $trx) {
            if ($trx->tipe === 'setor') {
                $saldoBerjalan += $trx->nominal;
            } elseif ($trx->tipe === 'tarik') {
                $saldoBerjalan -= $trx->nominal;
            }

            $dataRiwayat[] = [
                'tanggal' => $trx->created_at->format('d-M-y H:i:s'),
                'pemasukan' => $trx->tipe === 'setor' ? $trx->nominal : null,
                'pengeluaran' => $trx->tipe === 'tarik' ? $trx->nominal : null,
                'total' => $saldoBerjalan,
            ];
        }

        $admin = Auth::user(); // ambil data admin login

        // return view('admin.data-saldo.cetak', compact('santri', 'dataRiwayat', 'admin'));

        // Jika ingin langsung jadi PDF:
        $pdf = Pdf::loadView('admin.data-saldo.cetak', compact('santri', 'dataRiwayat', 'admin'));
        return $pdf->stream('riwayat_saldo_' . $santri->nis . '.pdf');
    }

    public function riwayat()
    {
        $user = Auth::user(); // ambil user yang login
        $santri = $user->santri; // ambil data santri dari user
        $transaksis = $santri->transaksis()->orderBy('created_at')->get();

        $dataRiwayat = [];
        $saldoBerjalan = 0;

        foreach ($transaksis as $trx) {
            if ($trx->tipe === 'setor') {
                $saldoBerjalan += $trx->nominal;
            } elseif ($trx->tipe === 'tarik') {
                $saldoBerjalan -= $trx->nominal;
            }

            $dataRiwayat[] = [
                'tanggal' => $trx->created_at->format('d-M-y H:i:s'),
                'pemasukan' => $trx->tipe === 'setor' ? $trx->nominal : null,
                'pengeluaran' => $trx->tipe === 'tarik' ? $trx->nominal : null,
                'total' => $saldoBerjalan,
            ];
        }

        return view('santri.detail', compact('santri', 'dataRiwayat'));
    }
}
