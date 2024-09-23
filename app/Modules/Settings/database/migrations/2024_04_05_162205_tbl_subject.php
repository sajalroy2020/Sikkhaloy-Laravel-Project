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
        Schema::create('tbl_subject', function (Blueprint $table) {
            $table->increments('subject_id');
            $table->unsignedInteger('school_id');
            $table->string('subject_name', 255)->nullable();
            $table->string('subject_name_bangla', 255)->nullable();
            $table->string('subject_code', 25)->nullable();
            $table->string('subject_short_form', 50)->nullable();
            $table->string('subject_short_form_bangla', 255)->nullable();
            $table->unsignedTinyInteger('is_optional')->comment('0= No; 1=Yes');
            $table->unsignedTinyInteger('is_additional')->comment('0= No; 1= Yes');
            $table->unsignedTinyInteger('is_paper_2')->comment('0=No; 1= Yes');
            $table->unsignedTinyInteger('marks_type')->comment('1= Subjective; 2=Subjective; Objective; 3=Subjective; Objective; Practical');
            $table->unsignedInteger('subject_pn');
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
        Schema::dropIfExists('tbl_subject');
    }
};
