<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Santri;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    // Tampilkan semua data santri
    public function index()
    {
        $query = Admin::query();

        $admins = $query->latest()->paginate(10);

        return view('admin.data-admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.data-admin.tambah');
    }

    // Simpan data santri baru

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'nip'       => 'required|string|max:255|unique:admins,nip',
            'tgl_lahir' => 'required|date',
            'no_hp'  => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            // Format tgl_lahir ke ddmmyyyy
            $rawPassword    = \Carbon\Carbon::parse($validated['tgl_lahir'])->format('dmY');
            $hashedPassword = Hash::make($rawPassword);

            // Simpan ke tabel users
            $user = \App\Models\User::create([
                'name'     => $validated['nama'],
                'username' => $validated['nip'],
                'role_id'  => 1, // Ubah sesuai role admin
                'password' => $hashedPassword,
            ]);

            // Simpan ke tabel admins dengan user_id
            $admin = new \App\Models\Admin();
            $admin->fill($validated);
            $admin->user_id = $user->id;
            $admin->save();

            DB::commit();

            return redirect()->route('admin.data-admin.index')->with('success', 'Data admin berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.data-admin.edit', compact('admin'));
    }

    // Update data santri
    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $validated = $request->validate([
            'alamat'      => 'required|string',
            'no_hp_ortu'  => 'nullable|string|max:255',
        ]);

        $admin->update($validated);

        return redirect()->route('admin.data-admin.index')->with('success', 'Data santri berhasil diperbarui.');
    }

    // Hapus data santri
    public function destroy($id)
    {
        $admin = Santri::findOrFail($id);
        $admin->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data santri berhasil dihapus.'
        ]);
    }
}
