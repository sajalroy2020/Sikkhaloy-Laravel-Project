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
        Schema::create('tbl_designation', function (Blueprint $table) {
            $table->increments('designation_id');
            $table->unsignedInteger('school_id');
            $table->unsignedInteger('serial');
            $table->string('designation_name', 255);
            $table->string('designation_name_bangla', 255)->nullable();
            $table->unsignedTinyInteger('is_vacant_post')->comment('0=No; 1= Yes');
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
        Schema::dropIfExists('tbl_designation');
    }
};
