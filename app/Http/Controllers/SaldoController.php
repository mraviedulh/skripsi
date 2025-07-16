<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    public function index()
    {
        $santris = Santri::with('saldo')->paginate(10); // Asumsikan relasi saldo sudah ada
        return view('admin.data-saldo.index', compact('santris'));
    }

    public function show($id)
    {
        $santri = Santri::with('transaksis')->findOrFail($id);

        $transaksis = $santri->transaksis->sortByDesc('created_at');

        $dataRiwayat = [];
        $saldoBerjalan = 0;

        foreach ($transaksis as $trx) {
            if ($trx->tipe === 'setor') {
                $saldoBerjalan += $trx->nominal;
            } elseif ($trx->tipe === 'tarik') {
                $saldoBerjalan -= $trx->nominal;
            }

            $dataRiwayat[] = [
                'tanggal' => $trx->created_at->format('d-M-y'),
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
}
