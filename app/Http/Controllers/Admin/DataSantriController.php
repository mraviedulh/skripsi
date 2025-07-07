<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Santri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataSantriController extends Controller
{
    // Tampilkan semua data santri
    public function index()
    {
        $query = Santri::query();

        $santris = $query->latest()->paginate(10);

        return view('admin.data-santri.index', compact('santris'));
    }

    public function create()
    {
        return view('admin.data-santri.tambah');
    }

    // Simpan data santri baru

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'nis'         => 'required|string|max:255|unique:santris,nis',
            'tgl_lahir'   => 'required|date',
            'alamat'      => 'required|string',
            'no_hp_ortu'  => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Format tgl_lahir ke ddmmyyyy
            $rawPassword    = \Carbon\Carbon::parse($validated['tgl_lahir'])->format('dmY');
            $hashedPassword = Hash::make($rawPassword);

            // Simpan ke tabel users
            $user = \App\Models\User::create([
                'name'     => $validated['nama'],
                'username' => $validated['nis'],
                'role_id'  => 2,
                'password' => $hashedPassword,
            ]);

            // Simpan ke tabel admins dengan user_id
            $santri = new \App\Models\Santri();
            $santri->fill($validated);
            $santri->user_id = $user->id;
            $santri->save();

            \App\Models\Saldo::create([
                'santri_id' => $santri->id,
                'balance'   => 0,
            ]);

            DB::commit();

            return redirect()->route('admin.data-santri.index')->with('success', 'Data santri berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    // try {
    //     // Simpan ke tabel santris
    //     $santri = \App\Models\Santri::create($validated);

    //     // Format tgl_lahir ke ddmmyyyy
    //     $rawPassword = \Carbon\Carbon::parse($validated['tgl_lahir'])->format('dmY');
    //     $hashedPassword = Hash::make($rawPassword);

    //     // Simpan ke tabel users
    //     \App\Models\User::create([
    //         'name'     => $santri->nama,
    //         'username'     => $santri->nis,
    //         'role_id'  => 2, // Ubah sesuai role santri kamu
    //         'password' => $hashedPassword,
    //     ]);

    //     // Simpan ke tabel saldos
    // \App\Models\Saldo::create([
    //     'santri_id' => $santri->id,
    //     'balance'   => 0,
    // ]);

    //     DB::commit();

    // return redirect()->route('admin.data-santri.index')->with('success', 'Data santri berhasil ditambahkan.');
    // } catch (\Exception $e) {
    //     DB::rollBack();
    //     return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
    // }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);

        return view('admin.data-santri.edit', compact('santri'));
    }

    // Update data santri
    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);

        $validated = $request->validate([
            'alamat'      => 'required|string',
            'no_hp_ortu'  => 'nullable|string|max:255',
        ]);

        $santri->update($validated);

        return redirect()->route('admin.data-santri.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    // Hapus data santri
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data santri berhasil dihapus.'
        ]);
    }
}
