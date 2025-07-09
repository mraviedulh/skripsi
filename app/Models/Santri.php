<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;
    protected $guarded = []; // Izinkan semua field diisi

    /**
     * Setiap santri memiliki satu data user.
     */
    // Di Santri.php
    public function user()
    {
        return $this->belongsTo(User::class); // atau with default foreign key
    }


    /**
     * Setiap santri memiliki satu data saldo.
     */
    public function saldo()
    {
        return $this->hasOne(Saldo::class);
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
