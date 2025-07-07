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
    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    /**
     * Setiap santri memiliki satu data saldo.
     */
    public function saldo()
    {
        return $this->hasOne(Saldo::class);
    }
}
