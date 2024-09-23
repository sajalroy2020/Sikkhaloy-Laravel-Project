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
        Schema::create('tbl_daily_transaction', function (Blueprint $table) {
            $table->id('daily_transaction_id');
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('collection_id')->nullable();
            $table->unsignedBigInteger('asset_collection_id')->nullable();
            $table->unsignedBigInteger('teacher_payment_id')->nullable();
            $table->unsignedBigInteger('teacher_monthly_salary_id')->nullable();
            $table->unsignedBigInteger('payment_side_id')->nullable();
            $table->unsignedBigInteger('receipt_side_id')->nullable();
            $table->unsignedInteger('voucher_no')->nullable();
            $table->string('InvoiceNo')->nullable();
            $table->string('TransactionId')->nullable();
            $table->string('transaction_type')->nullable();
            $table->unsignedInteger('expense_serial')->nullable();
            $table->unsignedInteger('income_serial')->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('payee_name')->nullable();
            $table->longText('transaction_description')->nullable();
            $table->unsignedInteger('transaction_amount');
            $table->tinyInteger('is_fine_amount')->default(0)->comment('0= No; 1= Yes: Late Fee/Fine/Others');
            $table->tinyInteger('is_online_collection')->default(0);
            $table->unsignedBigInteger('payment_method_id')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('updated_user_id')->nullable();
            $table->dateTime('created_on');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_daily_transaction');
    }
};
