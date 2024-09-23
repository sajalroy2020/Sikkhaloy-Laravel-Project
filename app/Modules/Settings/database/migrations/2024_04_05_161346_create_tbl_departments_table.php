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
        Schema::create('tbl_departments', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('department', 100);
            $table->string('bangla_name', 255)->nullable();
            $table->string('department_no', 11);
            $table->unsignedTinyInteger('department_type')->comment('1= Department; 2= Group; 3= Session');
            $table->unsignedTinyInteger('is_used')->default(1)->comment('Is Used in Online Admission Form. 1= Yes; 0= No');
            $table->unsignedInteger('school_id');
            $table->tinyInteger('status');
            $table->dateTime('created_on');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_departments');
    }
};
