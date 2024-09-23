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
        Schema::create('tbl_student_collection', function (Blueprint $table) {
            $table->id('collection_id');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->integer('class_id');
            $table->integer('department_id');
            $table->integer('session_id');
            $table->integer('school_id');
            $table->integer('voucher_no')->nullable();
            $table->string('InvoiceNo')->nullable();
            $table->string('TransactionId')->nullable();
            $table->integer('receipt_side_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('collection_description')->nullable();
            $table->string('collection_month')->nullable();
            $table->integer('collection_year')->nullable();
            $table->string('collection_amount')->nullable();
            $table->string('waiver')->nullable();
            $table->string('waiver_extra')->nullable();
            $table->string('due')->nullable();
            $table->tinyInteger('is_fine_amount')->default(0)->comment('0= No; 1= Yes: Late Fee/Fine/Others');
            $table->integer('payment_method_id')->default(1);
            $table->date('collection_date')->nullable();
            $table->string('remarks')->nullable();
            $table->tinyInteger('is_online_collection')->default(0);
            $table->timestamps();
            $table->tinyInteger('status');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('updated_user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student_collection');
    }
};
