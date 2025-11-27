<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\Transaksi;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $santri = null;
        if ($request->has('nis')) {
            $santri = Santri::where('nis', $request->nis)->first();
        }

        return view('admin.kelola', compact('santri'));
    }

    public function proses(Request $request)
    {
        $nominalFormat = $request->input('nominal');

        $nominalNumeric = (int) preg_replace('/[^0-9]/', '', $nominalFormat);

        $request->validate([
            'santri_id' => 'required|exists:santris,id',
            // 'nominal' => 'required|numeric|min:1000',
            'aksi' => 'required|in:tarik,setor',
        ]);

        // $santri = Santri::where('nis', $request->nis)->firstOrFail();
        $santri = Santri::findOrFail($request->santri_id);
        // Ambil entitas Admin berdasarkan user yang login
        $admin = Admin::where('user_id', Auth::id())->first();

        // Ambil atau buat saldo jika belum ada
        $saldo = $santri->saldo ?? $santri->saldo()->create(['balance' => 0]);

        // Logika setor atau tarik
        if ($request->aksi == 'setor') {
            $saldo->balance += $nominalNumeric;
        } elseif ($request->aksi == 'tarik') {
            if ($saldo->balance < $nominalNumeric) {
                return back()->with('error', 'Saldo tidak mencukupi.');
            } elseif ($nominalNumeric > 500000) {
                return back()->with('error', 'Nominal tidak boleh lebih dari 500.000.');
            }
            $saldo->balance -= $nominalNumeric;
        }

        $saldo->save();

        // Simpan log transaksi
        $santri->transaksis()->create([
            'admin_id' => $admin->id, // Ini optional jika relasi transaksinya dengan user
            'nominal' => $nominalNumeric,
            'tipe' => $request->aksi,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Transaksi berhasil!');
    }

    public function kelola($id)
    {
        $santri = Santri::with('saldo')->findOrFail($id);
        return view('admin.kelola', compact('santri'));
    }

    public function report()
    {
        $transaksis = Transaksi::with('santri.user')->latest()->paginate(10);
        return view('admin.report', compact('transaksis'));
    }

    // public function setor(Request $request, $id)
    // {
    //     $request->validate([
    //         'nominal' => 'required|numeric|min:1',
    //         'keterangan' => 'nullable|string|max:255',
    //     ]);

    //     $santri = Santri::with('saldo')->findOrFail($id);
    //     $santri->saldo->increment('balance', $request->nominal);

    //     Transaksi::create([
    //         'santri_id' => $santri->id,
    //         'tipe' => 'setor',
    //         'nominal' => $request->nominal,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     return redirect()->route('admin.kelola', $id)->with('success', 'Setor saldo berhasil.');
    // }

    // public function tarik(Request $request, $id)
    // {
    //     $request->validate([
    //         'nominal' => 'required|numeric|min:1',
    //         'keterangan' => 'nullable|string|max:255',
    //     ]);

    //     $santri = Santri::with('saldo')->findOrFail($id);
    //     if ($santri->saldo->balance < $request->nominal) {
    //         return back()->with('error', 'Saldo tidak mencukupi.');
    //     }

    //     $santri->saldo->decrement('balance', $request->nominal);

    //     Transaksi::create([
    //         'santri_id' => $santri->id,
    //         'tipe' => 'tarik',
    //         'nominal' => $request->nominal,
    //         'keterangan' => $request->keterangan,
    //     ]);

    //     return redirect()->route('admin.kelola', $id)->with('success', 'Tarik saldo berhasil.');
    // }
}
