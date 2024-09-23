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
        Schema::create('tbl_fee_category', function (Blueprint $table) {
            $table->increments('fee_category_id');
            $table->integer('school_id');
            $table->string('fee_name')->nullable();
            $table->string('short_form');
            $table->boolean('is_monthly')->default(false);
            $table->integer('receipt_side_id')->nullable();
            $table->integer('category_type')->default(0)->comment('0= Main Category; 1= Sub-Category');
            $table->integer('main_category_id')->nullable();
            $table->boolean('is_waiver')->default(false)->comment('0= No; 1= Yes');
            $table->boolean('is_fine')->default(false)->comment('0= No; 1= Yes');
            $table->boolean('is_service_charge')->default(false)->comment('0= No; 1= Yes');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('tbl_fee_category');
    }
};
