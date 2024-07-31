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
        Schema::create('dpts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenkel', ['L', 'P']);
            $table->integer('usia');
            $table->integer('kab');
            $table->integer('kec');
            $table->integer('desa');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('tps');
            $table->string('status_pemilih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpts');
    }
};
