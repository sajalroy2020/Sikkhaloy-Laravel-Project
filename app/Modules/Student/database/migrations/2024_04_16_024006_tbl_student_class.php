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
        Schema::create('tbl_student_class', function (Blueprint $table) {
            $table->bigIncrements('student_class_id');
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('group_id')->default(0);
            $table->unsignedBigInteger('class_year')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->unsignedBigInteger('roll_no')->nullable();
            $table->string('b_roll')->nullable();
            $table->string('registration_no')->nullable();
            $table->tinyInteger('is_promoted')->default(0)->comment('0=No; 1= Yes');
            $table->unsignedBigInteger('shift')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->tinyInteger('status')->default(0)->comment('1= Active; 0= Inactive; 2= TC Issue; 3= Admission Cancel; 4= Delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student_class');
    }
};
