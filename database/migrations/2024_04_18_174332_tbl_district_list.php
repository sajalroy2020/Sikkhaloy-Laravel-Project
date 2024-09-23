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
        Schema::create('tbl_district_list', function (Blueprint $table) {
            $table->bigIncrements('district_list_id');
            $table->integer('school_id')->default(1);
            $table->string('district_name');
            $table->string('district_name_bangla')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_district_list');
    }
};
