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
        Schema::create('tbl_class', function (Blueprint $table) {
            $table->increments('class_id');
            $table->string('class_name', 100)->nullable();
            $table->string('bangla_name', 255)->nullable();
            $table->integer('class_no')->nullable();
            $table->integer('no_of_subject')->nullable();
            $table->tinyInteger('is_optional')->comment('1= Yes; 2= No');
            $table->tinyInteger('result_type')->comment('1= GPA; 2= CGPA');
            $table->tinyInteger('passing_type')->default(1)->comment('1=Total Marks; 2= Individual');
            $table->tinyInteger('marksheet_type')->default(1)->comment('1=Number & GPA; 2=Only GPA');
            $table->tinyInteger('class_type')->default(2)->comment('1=Junior;2=Secondary;3=Higher Secondary;4=Honors;5=Degree;6=Masters');
            $table->tinyInteger('is_group')->default(0)->comment('0= No; 1= Yes');
            $table->tinyInteger('is_used')->default(1)->comment('Is Used in Online Admission or Result Search. 1= Yes; 0= No');
            $table->tinyInteger('status')->default(0);
            $table->integer('school_id')->nullable();
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
        Schema::dropIfExists('tbl_class');
    }
};
