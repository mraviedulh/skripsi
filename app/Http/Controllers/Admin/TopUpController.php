<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Saldo;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\TopUpModel;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TopUpController extends Controller
{
    // Tampilkan semua data santri
    public function index()
    {
        return view('santri.topup.index');
    }

    public function riwayatTopup()
    {
        $santriId = Auth::user()->santri;
        $topups = TopUpModel::where('santri_id', $santriId->id)
            ->whereIn('status', ['pending', 'disetujui', 'ditolak'])
            ->orderByDesc('created_at')
            ->get();

        return view('santri.topup.history', compact('topups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_transfer'   => 'required|numeric|min:1',
            'tanggal_transfer'  => 'required|date',
            'bukti_transfer'    => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        // Ambil santri yang sedang login
        $santri = Auth::user()->santri;

        // Upload file
        $path = $request->file('bukti_transfer')->store('bukti-transfer', 'public');

        // Simpan ke DB
        $topup = new TopUpModel();
        $topup->santri_id       = $santri->id;
        $topup->jumlah_transfer = $request->jumlah_transfer;
        $topup->tanggal_transfer = $request->tanggal_transfer;
        $topup->bukti_transfer  = $path;
        $topup->status          = 'pending';
        $topup->keterangan      = null;
        $topup->save();

        return redirect()->back()->with('success', 'Konfirmasi top-up berhasil dikirim!');
    }

    public function indexAdmin()
    {
        // hanya ambil yang pending, beserta relasi santri
        $topups = TopUpModel::with('santri')
            ->where('status', 'pending')
            ->orderBy('tanggal_transfer', 'desc')
            ->get();

        return view('admin.verifikasi.index', compact('topups'));
    }

    public function approve(TopUpModel $topup)
    {
        DB::transaction(function () use ($topup) {
            // Ambil entitas Admin dari user login
            $admin = Admin::where('user_id', Auth::id())->first();
            // Update status top-up
            $topup->update([
                'status' => 'disetujui',
                'updated_at' => now(),
            ]);

            // Ambil atau buat saldo santri
            $saldo = Saldo::firstOrCreate(
                ['santri_id' => $topup->santri_id],
                ['balance' => 0]
            );

            // Tambah saldo
            $saldo->balance += $topup->jumlah_transfer;
            $saldo->updated_at = now();
            $saldo->save();

            // Simpan riwayat transaksi
            Transaksi::create([
                'santri_id'  => $topup->santri_id,
                'admin_id'   => $admin ? $admin->id : null, // simpan admin yang memverifikasi
                'tipe'       => 'setor',
                'nominal'    => $topup->jumlah_transfer,
                'keterangan' => 'Top-up disetujui',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        return back()->with('success', 'Top‑up berhasil disetujui, saldo ditambahkan dan transaksi tercatat.');
    }

    public function reject(Request $request, TopUpModel $topup)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string',
        ]);

        $topup->update([
            'status'     => 'ditolak',
            'keterangan' => $request->alasan_penolakan,
            'updated_at' => now(),
        ]);

        return back()->with('error', 'Top‑up telah ditolak.');
    }
}
