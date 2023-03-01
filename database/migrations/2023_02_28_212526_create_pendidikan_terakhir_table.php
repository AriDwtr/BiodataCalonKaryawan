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
        Schema::create('pendidikan_terakhir', function (Blueprint $table) {
            $table->id();
            $table->string('id_user', 5);
            $table->string('jenjang', 10);
            $table->string('institusi', 100);
            $table->string('jurusan', 100);
            $table->string('tahun_pendidikan', 4);
            $table->string('ipk', 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan_terakhir');
    }
};
