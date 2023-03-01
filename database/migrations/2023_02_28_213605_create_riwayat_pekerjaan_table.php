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
        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('id_user', 5);
            $table->string('perusahaan', 100);
            $table->string('posisi_terakhir', 100);
            $table->string('pendapatan_terakhir', 50);
            $table->string('tahun_perusahaan', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pekerjaan');
    }
};
