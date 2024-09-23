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
        Schema::create('tbl_payment_set', function (Blueprint $table) {
            $table->id('payment_set_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('group_id')->default(0);
            $table->unsignedBigInteger('student_category_id')->default(1);
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->date('date')->nullable();
            $table->string('month', 50)->nullable();
            $table->unsignedBigInteger('month_number')->nullable();
            $table->unsignedBigInteger('year')->nullable();
            $table->integer('amount')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->dateTime('created_on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_payment_set');
    }
};
