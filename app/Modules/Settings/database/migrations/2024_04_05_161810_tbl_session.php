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
        Schema::create('tbl_session', function (Blueprint $table) {
            $table->increments('session_id');
            $table->unsignedInteger('school_id');
            $table->string('session_name', 50)->nullable();
            $table->string('session_name_bangla', 255)->nullable();
            $table->unsignedInteger('exam_year');
            $table->unsignedTinyInteger('is_used')->default(1)->comment('Is Used in Online Admission or Result Search. 1= Yes; 0= No');
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
        Schema::dropIfExists('tbl_session');
    }
};
