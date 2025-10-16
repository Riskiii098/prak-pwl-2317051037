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
        Schema::create('user', function (Blueprint $table) {
            // Gunakan UUID sebagai primary key
            $table->uuid('id')->primary();

            $table->string('nama');
            $table->string('nim');

            // Relasi ke tabel kelas (yang juga menggunakan UUID)
            $table->uuid('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
