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
        Schema::create('tbl_school_information', function (Blueprint $table) {
            $table->id('school_information_id');
            $table->string('school_name', 255)->nullable();
            $table->string('bangla_name', 255)->nullable();
            $table->integer('school_id')->default(1);
            $table->integer('institute_id')->nullable();
            $table->string('school_title', 255)->nullable();
            $table->string('establish', 255)->nullable();
            $table->integer('institute_type')->nullable()->comment('1= School; 2= College; 3=Madrasha; 4= University; 5= Coaching Center');
            $table->integer('is_government')->default(0)->comment('0= No; 1= Yes');
            $table->integer('shift')->default(1)->comment('1= Morning; 2= Evening; 3= Both');
            $table->string('under_board', 255)->default('Chittagong');
            $table->string('registration_no', 50)->nullable();
            $table->string('eiin_no', 255)->default('0')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('post_office', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('police_station', 255)->nullable();
            $table->string('address_2', 255)->nullable();
            $table->string('post_office_2', 255)->nullable();
            $table->string('district_2', 255)->nullable();
            $table->string('police_station_2', 255)->nullable();
            $table->string('contact_no', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('user_name', 255)->nullable();
            $table->string('facebook_link', 255)->nullable();
            $table->string('twitter_link', 255)->nullable();
            $table->longText('google_maps')->nullable();
            $table->integer('is_roll')->default(0)->comment('0= No; 1= Yes, Is Roll with Class and Department No. for quami madrasah. Is Roll display or Serial for Other');
            $table->integer('is_tribal')->nullable()->comment('0=No; 1= Yes');
            $table->integer('attendance_type')->default(1)->comment('1= Manual; 2= Machine');
            $table->integer('result_format')->default(1)->comment('1=Individual Exam Marks; 2=% From Terminal Exam');
            $table->string('sub_type_name_1', 255)->nullable();
            $table->string('sub_type_short_1', 255)->nullable();
            $table->string('sub_type_name_2', 255)->nullable();
            $table->string('sub_type_short_2', 255)->nullable();
            $table->string('sub_type_name_3', 255)->nullable();
            $table->string('sub_type_short_3', 255)->nullable();
            $table->string('sub_type_name_4', 255)->nullable();
            $table->string('sub_type_short_4', 255)->nullable();
            $table->integer('first_institute_name')->default(0)->comment('0= Bangla; 1= English');
            $table->tinyInteger('language')->default(1)->comment('1= English; 2= Bangla');
            $table->tinyInteger('admin_language')->default(1)->comment('1= English; 2= Bangla');
            $table->string('logo', 255)->nullable();
            $table->string('logo2', 255)->nullable();
            $table->string('signature', 255)->nullable();
            $table->integer('is_info_show')->default(1)->comment('Institute Name Show in Banner');
            $table->integer('status')->default(1);
            $table->dateTime('created_on')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_school_information');
    }
};
