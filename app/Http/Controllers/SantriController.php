<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SantriController extends Controller
{
    //
    public function index()
    {
        // Mengambil data santri dengan relasi user dan saldo untuk efisiensi.
        // paginate(10) berarti kita menampilkan 10 data per halaman.
        $santris = Santri::with(['user', 'saldo'])->orderBy('nis', 'asc')->paginate(5);

        return view('admin.data-santri.index', compact('santris'));
    }

    /**
     * Menampilkan form untuk mengedit data santri (Update Form).
     */
    public function edit(Santri $santri)
    {
        return view('admin.data-santri.edit', compact('santri'));
    }

    /**
     * Menyimpan perubahan data santri ke database (Update Logic).
     */
    public function update(Request $request, Santri $santri)
    {
        // Validasi data yang masuk, NIS tidak lagi divalidasi karena tidak bisa diubah.
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string',
            'no_hp_ortu' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update data di tabel 'santris', NIS tidak lagi diupdate.
        $santri->update($request->only(['nama', 'tgl_lahir', 'alamat', 'no_hp_ortu']));

        // Update juga data di tabel 'users' yang terhubung, username (NIS) tidak diupdate.
        if ($santri->user) {
            $santri->user->update([
                'name' => $request->nama,
            ]);
        }

        return redirect()->route('data-santri.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    /**
     * Menghapus data santri dari database (Delete).
     */
    public function destroy(Santri $santri)
    {
        // Hapus data santri. Karena relasi di database dan model sudah kita atur,
        // data user dan saldo yang terhubung akan ikut terhapus secara otomatis.
        $santri->delete();

        return redirect()->route('data-santri.index')->with('success', 'Data santri berhasil dihapus.');
    }
}
