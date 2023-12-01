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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('s_date');
            $table->date('e_date');
            $table->integer('leave_type_id');
            $table->integer('tot_day');
            $table->string('attachment');
            $table->text('approver_note')->nullable($value = true);
            $table->text('note')->nullable($value = true);
            $table->char('status')->comment('0 : Created, 1: Approve (by approver), 2 : Done, 3 : Rejected By Approver , 4 : Rejected By HRD, 5 : Cancel by user');; // 0 : Created, 1 Approve (by approver), 2  Done, 3 Rejected By Approver , 4 Rejected By HRD, 5 Cancel by user
            $table->integer('approver_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
