<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('clocks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date');
            $table->time('clock_in');
            $table->time('clock_out');
            $table->integer('work_hours_id');
            $table->enum('status', ['A', 'I', 'S', 'O', 'L', 'H']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clocks');
    }
};
