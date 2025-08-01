<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saldos', function (Blueprint $table) {
            $table->id();
            // Ini adalah kunci yang menghubungkan tabel ini ke tabel 'santris'.
            // onDelete('cascade') artinya jika data santri dihapus, data saldonya juga ikut terhapus.
            $table->foreignId('santri_id')->constrained('santris')->onDelete('cascade');

            // Kolom untuk menyimpan jumlah saldo, defaultnya adalah 0.
            $table->decimal('balance', 15, 2)->default(0.00);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saldos');
    }
};
