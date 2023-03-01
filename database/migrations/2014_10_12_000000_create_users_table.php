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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('posisi',50)->nullable();
            $table->string('ktp', 16)->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('email')->unique();
            $table->enum('type', array('user','admin'));
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jk', array('L','P'))->nullable();
            $table->string('Agama', 15)->nullable();
            $table->enum('gol_darah', array('A','AB','B','O'))->nullable();
            $table->string('status', 30)->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->text('alamat_tinggal')->nullable();
            $table->string('no_telp', 20)->nullable();
            $table->string('orang_deket', 100)->nullable();
            $table->text('skill')->nullable();
            $table->enum('onsite', array('Y','N'))->nullable();
            $table->string('salary', 50)->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
