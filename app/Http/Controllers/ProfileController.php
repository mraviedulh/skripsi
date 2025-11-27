<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Santri;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $santri = null;

        // Jika user adalah santri, ambil data santri
        if ($user->role_id == 2) {
            $santri = Santri::where('user_id', $user->id)->first();
        }

        return view('santri.profil', [
            'user' => $user,
            'santri' => $santri,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        // Jika user adalah santri, update data santri
        if ($user->role_id == 2) {
            $validated = $request->validate([
                'alamat'      => 'required|string',
                'no_hp_ortu'  => 'nullable|string|max:255',
                'nama_wali'   => 'required|string',
            ]);

            $santri = Santri::where('user_id', $user->id)->first();
            if ($santri) {
                $santri->update($validated);
            }

            return Redirect::route('profile.edit')->with('success', 'Profile berhasil diperbarui.');
        } else {
            // Update data user biasa
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            ]);

            $user->fill($validated);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
