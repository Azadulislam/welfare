<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('home_address1', 255)->nullable();;
            $table->string('home_address2', 255)->nullable();
            $table->string('home_address3', 255)->nullable();
            $table->string('home_city', 255)->nullable();
            $table->string('home_postcode', 255)->nullable();
            $table->string('home_district', 255)->nullable();
            $table->bigInteger('home_state_id')->unsigned()->nullable();
            $table->bigInteger('home_status_id')->unsigned()->nullable();
            $table->string('home_section', 255)->nullable();
            $table->string('ic_address1', 255)->nullable();
            $table->string('ic_address2', 255)->nullable();
            $table->string('ic_address3', 255)->nullable();
            $table->string('ic_city', 255)->nullable();
            $table->string('ic_postcode', 255)->nullable();
            $table->string('ic_district', 255)->nullable();
            $table->string('ic_section', 255)->nullable();
            $table->bigInteger('ic_state_id')->unsigned()->nullable();
            $table->bigInteger('family_status_id')->unsigned()->nullable();
            $table->bigInteger('citizenship_id')->unsigned()->nullable();;
            $table->string('telephone_one', 255)->nullable();
            $table->string('telephone2', 255)->nullable();
            $table->string('mobile_phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('name2', 255)->nullable();
            $table->date('birth_date')->nullable();;
            $table->string('ic_no', 255);
            $table->bigInteger('race_id')->unsigned()->nullable();
            $table->bigInteger('religion_id')->unsigned()->nullable();
            $table->bigInteger('marital_status_id')->unsigned()->nullable();
            $table->date('start_of_stay')->nullable();
            $table->date('end_of_stay')->nullable();
            $table->string('active_status', 55)->nullable();
            $table->text('active_status_note')->nullable();
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->string('attache_file1', 255)->nullable();
            $table->string('attache_file2', 255)->nullable();
            $table->string('attache_file3', 255)->nullable();
            $table->string('attache_file4', 255)->nullable();
            $table->date('last_edited_date')->nullable();;
            $table->string('current_job', 55)->nullable();
            $table->bigInteger('current_job_sector_id')->unsigned()->nullable();
            $table->text('unemployed_reason')->nullable();
            $table->string('member_status_ids', 255)->nullable();
            $table->string('beneficiary_name', 255)->nullable();
            $table->string('beneficiary_ic', 255)->nullable();
            $table->timestamps();

            $table->foreign('home_status_id')->on('homestatuses')->references('id')->onDelete('cascade');
            $table->foreign('family_status_id')->on('family_statuses')->references('id')->onDelete('cascade');
            $table->foreign('current_job_sector_id')->on('job_sectors')->references('id')->onDelete('cascade');
            $table->foreign('race_id')->on('races')->references('id')->onDelete('cascade');
            $table->foreign('religion_id')->on('religions')->references('id')->onDelete('cascade');
            $table->foreign('gender_id')->on('genders')->references('id')->onDelete('cascade');
            $table->foreign('citizenship_id')->on('citizenship_countries')->references('id')->onDelete('cascade');
            $table->foreign('home_state_id')->on('states')->references('id')->onDelete('cascade');
            $table->foreign('ic_state_id')->on('states')->references('id')->onDelete('cascade');
        });

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_members');
    }
};
