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
        Schema::create('tbl_class_department', function (Blueprint $table) {
            $table->increments('class_department_id');
            $table->unsignedInteger('school_id')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_class_department');
    }
};
