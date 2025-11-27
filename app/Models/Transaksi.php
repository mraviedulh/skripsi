<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['santri_id', 'admin_id', 'tipe', 'nominal', 'keterangan'];

    /**
     * Relasi: Transaksi milik Santri
     */
    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    /**
     * Relasi: Transaksi diproses oleh Admin (nullable)
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
