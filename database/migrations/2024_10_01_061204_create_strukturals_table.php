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
        Schema::create('strukturals', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->unsignedBigInteger('id_jabatan');
            $table->foreign('id_jabatan')->references('id')->on('jabatans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strukturals');
    }
};
