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
        Schema::create('tbl_admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->string('admin_name');
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('is_superadmin')->default(0)->comment('0 = Super Admin ; 1 = Admin ; 2 = Teacher; 3 = Student ; 4 = Parent');
            $table->integer('sub_admin')->comment('1= Admin; 2= Student; 3= Teacher; 4= Payment; 5= Result; 6= Accounts; 7= Inventory; 8= Library; 9= Website; 10= SMS; 11= Online Admission; 11= Appointment; 12= Transport; 13= Hostel; 14= Canteen; 15= Asset; 16= Public Exam;');
            $table->integer('is_developer')->default(0)->comment('0= No; 1= Yes');
            $table->tinyInteger('status')->default(1);
            $table->integer('is_active')->default(1)->comment('1= Institute Active; 0= Institute Inactive');
            $table->dateTime('created_on');
            $table->integer('school_id');
            $table->integer('institute_id')->nullable();
            $table->string('username')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_admin');
    }
};
