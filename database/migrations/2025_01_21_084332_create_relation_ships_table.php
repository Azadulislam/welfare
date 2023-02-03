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
        Schema::create('relation_ships', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned();
            $table->bigInteger('related_to_id')->unsigned();
            $table->bigInteger('relation_id')->unsigned();
            $table->timestamps();

            $table->foreign('member_id')->on('all_members')->references('id')->onDelete('cascade');
            $table->foreign('related_to_id')->on('all_members')->references('id')->onDelete('cascade');
            $table->foreign('relation_id')->on('relations')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_ships');
    }
};
