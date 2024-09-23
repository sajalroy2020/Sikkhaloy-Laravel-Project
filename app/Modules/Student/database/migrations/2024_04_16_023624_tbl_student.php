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
        Schema::create('tbl_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id')->nullable();
            $table->string('p_student_id', 25)->nullable()->comment('Previous Student ID');
            $table->unsignedBigInteger('school_id');
            $table->string('date_of_admission', 50)->nullable();
            $table->string('admission_no', 55)->nullable();
            $table->string('school_name', 100)->nullable();
            $table->string('student_name', 255)->nullable();
            $table->string('student_name_bangla', 255)->nullable();
            $table->string('student_name_english', 255)->nullable();
            $table->string('nick_name', 255)->nullable();
            $table->string('gender', 50)->nullable();
            $table->string('birth_date', 50)->nullable();
            $table->string('religion', 100)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('shift')->nullable()->comment('1= Morning; 2= Evening');
            $table->string('tribal', 255)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('national_id', 255)->nullable();
            $table->string('father_name', 255)->nullable();
            $table->string('father_name_bangla', 255)->nullable();
            $table->string('father_name_english', 255)->nullable();
            $table->string('father_occupation', 255)->nullable();
            $table->string('father_phone', 100)->nullable();
            $table->string('father_nid', 50)->nullable();
            $table->string('mother_name', 255)->nullable();
            $table->string('mother_name_bangla', 255)->nullable();
            $table->string('mother_name_english', 255)->nullable();
            $table->string('mother_occupation', 255)->nullable();
            $table->string('mother_phone', 100)->nullable();
            $table->string('mother_nid', 50)->nullable();
            $table->string('student_phone', 50)->nullable();
            $table->string('sms_alert_phone', 20)->nullable();
            $table->string('guardian_name', 255)->nullable();
            $table->string('guardian_phone', 50)->nullable();
            $table->string('student_relation', 255)->nullable();
            $table->string('guardian_nid', 255)->nullable();
            $table->string('guardian_profession', 255)->nullable();
            $table->string('yearly_income', 255)->nullable();
            $table->string('guardian_address', 255)->nullable();
            $table->string('guardian_po', 255)->nullable();
            $table->unsignedBigInteger('guardian_district_list_id')->nullable();
            $table->unsignedBigInteger('guardian_thana_list_id')->nullable();
            $table->string('permanent_address', 255)->nullable();
            $table->string('permanent_po', 255)->nullable();
            $table->unsignedBigInteger('permanent_district_list_id')->nullable();
            $table->string('permanent_district', 255)->nullable();
            $table->unsignedBigInteger('permanent_thana_list_id')->nullable();
            $table->string('permanent_thana', 255)->nullable();
            $table->string('present_address', 255)->nullable();
            $table->string('present_po', 255)->nullable();
            $table->unsignedBigInteger('present_district_list_id')->nullable();
            $table->string('present_district', 255)->nullable();
            $table->unsignedBigInteger('present_thana_list_id')->nullable();
            $table->string('present_thana', 255)->nullable();
            $table->tinyInteger('is_scholarship')->default(0);
            $table->tinyInteger('is_tc')->nullable();
            $table->string('tc_institute_name', 255)->nullable();
            $table->string('tc_issue_date', 255)->nullable();
            $table->string('tc_memo_no', 255)->nullable();
            $table->tinyInteger('is_autistic')->default(0);
            $table->string('autistic_type', 255)->nullable();
            $table->string('blood_group', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->integer('payable_amount')->nullable();
            $table->string('punch_id', 50)->nullable();
            $table->string('family_member', 50)->nullable();
            $table->string('family_member_earning', 50)->nullable();
            $table->string('total_land', 50)->nullable();
            $table->string('marital_status', 50)->nullable();
            $table->string('student_mobile', 50)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('ssc_roll', 50)->nullable();
            $table->string('ssc_registration_no', 50)->nullable();
            $table->string('ssc_gpa', 50)->nullable();
            $table->string('ssc_district', 255)->nullable();
            $table->string('ssc_school', 255)->nullable();
            $table->string('ssc_board', 255)->nullable();
            $table->string('ssc_passing_year', 255)->nullable();
            $table->string('ssc_center_name', 255)->nullable();
            $table->unsignedBigInteger('merit_position')->nullable()->comment('govt. online admission position. class six - ten');
            $table->tinyInteger('status')->default(1)->comment('1= Active; 0= Inactive; 2= TC Issue; 3= Admission Cancel; 4= Delete');
            $table->string('status_date', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_student');
    }
};
