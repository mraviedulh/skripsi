<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Semua atribut diizinkan diisi (gunakan dengan hati-hati di production!)
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke pendaftaran (jika user adalah santri)
     */
    // public function pendaftaran()
    // {
    //     return $this->hasOne(Pendaftaran::class);
    // }

    /**
     * Relasi polimorfik userable (jika masih kamu gunakan)
     */
    // public function userable()
    // {
    //     return $this->morphTo();
    // }

    /**
     * Cek apakah user ini adalah guru/admin berdasarkan adanya NIP
     */
    // public function isGuru()
    // {
    //     return !is_null($this->nip);
    // }

    /**
     * Cek apakah user ini adalah santri berdasarkan relasi pendaftaran
     */
    // public function isSantri()
    // {
    //     return $this->pendaftaran()->exists();
    // }
}
