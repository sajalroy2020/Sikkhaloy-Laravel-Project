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
        Schema::table('tbl_receipt_side', function (Blueprint $table) {
            $table->decimal('opening_balance', 12, 2)->default(0.00)->after('receipt_side_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_receipt_side', function (Blueprint $table) {
            $table->dropColumn('opening_balance');
        });
    }
};
