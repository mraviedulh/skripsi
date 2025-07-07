<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;
    protected $guarded = []; // Izinkan semua field diisi

    /**
     * Setiap saldo dimiliki oleh satu santri.
     */
    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
