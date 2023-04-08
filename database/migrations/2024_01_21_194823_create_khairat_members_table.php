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
        Schema::create('khairat_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned();
            $table->string('membership_no', 55)->unique();
            $table->date('member_start_date');
            $table->date('member_end_date')->nullable();
            $table->date('approval_date');
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->on('all_members')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khairat_members');
    }
};
