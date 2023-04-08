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
        Schema::create('deaths', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('all_member_id')->unsigned();
            $table->string('burial_contact_person', 55);
            $table->string('burial_contact_person_tel', 55);
            $table->date('date_of_death');
            $table->text('cause_of_death')->nullable();
            $table->string('burial_place', 100);
            $table->date('burial_date');
            $table->string('burial_place_district', 55)->nullable();
            $table->string('burial_place_state', 55)->nullable();
            $table->boolean('done_by_mosque')->nullable();
            $table->decimal('service_cost', 9,2)->nullable();
            $table->date('pay_date')->nullable();
            $table->string('paid_by', 55)->nullable();
            $table->string('attached_file1', 100)->nullable();
            $table->string('attached_file2', 100)->nullable();
            $table->string('attached_file3', 100)->nullable();
            $table->string('attached_file4', 100)->nullable();
            $table->string('attached_file5', 100)->nullable();
            $table->timestamp('last_edited_date');
            $table->timestamps();

            $table->foreign('all_member_id')->on('all_members')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deaths');
    }
};
