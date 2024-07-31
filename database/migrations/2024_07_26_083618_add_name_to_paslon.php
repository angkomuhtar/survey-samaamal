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
        Schema::table('paslons', function (Blueprint $table) {
            //
            $table->string('nama')->default('')->nullable()->after('no_urut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paslons', function (Blueprint $table) {
            $table->dropColumn('lokasi');
        });
    }
};
