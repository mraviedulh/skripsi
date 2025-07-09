<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpModel extends Model
{
    use HasFactory;
    protected $table = "topups";
    protected $guarded = [];

    public function santri()
    {
        return $this->belongsTo(Santri::class); // atau with default foreign key
    }

    // App\Models\Topup.php
    protected $casts = [
        'tanggal_transfer' => 'datetime',
    ];
}
