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
        Schema::create('tbl_receipt_side', function (Blueprint $table) {
            $table->increments('receipt_side_id');
            $table->string('receipt_side_name', 255)->nullable();
            $table->integer('school_id');
            $table->integer('status')->default(1);
            $table->dateTime('created_on');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_receipt_side');
    }
};
