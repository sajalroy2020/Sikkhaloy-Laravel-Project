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
        Schema::create('tbl_thana_list', function (Blueprint $table) {
            $table->increments('thana_list_id');
            $table->integer('school_id')->unsigned()->default(1);
            $table->integer('district_list_id')->unsigned();
            $table->string('thana_name');
            $table->string('thana_name_bangla')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_thana_list');
    }
};
