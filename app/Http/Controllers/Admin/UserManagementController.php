<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Santri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    //
    /**
     * Menampilkan halaman untuk memilih role.
     */
    public function selectRole()
    {
        return view('admin.data-user.pilih-role');
    }

    /**
     * Menampilkan form untuk membuat user baru berdasarkan role yang dipilih.
     */
    public function create(Request $request)
    {
        // Ambil role dari URL, contoh: /create?role=santri
        $role = $request->query('role');

        // Pastikan role valid
        if (!in_array($role, ['santri', 'admin'])) {
            return redirect()->route('admin.data-user.selectRole')->with('error', 'Silakan pilih role yang valid.');
        }

        return view('admin.data-user.create', ['role' => $role]);
    }

    /**
     * Menyimpan data user baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi input
        $validator = Validator::make($request->all(), [
            'role' => 'required|in:santri,admin',
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'nis' => 'required_if:role,santri|nullable|string|unique:santris,nis',
            'alamat' => 'required_if:role,santri|nullable|string',
            'no_hp_ortu' => 'required_if:role,santri|nullable|string',
            'nip' => 'required_if:role,admin|nullable|string|unique:admins,nip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 2. Logika untuk membuat data spesifik (Santri atau Admin)
        $userable = null;
        $username = '';

        if ($request->role == 'santri') {
            $userable = Santri::create([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'no_hp_ortu' => $request->no_hp_ortu,
            ]);
            $username = $request->nis;

            if ($userable) {
                $userable->saldo()->create(['balance' => 0]); // <-- TAMBAHKAN BARIS INI
            }
        } else { // Jika role adalah admin
            $userable = Admin::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'tgl_lahir' => $request->tgl_lahir,
            ]);
            $username = $request->nip;
        }

        // 3. Membuat data User dan menghubungkannya
        if ($userable) {
            $userable->user()->create([
                'name' => $request->nama,
                'username' => $username,
                'password' => Hash::make($request->tgl_lahir),
                'role_id' => ($request->role == 'admin') ? 1 : 2, // Asumsi 1=Admin, 2=Santri
            ]);
        }

        return redirect()->route('admin.data-santri.index')->with('success', 'User baru berhasil ditambahkan!');
    }
}
